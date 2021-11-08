<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Contact;

class ContactController extends ApiResponseController
{

    public function sendcontact(Request $request)
    {

    	Contact::create($request->all());

        $data = [

            "names" => $request->names,
            "email" => $request->email,
            "comments" => $request->message

        ];

        Mail::send("emails.contact", $data, function($mail)
        {

            $mail->from("test@test.com");
            $mail->to("zenyat123@gmail.com");
            $mail->subject("Nuevo contacto");

        });

    	return $this->successResponse($request);

    }

}