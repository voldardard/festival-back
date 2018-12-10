<?php

namespace App\Http\Controllers\Mail;

use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
Use Illuminate\Support\Facades\Auth;
Use Lang;


class Mailer
{
    public static function sendOrderConfirmation($orderID, $email){
        $obj = new \stdClass();
        $users_email=$email;
        $obj->id=$orderID;

        $array['html'] = 'mails.lang.'.\App::getLocale().'.orderConfirmation';
        $array['subject']= lang::get('mail.orderConfirmation');


        Mail::to($users_email)->queue(new OrderConfirmation($obj, $array));


    }
}