<?php

namespace App\Http\Controllers;
use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $phones = DB::table('phones')->get();
        $phoneTotal = count($phones);
        $phone_sent = DB::table('phones')->where('status', 'sent')->get();
        $phone_pending = DB::table('phones')->where('status', 'pending')->get();
        $phone_sentTotal = count($phone_sent);
        $phone_pendingTotal = count($phone_pending);
        return view('home', compact('phones', 'phoneTotal', 'phone_sentTotal', 'phone_pendingTotal'));
    }

    public function phones()
    {
        $phones = DB::table('phones')->get();
        return view('phones', compact('phones'));
    }

    public function sendSMS(Request $request)
    {
        $phone_input = $request->input('phone');
        $phone = ltrim($phone_input, '+');
        $code = $request->input('code');

        $phonedb = Phone::where('code', $code)->first();

        $response = $this->sendNexmoSMS(
            $phone,
            $code
        );

        $arr = json_decode($response, true);

        $result = $arr['messages'][0]['status'];

        if ($result == '0') {

            echo $response . ' Message Sent';
            $phonedb->status = "Sent";
            $phonedb->save();

            $request->session()->flash('success', $phone . ' ' . $code . ' SMS Sent successful');
            return redirect('/home');

        } else {
            $phonedb->status = "Pending";
            $phonedb->save();

            $request->session()->flash('error', $phone . ' ' . $code . ' Message Was not sent to to ');
            return redirect('/home');
        }

    }

    public function sendNexmoSMS($phone, $code)
    {

        $message = 'Your Pistis Foundation Food Collection Code is;' . $code . ' You will get a call within the week for your collection location. Present the code for your collection. Pistis Foundation';

        $dataArray = array(
            "api_key" => "be2edfb9",
            "api_secret" => "cbe5723383bf7c20",
            "text" => $message,
            "from" => "PistisFDN",
            "to" => $phone,
        );

        $url = 'https://rest.nexmo.com/sms/json';

        $ch = curl_init();

        $data = http_build_query($dataArray);

        $getUrl = $url . "?" . $data;

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);

        $response = curl_exec($ch);

        if (curl_error($ch)) {
            return 'Request Error:' . curl_error($ch);
        } else {
            return $response;
        }

        curl_close($ch);
    }
}