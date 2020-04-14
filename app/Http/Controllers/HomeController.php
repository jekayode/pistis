<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $phones = DB::table('phones')->get();
        $phoneTotal = count($phones);
        $phone_sent = DB::table('phones')->where('status', 'sent')->get();
        $phone_pending = DB::table('phones')->where('status', 'pending')->get();
        $phone_sentTotal = count($phone_sent);
        $phone_pendingTotal = count($phone_pending);
        return view('home', compact('phones', 'phoneTotal', 'phone_sentTotal', 'phone_pendingTotal'));
    }

    public function phones()
    {
        $phones = DB::table('phones')->get();
        return view('phones', compact('phones'));
    }
}