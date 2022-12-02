<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Carbon;

class Pasien extends Model
{
    use HasFactory;
    protected $primaryKey = 'pasien_id';
    // protected $primaryKey = ['pasien_id'];
    protected $guarded = ['pasien_id'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

}
