<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\PDF;


class FrontendAntrianController extends Controller
{
    public function daftar($slug)
    {
        return view('antrian.daftar', [
            'layanan'   => Layanan::where('slug', $slug)->first()
        ]);
    }

    // FUngsi untuk mengambil antrian
    public function store(Request $request, $slug)
    {
        $layanan = Layanan::where('slug', $slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'tgl_datang'    => 'required|date',
            'nm_lengkap'    => 'required',
            'alamat'        => 'required',
            'layanan_id'    => 'required',
        ], [
            'tgl_datang.required'    => 'Form wajib di isi !',
            'tgl_datang.date'        => 'Wajib berupa format tanggal',
            'nm_lengkap.required'    => 'Form wajib di isi !',
            'alamat.required'        => 'Form wajib di isi !',
            'layanan_id.required'    => 'Form wajib di isi !'
        ]);

        if ($validator->fails()) {
            return redirect('/antrian/daftar/' . $layanan->slug)
                ->withErrors($validator)
                ->withInput();
        }

        $tanggalDatang  = $request->input('tgl_datang');
        $jumlahAntrian  = Antrian::where('layanan_id', $layanan->id)
            ->whereDate('tgl_datang', $tanggalDatang)
            ->count();
        $kodeLayanan    = $layanan->kd_layanan;
        $nomorAntrian   = str_pad($jumlahAntrian + 1, 3, '0', STR_PAD_LEFT);
        $kodeAntrian    = $kodeLayanan . '-' . $nomorAntrian;

        $antrian = new Antrian([
            'tgl_datang'    => $request->input('tgl_datang'),
            'nm_lengkap'    => $request->input('nm_lengkap'),
            'alamat'        => $request->input('alamat'),
            'no_antrian'    => $kodeAntrian,
            'layanan_id'    => $request->input('layanan_id'),
            'user_id'       => auth()->user()->id
        ]);

        $antrian->save();
        return redirect()->back()->with('success', 'Berhasil Mengambil Antrian !');
    }

    // Function untuk menampilkan antrian berdasarkan pengunjung yang sedang login
    public function antrianSaya()
    {
        $antrian = Antrian::where('user_id', auth()->user()->id)->get();
        return view('antrian.antrian-saya', [
            'antrians'   => $antrian
        ]);
    }

    // Function untuk hapus antrian
    public function hapusAntrian($id)
    {
        $antrian = Antrian::findOrFail($id);
        Antrian::destroy($antrian->id);

        return redirect()->back()->with('success', 'Berhasil menghapus antrian');
    }

    // Function untuk cetak antrian
    public function cetakAntrian(Antrian $id)
    {
        $cetakAntrian = Antrian::find($id->id);
        $logoPath     = storage_path('app/public/logo/logo-telkom.png');
        $logo         = base64_encode(file_get_contents($logoPath));

        $pdf = PDF::loadView('antrian.cetak-antrian', [
            'cetakAntrian'  => $cetakAntrian,
            'logo'          => $logo
        ]);

        return $pdf->stream('nomor-antrian.pdf');
    }
}
