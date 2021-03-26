<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    
    public function submit(Request $req) {
        $validation = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ]);

        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success','Your data is accepted');
    }

    public function allData(){
        $contact = new Contact;
        // $contact->orderBy('id','asc')->skip(1)->take(1)->get()
        // $contact->where('name','=','Bob')->get()
        return view('messages', ['data' => $contact->all()]);
    }
    
    public function showOneMessage($id){
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)]);
    }
    public function updateMessage($id){
        $contact = new Contact;
        return view('update-message', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, Request $req) {
        $validation = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ]);

        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success','Your data is updated');
    }
    
    public function deleteMessage($id){
        Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success','Your data is deleted');
    }
}
