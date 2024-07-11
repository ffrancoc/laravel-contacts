<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_list = Contact::paginate(10);
        return view('contacts', ['contacts' => $contact_list, 'contact' => null]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $contact = new Contact();        
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $contact_list = Contact::all();        
        return view('contacts', ['contacts' => $contact_list, 'contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreContactRequest $request, Contact $contact)
    {
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
