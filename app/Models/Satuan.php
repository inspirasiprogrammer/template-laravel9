<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $table = 'tblsatuan';

    protected $fillable = [
        'nama',
        'keterangan',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
    ];
}
