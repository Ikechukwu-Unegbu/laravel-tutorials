<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use App\Mail\notifyMail;
use Illuminate\Support\Facades\Mail;

class FeatureTestController extends Controller
{
    public function emailSendingWithQueu(){
        $details['email'] = 'iunegbu94@yahoo.com';
        // $mail = new notifyMail();
        // Mail::to('iunegbu94@yahoo.com')->send($mail);
        dispatch(new SendEmailJob($details));
    }
}
