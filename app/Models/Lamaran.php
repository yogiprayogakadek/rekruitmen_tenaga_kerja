<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $table = 'lamaran';
    protected $guarded = ['id'];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'pelamar_id', 'id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id', 'id');
    }
}
