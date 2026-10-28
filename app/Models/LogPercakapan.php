<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LogPercakapan extends Model
{
    protected $table = 'log_percakapan';
    protected $guarded = ['id'];
    public $timestamps = false; // Kita hanya pakai created_at bawaan Postgres
    protected $casts = ['created_at' => 'datetime'];
}