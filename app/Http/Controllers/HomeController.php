<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $about = DB::table('abouts')->first();
        $photoDescription = DB::table('photo_descriptions')->first();
        $contact = DB::table('contacts')->first();
        $orders = Order::all();

        return view('home') 
        ->with(compact('about'))
        ->with(compact('photoDescription'))
        ->with(compact('contact'))
        ->with(compact('orders'));
    }
}
