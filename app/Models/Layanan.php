<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Layanan extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug'  => [
                'source'    => 'nm_layanan'
            ]
        ];
    }
    
    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }
}
