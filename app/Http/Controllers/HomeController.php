<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;

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
        $paid = Tagihan::where('status', 'lunas')->count();
        $unpaid = Tagihan::where('status', 'belum')->count();

        // dd($unpaid);
        return view('dashboard', compact('paid', 'unpaid'));
    }
}
