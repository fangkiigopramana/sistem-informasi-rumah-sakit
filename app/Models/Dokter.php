<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $guarded = ['dokter_id'];
    protected $primaryKey = 'dokter_id';

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
