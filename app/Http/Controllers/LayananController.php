<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.layanan.index', [
            'layanans'  => Layanan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nm_layanan'    => 'required',
            'slug'          => 'required',
            'kd_layanan'    => 'required|unique:layanans',
            'deskripsi'     => 'required',
            'batas_antrian' => 'required',
        ], [
            'nm_layanan.required'       => 'Form tidak boleh kosong !',
            'slug.required'             => 'Form tidak boleh kosong !',
            'kd_layanan.required'       => 'Form tidak boleh kosong !',
            'kd_layanan.unique'         => 'Kode tidak boleh sama !',
            'deskripsi.required'        => 'Form tidak boleh kosong !',
            'batas_antrian.required'    => 'Form tidak boleh kosong !',
        ]);

        if ($validator->fails()) {
            return redirect('/layanan/create')
                ->withErrors($validator)
                ->withInput();
        }

        $request->merge([
            'user_id'   => auth()->user()->id
        ]);

        Layanan::create([
            'nm_layanan'    => $request->nm_layanan,
            'slug'          => $request->slug,
            'kd_layanan'    => $request->kd_layanan,
            'deskripsi'     => $request->deskripsi,
            'batas_antrian' => $request->batas_antrian,
            'user_id'       => $request->user_id
        ]);

        return redirect('/layanan')->with('success', 'Berhasil menambahkan layanan baru !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan = Layanan::find($id);
        return view('admin.layanan.edit', [
            'layanan' => $layanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan = Layanan::find($id);
        $validator = Validator::make($request->all(), [
            'nm_layanan'    => 'required',
            'slug'          => 'required|unique:layanans,slug,' . $layanan->id,
            'kd_layanan'    => 'required|unique:layanans,kd_layanan,' . $layanan->id,
            'deskripsi'     => 'required',
            'batas_antrian' => 'required',
        ], [
            'nm_layanan.required'       => 'Form tidak boleh kosong !',
            'slug.required'             => 'Form tidak boleh kosong !',
            'kd_layanan.required'       => 'Form tidak boleh kosong !',
            'kd_layanan.unique'         => 'Kode tidak boleh sama !',
            'deskripsi.required'        => 'Form tidak boleh kosong !',
            'batas_antrian.required'    => 'Form tidak boleh kosong !',
        ]);

        // if($request->kd_layanan != $layanan->kd_layanan){
        //     $validator['kd_layanan']   = 'required|unique:layanans'; 
        // }

        // if($request->slug != $layanan->slug){
        //     $validator['slug']  = 'required|unique:layanans';
        // }

        if ($validator->fails()) {
            return redirect('/layanan/' . $layanan->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $layanan->update([
            'nm_layanan'    => $request->nm_layanan,
            'slug'          => $request->slug,
            'kd_layanan'    => $request->kd_layanan,
            'deskripsi'     => $request->deskripsi,
            'batas_antrian' => $request->batas_antrian,
            'user_id'       => auth()->user()->id
        ]);

        return redirect('/layanan')->with('success', 'Berhasil Mengedit Data layanan !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Layanan::find($id)->delete();
        return redirect('/layanan')->with('success', 'Berhasil Menhapus Data layanan !');
    }
    
    /**
     * Generate Slug by Layanan
     */
    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Layanan::class, 'slug', $request->nm_layanan);
        return response()->json(['slug' => $slug]);
    }
}
