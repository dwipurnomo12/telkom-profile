<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

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
        $layanans = Layanan::all();
        $todayDate = Carbon::now('Asia/Jakarta')->toDateString();

        foreach ($layanans as $layanan) {
            $layanan->antrians = $layanan->antrians()
                ->whereDate('tgl_datang', $todayDate)
                ->orderBy('created_at', 'asc')
                ->count();
        }

        return view('admin.dashboard', [
            'layanans'  => $layanans
        ]);
    }
}
