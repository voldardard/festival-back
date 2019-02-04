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

        $obj->orderConfirmation=Lang::get('mail.orderConfirmation');
        $obj->reviewYourOrder=Lang::get('mail.reviewYourOrder');
        $obj->orderNr=Lang::get('mail.orderNr');
        $obj->state=Lang::get('mail.state');
        $obj->PDFInAttachement=Lang::get('mail.PDFInAttachement');
        $obj->GoToShop=Lang::get('mail.GoToShop');
        $obj->yourOrder=Lang::get('mail.yourOrder');
        $obj->goToYouOrder=Lang::get('mail.goToYouOrder');
        $obj->email=Lang::get('mail.email');
        $obj->id=$orderID;
        $obj->email_adress=$email;

        $array['html'] = 'mails.orderConfirmation';
        $array['subject']= lang::get('mail.title');


        Mail::to($users_email)->queue(new OrderConfirmation($obj, $array));


    }
}