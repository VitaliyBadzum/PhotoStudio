<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $count = DB::table('contacts')->count();
        if($count==0){
            DB::table('contacts')->insert(
                ['address' => '',
                'phone' => '',
                'email' => '',
                'instagram' => '',
                'twitter' => '',
                'facebook' => '',
            ]);
        }
        $contact = DB::table('contacts')->first();
        return view('admin.contact.edit', compact('contact'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updateData = $request->validate([
            'address' => 'required|max:200',
            'phone' => 'required|max:20',
            'email' => 'required|max:30',
            'instagram' => 'required|max:100',
            'twitter' => 'required|max:100',
            'facebook' => 'required|max:100',
        ]);
        $contact = DB::table('contacts')->first()->id;

        DB::table('contacts')
            ->where('id', $contact)
            ->update([
            'address' => $updateData['address'],
            'phone' => $updateData['phone'],
            'email' => $updateData['email'],
            'instagram' => $updateData['instagram'],
            'twitter' => $updateData['twitter'],
            'facebook' => $updateData['facebook'],
        ]);

        return redirect('/contact/edit')->with('completed', 'Змінено!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}

