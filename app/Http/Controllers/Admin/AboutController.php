<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $count = DB::table('abouts')->count();
        if($count==0){
            DB::table('abouts')->insert(
                ['title' => '',
                'description' => '',
                'path_photo' => '',
            ]);

        }
        $about = DB::table('abouts')->first();
        return view('admin.about.edit', compact('about'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $addPath ='';
        $updateData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:500',
            'path_photo' => 'max:100',
        ]);
        $about = DB::table('abouts')->first()->id;
        

        DB::table('abouts')
            ->where('id', $about)
            ->update([
            'title' => $updateData['title'],
            'description' => $updateData['description'],
            'path_photo' => $addPath.$updateData['path_photo'],
        ]);

        return redirect('/about/edit')->with('completed', 'Змінено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
