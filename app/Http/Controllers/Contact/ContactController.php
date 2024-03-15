<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchVal = $request->search;
        $contacts = Contact::where('first_name', 'like', '%' . $searchVal . '%')
        ->orWhere('middle_name', 'like', '%' . $searchVal . '%')
        ->orWhere('last_name', 'like', '%' . $searchVal . '%')
        ->orWhere('email_address', 'like', '%' . $searchVal . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('contact.index', compact('contacts', 'searchVal'));
    }

    public function table(Request $request){
        
        if ($request->ajax()) {

            $contacts = Contact::select('id', 'first_name', 'middle_name', 'last_name', 'email_address');

            return DataTables::of($contacts)
            ->addColumn('action', 'contact.table-button')
            ->toJson();
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required',
        ]);

        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->middle_name = $request->middle_name;
        $contact->last_name = $request->last_name;
        $contact->email_address = $request->email_address;
        $contact->save();

        Alert::toast('New Contact Successfully Added', 'success');
        return redirect()->route('contacts.index');
    }

    public function show(Contact $contact) {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {

        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required',
        ]);

        $contact->first_name = $request->first_name;
        $contact->middle_name = $request->middle_name;
        $contact->last_name = $request->last_name;
        $contact->email_address = $request->email_address;
        $contact->save();

        Alert::toast('Contact Successfully Updated', 'info');
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact, Request $request)
    {

        if ($request->ajax()) {

            $contact->delete();
            return response()->json([
                'success' => true,
                'message' => 'Contact Successfully Deleted',

            ], Response::HTTP_OK);
        }

        Alert::toast('Contact Successfully Deleted', 'success');

        $contact->delete();
        return redirect()->route('contacts.index');


    }
}
