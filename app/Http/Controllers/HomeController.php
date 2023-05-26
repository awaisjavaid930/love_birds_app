<?php

namespace App\Http\Controllers;

use App\Models\LoveBirdParent;
use Auth;

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
        $parents = LoveBirdParent::with('chicks')->whereUserId(Auth::id())->get();

        return view('home', compact('parents'));
    }
}
