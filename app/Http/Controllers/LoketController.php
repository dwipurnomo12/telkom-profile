<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class LoketController extends Controller
{

    public function index()
    {
        // Ambil semua layanan
        $layanans = Layanan::all();
    
        // Ambil tanggal hari ini
        $todayDate = Carbon::now()->toDateString();
    
        // Looping layanan dan mengambil nomor antrian berdasarkan tanggal hari ini
        foreach ($layanans as $layanan) {
            $layanan->antrians = $layanan->antrians()
                ->whereDate('tgl_datang', $todayDate)
                ->orderBy('created_at', 'asc')
                ->first();
        }
    
        return view('admin.tampilan-loket.index', [
            'layanans' => $layanans
        ]);
    }
}
