<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Susut extends Model
{
    use HasFactory;

    protected $table = 'susutpln';
protected $fillable = ['tanggal', 'jumlah_susut'];

}
