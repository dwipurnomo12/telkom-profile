<?php

namespace App\Models;

use App\Models\Layanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Antrian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function layanans()
    {
        return $this->hasMany(Layanan::class);
    }
}