<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Phone;

class SendSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $phone;

    public function __construct(Phone $phone)
    {
        $this->phone = $phone;
        $this->phone_number = $phone->phone;
        $this->code = $phone->code;

        $message = 'Your Pistis Foundation Food Collection Code is; ' . $code . ' You will get a call within the week for your collection location. Present the code for your collection. \n Pistis Foundation';

        $data = array(
            "api_key" => "be2edfb9",
            "api_secret" => "cbe5723383bf7c20",
            "text" => $message,
            "from" => "PistisFDN",
            "to" => $phone_number,
        );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            // CREATE TRANSFER RECIPIENT
            $response = $this->initiateCurl(
                $this->data,
                'https://rest.nexmo.com/sms/json'
            );

            if ($response['status']) {
                $this->phone->status = "Sent";
                //$this->phone->sms_sent_at = "queued";
                $this->phone->save();
            } else {
                $this->phone->status = "Pending";
                //$this->phone->sms_sent_at = "queued";
                $this->phone->save();
            }

        } catch (Exception $e) {
            $this->phone->status = "Pending";
                //$this->phone->sms_sent_at = "queued";
                $this->phone->save();
        }
    }


    public function initiateCurl($data, $url)
    {
        $ch = curl_init($url);

        $data = http_build_query($data);

        $getUrl = $url . "?" . $data;

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);

        $result = curl_exec($ch);
        $err = curl_error($ch);

        curl_close($ch);

        $resp = json_decode($result, true);

        $response = $resp['messages'][0]['status'];

        if ($response == '0') {

            return [
                'status'=>true,
                'message'=> 'Sent ',
                'errmsg'=> $resp['messages'][0]['status']
             ];

        } else {

            return [
                    'status'=>false,
                    'message'=> 'Pending',
                    'errmsg'=> $resp['messages'][0]['error_text']
                 ];

        }


    }

}