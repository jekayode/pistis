<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms;

class NotifyController extends Controller
{
    public function sms(Request $request)
        {
            /** DEMO
                $transactionId = "ATQid_c1730a26e7d5374bd82e8c27827cea51";
                $status = "Success";
            **/

            $messageId = $_POST["id"];
            $status = $_POST["status"];
            $number= $_POST["phoneNumber"];
            $networkCode = $_POST["networkCode"];
            $api_message = $_POST["failureReason"];

            $sms = Sms::where('messageId', $messageId)->first();
            $sms->status = "completed";
            $sms->api_status = $status;
            $sms->networkCode = $networkCode;
            $sms->api_message = $api_message;
            $sms->save();

        }
}
