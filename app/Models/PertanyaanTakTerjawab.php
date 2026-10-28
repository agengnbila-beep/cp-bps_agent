<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PertanyaanTakTerjawab extends Model
{
    protected $table = 'pertanyaan_tak_terjawab';
    protected $guarded = ['id'];
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
    ];
}