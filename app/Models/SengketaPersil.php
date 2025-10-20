<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SengketaPersil extends Model
{
    protected $table = 'sengketa_persil';
    protected $primaryKey = 'sengketa_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'persil_id',
        'pihak_1',
        'pihak_2',
        'kronologi',
        'status',
        'penyelesaian',
        'file_path',
    ];

    public function persil(): BelongsTo
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
    }
}


