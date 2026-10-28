<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';
    protected $guarded = ['id'];
    
    // Matikan timestamps karena tabel Python tidak punya created_at/updated_at
    public $timestamps = false; 

    protected $casts = [
        'is_published' => 'boolean',
    ];
    protected static ?string $navigationGroup = 'Data';
    protected static ?int $navigationSort = 1; // Urutan menu
}