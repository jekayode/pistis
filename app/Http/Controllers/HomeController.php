<?php

namespace App\Http\Controllers;
use App\Phone;
use App\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Jobs\SendSMS;
use App\Jobs\SendAFTSMS;
use AfricasTalking\SDK\AfricasTalking;

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

    public function sendbulk()
    {

        $phone_pending = DB::table('phones')->where('status', 'pending')->get();
        $phone_pendingTotal = count($phone_pending);

        $pending = Phone::select('phone','code')->where('status', 'Pending')->get()->toJson();

        $pendingJson = json_decode($pending,true);

        //foreach($pendingJson as $item){
         //   echo $item['phone'] . ' ' . $item['code'] .'<br>';

       // }

       // die;

        return view('sendbulk', compact('phone_pending','phone_pendingTotal'));
    }

    public function sendSMS(Request $request)
    {
        $phone = Phone::find($request->input('id'));

        $sms = new Sms;
        $sms->phone_id = $phone->id;
        //$sms->phone = $phone->phone;
        $sms->status = 'pending';

        $sms->save();

        SendAFTSMS::dispatchNow($sms);

        $request->session()->flash('success',  'Was successfully sent'  );

        return redirect()->back();

        /*
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

            $request->session()->flash('success',  $code . ' Was successfully sent to ' .$phone );
            return redirect('/home');

        } else {
            $error_message = $arr['messages'][0]['error-text'];

            $phonedb->status = "Pending";
            $phonedb->save();

            $request->session()->flash('error', 'Could not send to the code to ' . $phone .' Error message '.$error_message);
            return redirect('/home');
        }
        */

    }

    public function getSmsStatus(Request $request)
    {
        $pending_sms = DB::table('phones')->where('status', 'pending')->get();
        $pending_sms_count = count($pending_sms);


        $items = compact(
            'pending_sms_count'
        );

        return response()->json(['status'=>true, 'items'=> $items]);
    }

    public function postPendingSms(Request $request)
    {
        $phones = Phone::where('status','Pending')->get();
        if (!empty($phones)) {
            foreach ($phones as $phone) {
                $sms = new Sms;
                $sms->phone_id = $phone->id;
                //$sms->phone = $phone->phone;
                $sms->status = 'pending';

                $sms->save();

                SendAFTSMS::dispatchNow($sms);

            }
        }

        //$request->session()->flash('success',  'Was successfully sent'  );
        return response()->json(['status'=>'Was successfully sent']);
       // return redirect()->back();

    }

    public function sendNexmoSMS($phone_number, $code)
    {

        $message = 'Your Pistis Foundation Food Collection Code is; ' . $code . ' You will get a call within the week for your collection location. Present the code for your collection. \n Pistis Foundation';

        $dataArray = array(
            "api_key" => "be2edfb9",
            "api_secret" => "cbe5723383bf7c20",
            "text" => $message,
            "from" => "PistisFDN",
            "to" => $phone_number,
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

    public function sendAFTSMS(Request $request)
    {
        //$phone_input = $request->input('phone');
        //$phone = ltrim($phone_input, '+');
        //$code = $request->input('code');

        $phone = Phone::find($request->input('id'));

        $sms = new Sms;
        $sms->phone_id = $phone->id;
        //$sms->phone = $phone->phone;
        $sms->status = 'pending';
        $sms->save();

        SendAFTSMS::dispatchNow($sms);

        $request->session()->flash('success',  'Was successfully sent'  );

        $message = 'Your Pistis Foundation Food Collection Code is; ' . $phone->code . ' You will get a call within the week for your collection location. Present the code for your collection. Pistis Foundation';

        $header = array(
            "Accept: application/json",
            "Content-Type: application/x-www-form-urlencoded",
            "apiKey: 7e0250f026db9b313c55218294bd0a5be9609f3200ba8850e42cc31e09a67358",
            "Content-Type: application/x-www-form-urlencoded"
        );

        $dataArray = array(
            "username" => "psistissms",
            "to" => $phone->phone,
            "message" => $message,
            "from" => "PistisFDN",
        );

        $data_string = http_build_query($dataArray);
        $url = 'https://api.africastalking.com/version1/messaging';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        $response = curl_exec($ch);

        if (curl_error($ch)) {
            return 'Request Error:' . curl_error($ch);
        } else {

            $arr = json_decode($response, true);
            $result = $arr['SMSMessageData']['Recipients'][0]['status'];
            $resp = $arr['SMSMessageData']['Recipients'][0];

            if ($result == 'Success') {

                //echo $response . ' Message Sent';
                $phone->status = "Sent";
                $phone->save();

                $sms->statusCode = $resp['statusCode'];
                $sms->number = $resp['number'];
                $sms->status = $resp['status'];
                $sms->cost = $resp['cost'];
                $sms->messageId = $resp['messageId'];
                $sms->save();

                $request->session()->flash('success',  ' Message was sent ' );
                return redirect()->back();

            } else {
                //echo $response . ' Message Sent';
                $phone->status = "Pending";
                $phone->save();

                $sms->statusCode = $resp['statusCode'];
                $sms->number = $resp['number'];
                $sms->status = $resp['staus'];
                $sms->cost = $resp['cost'];
                $sms->messageId = $resp['messageId'];
                $sms->save();

                $request->session()->flash('error', 'Could not send to the code to ' . $phone .' Error message '.$error_message);
                return redirect()->back();
            }

            //echo $result;
        }

        curl_close($ch);

    }

}