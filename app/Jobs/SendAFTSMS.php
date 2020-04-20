<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use AfricasTalking\SDK\AfricasTalking;

use App\Phone;
use App\Sms;

class SendAFTSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $sms;
    public $username;
    public $apiKey;
    public $AT;
    public $smsService;
    public $recipients;
    public $message;
    public $from;

    public $header;
    public $data_string;


    public function __construct(Sms $sms)
    {
        $this->sms = $sms;

        //$this->username = config('nescafe.AFT_AIRTIME_USERNAME');
        //$this->apikey = config('nescafe.AFT_AIRTIME_APIKEY');

        $this->phone = Phone::find($sms->phone_id);


        // Set the numbers you want to send to in international format
        $this->recipients = $this->phone->phone;

        // Set your message
        $this->message    = 'Your Pistis Foundation Food Collection Code is; ' . $this->phone->code . ' You will get a call within the week for your collection location. Present the code for your collection.  Pistis Foundation';


        $this->header = array(
            "Accept: application/json",
            "Content-Type: application/x-www-form-urlencoded",
            "apiKey: 7e0250f026db9b313c55218294bd0a5be9609f3200ba8850e42cc31e09a67358",
            "Content-Type: application/x-www-form-urlencoded"
        );

        $dataArray = array(
            "username" => "psistissms",
            "to" => $this->phone->phone,
            "message" => $this->message,
            "from" => "PistisFDN",
        );

        $this->data_string = http_build_query($dataArray);
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
                $this->header,
                'https://api.africastalking.com/version1/messaging',
                $this->data_string,
            );

            if ($response['status']) {
                // SAVE DATA
                //echo $response . ' Message Sent';
                //dd($response);
                $this->phone->status = "Sent";
                $this->phone->save();

                $this->sms->statusCode = $response['data']['statusCode'];
                $this->sms->number = $response['data']['number'];
                $this->sms->status = $response['data']['status'];
                $this->sms->cost = $response['data']['cost'];
                $this->sms->messageId = $response['data']['messageId'];
                $this->sms->save();

            } else {
                $this->phone->status = "Pending";
                $this->phone->save();

                $this->sms->statusCode = $response['data']['statusCode'];
                $this->sms->number = $response['data']['number'];
                $this->sms->status =  $response['data']['status'];
                $this->sms->cost = $response['data']['cost'];
                $this->sms->messageId = $response['data']['messageId'];
                $this->sms->save();
            }
        } catch (Exception $e) {
            $this->sms->status = "error";
            $this->sms->api_status = "Error";
            $this->sms->api_message = "Exception Catched sending message - ".
                                         $e->getMessage();
            $this->sms->save();
        }
    }

    public function initiateCurl($header, $url, $data)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($ch);
        $err = curl_error($ch);

        curl_close($ch);

        $resp = json_decode($result,true);

        $result = $resp['SMSMessageData']['Recipients'][0]['status'];
        $output = $resp['SMSMessageData']['Recipients'][0];

        if ($err  ) {
            return [ 'status'=>false, 'data'=> $output ];
        } else {
            return ['status'=>true, 'data'=> $output ];
        }


    }
}
