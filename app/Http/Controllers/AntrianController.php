<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AntrianController extends Controller
{
    public function index($slug)
    {
        return view('admin.antrian-masuk.index', [
            'layanan'   => Layanan::where('slug', $slug)->firstOrFail(),
        ]);
    }
}
