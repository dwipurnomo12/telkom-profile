<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class LoketController extends Controller
{

    public function index()
    {
        return view('admin.tampilan-loket.index');
    }

    public function getAntrian(Request $request)
    {
        $layananId = $request->input('layanan_id');
        $todayDate = Carbon::now('Asia/Jakarta')->toDateString();
        $antrian   = Antrian::where('layanan_id', $layananId)
            ->whereDate('tgl_datang', $todayDate)
            ->orderBy('created_at', 'asc')
            ->first();

        return response()->json([
            'antrian'   => $antrian
        ]);
        
    }
}
