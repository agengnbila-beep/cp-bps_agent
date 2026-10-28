<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DataInformasi extends Model
{
    protected $table = 'data_informasi';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $casts = ['is_published' => 'boolean', 'created_at' => 'datetime'];
}