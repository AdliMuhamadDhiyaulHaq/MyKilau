<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'tbl_program';

    protected $fillable = [
        'sumber_dana',
        'program',
        'keterangan',
    ];
}
