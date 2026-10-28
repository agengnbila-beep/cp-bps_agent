<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = 'indikator';
    protected $guarded = ['id'];
    public $timestamps = false;

    // Cast kolom sinonim (PostgreSQL array) menjadi array di Laravel
    protected $casts = [
        'sinonim' => 'array',
        'is_published' => 'boolean',
        'created_at' => 'datetime',
    ];
        public function dataIndikators()
    {
        return $this->hasMany(DataIndikator::class, 'indikator_id');
    }
}