<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataIndikator extends Model
{
    protected $table = 'data_indikator';
    protected $guarded = ['id'];
    public $timestamps = false;

    protected $casts = [
        'is_published' => 'boolean',
        'diperbarui_pada' => 'datetime',
    ];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'indikator_id');
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }
}