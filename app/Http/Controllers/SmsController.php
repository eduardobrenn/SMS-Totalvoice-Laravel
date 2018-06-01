<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Minerva\TotalVoice\TotalVoice;
use Minerva\TotalVoice\SMS\SMS;

class SmsController extends Controller
{
    public function index()
    {
        return view("sms");
    }

    public function envio(Request $request)
    {
        $sms = new SMS(); 
        $sms->setNumber($request->number); 
        $sms->setText($request->text); 

        TotalVoice::$token = 'Token'; 
        $response = TotalVoice::sendSms($sms); 
        var_dump($response->getContent());
    }
}
