<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenPersil extends Model
{
    protected $table = 'dokumen_persil';
    protected $primaryKey = 'dokumen_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'persil_id',
        'jenis_dokumen',
        'nomor',
        'keterangan',
        'file_path',
    ];

    public function persil(): BelongsTo
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
    }
}


