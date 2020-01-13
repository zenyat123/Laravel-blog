<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contact;

class ContactController extends Controller
{

    public function __construct()
    {

        $this->middleware("auth");
        $this->middleware("rol.admin");

    }

    public function index()
    {
        
        $contacts = Contact::get();

        return view("admin.contact.index", compact("contacts"));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
 
    public function show(Contact $contact)
    {
        
        return view("admin.contact.show", compact("contact"));

    }
 
    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        
        $contact->delete();

        return redirect()->route("contact.index")->with("response", "contacto eliminado");

    }

}