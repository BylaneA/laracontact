<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use DB;
use App\Model\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Auth::user()->contacts()->paginate(5);

        return view('contacts.index')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
            'fullname' => 'required|min:2',
            'function' => 'required|min:5',
            'title' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'birthday' => 'required|date'
        ]);
        $contact = Auth::user()->contacts()->create([
            'fullname' => $request->fullname,
            'title' => $request->title,
            'function' => $request->function,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'birthday' => $request->birthday
        ]);
        foreach($request->groups as $g)
        {
            // insertion du groupe selectionne dans la table intermediaire
            DB::table('group_contact')->insert([
                'contact_id' => $contact->id,
                'group_id' => $g,
                'created_at' => Carbon::now()
            ]);
        }

        $request->session()->flash('success', 'Insertion réussie.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
      $groups = DB::table('groups')
                ->join('group_contact', 'groups.id', '=', 'group_contact.group_id')
                ->select('groups.*', 'group_contact.contact_id')
                ->get();

   return view('contacts.show')->with('contact', $contact)
                                ->with('groups', $groups);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
