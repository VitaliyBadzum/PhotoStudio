<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PhotoDescriptionController extends Controller
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
     * @param  \App\Models\PhotoDescription  $photoDescription
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoDescription $photoDescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhotoDescription  $photoDescription
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $count = DB::table('photo_descriptions')->count();
        if($count==0){
            DB::table('photo_descriptions')->insert(
                ['title' => '',
                'description' => '',
            ]);
        }
        $photoDescription = DB::table('photo_descriptions')->first();
        return view('admin.photoDescription.edit', compact('photoDescription'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhotoDescription  $photoDescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updateData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:500',
        ]);
        $photoDescription = DB::table('photo_descriptions')->first()->id;
        
        DB::table('photo_descriptions')
            ->where('id', $photoDescription)
            ->update([
            'title' => $updateData['title'],
            'description' => $updateData['description'],
        ]);
        return redirect('/photodescription/edit')->with('completed', 'Змінено!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhotoDescription  $photoDescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoDescription $photoDescription)
    {
        //
    }
}
