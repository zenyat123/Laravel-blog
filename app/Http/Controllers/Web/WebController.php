<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Contact;

class WebController extends Controller
{
    
	public function index()
	{

		return view("web.index");

	}

	public function categories()
	{

		return view("web.index");

	}

	public function category()
	{

		return view("web.index");

	}

	public function post()
	{

		return view("web.index");

	}

	public function contact()
	{

		return view("web.index");

	}

	public function sendcontact(Request $request)
	{

		$names = $request->names;

		$email = $request->email;

		$message = $request->message;

		$request_data = [

			"names" => $names,
			"email" => $email,
			"message" => $message,
			"send" => $message

		];

		Contact::create($request_data);

		Mail::send("emails.contact", $request_data, function($mail) use ($names, $email)
		{

			$mail->to($email, $names)
				 ->subject("Nuevo contacto");

		});

	}

}