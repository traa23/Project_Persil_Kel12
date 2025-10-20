<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetaPersil extends Model
{
    protected $table = 'peta_persil';
    protected $primaryKey = 'peta_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'persil_id',
        'geojson',
        'panjang_m',
        'lebar_m',
        'file_path',
    ];

    protected $casts = [
        'panjang_m' => 'decimal:2',
        'lebar_m' => 'decimal:2',
    ];

    public function persil(): BelongsTo
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
    }
}


