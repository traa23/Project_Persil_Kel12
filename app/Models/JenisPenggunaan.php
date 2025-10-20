<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPenggunaan extends Model
{
    protected $table = 'jenis_penggunaan';
    protected $primaryKey = 'jenis_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_penggunaan',
        'keterangan',
    ];
}


