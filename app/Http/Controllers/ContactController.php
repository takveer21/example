<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index(){
        // $contacts = Contact::all();
        $contacts = DB::table('contacts')->get();
        // return $contacts;
        return view('public.contact.index',compact('contacts'));
    }

    public function createContact(Request $request){
        // return $request->all();
        // Contact::create($request->all());

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        // DB::table('contacts')->insert([
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
        //     'message' => $request->message,
        //     'created_at' => Carbon::now()
        // ]);

        return back();
    }
}
