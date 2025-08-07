<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['nama', 'tanggal', 'jam_mulai', 'jam_selesai', 'note'];

}
