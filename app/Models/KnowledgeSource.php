<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'title',
    'type',
    'data_category',
    'description',
    'content',
    'file_path',
    'original_filename',
    'mime_type',
    'file_size',
    'status',
    'processing_error',
    'processed_at',
    'created_by',
])]
class KnowledgeSource extends Model
{
    /**
     * Kategori sumber data.
     */
    public const CATEGORY_TABEL = 'tabel';
    public const CATEGORY_PARAGRAF = 'paragraf';

    /**
     * Pengguna yang menambahkan sumber data.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }

    /**
     * Konversi tipe data otomatis.
     */
    protected function casts(): array
    {
        return [
            'file_size' => 'integer',
            'processed_at' => 'datetime',
        ];
    }
}
