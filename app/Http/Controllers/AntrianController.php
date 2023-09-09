<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AntrianController extends Controller
{
    // Menampilkan Antrian 
    public function index($slug)
    {
        return view('admin.antrian-masuk.index', [
            'layanan'   => Layanan::where('slug', $slug)
                ->orderBy('created_at', 'asc')
                ->first()
        ]);
    }

    // Function untuk button 'Ada'
    public function ada($id)
    {
        $antrian = Antrian::findOrFail($id);
        Antrian::destroy($antrian->id);

        alert()->toast('Antrian Ada, Selanjutnya !', 'success');
        return redirect()->back();
    }

     // Function untuk button 'Lewati'
     public function lewati($id)
     {
        $antrian = Antrian::findOrFail($id);
        $antrian->update(['created_at' => now()]);
        
        alert()->toast('Antrian Dilewati !', 'info');
        return redirect()->back();
     }

    //  Reset Antrian masuk berdasarkan tanggal hari ini
    public function reset()
    {
        $todayDate = Carbon::now('Asia/Jakarta')->toDateString();
        Antrian::whereDate('tgl_datang', $todayDate)->delete();

        alert()->toast('Antrian hari ini berhasil di Reset !', 'success');
        return redirect()->back();
    }
}
