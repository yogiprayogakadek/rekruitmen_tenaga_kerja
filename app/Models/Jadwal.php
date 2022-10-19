<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $guarded = ['id'];

    public function lamaran()
    {
        return $this->hasOne(Lamaran::class, 'id', 'lamaran_id');
    }

    public function prainterview()
    {
        return $this->belongsTo(PraInterview::class, 'id', 'jadwal_id');
    }

    public function finalinterview()
    {
        return $this->belongsTo(FinalInterview::class, 'id', 'jadwal_id');
    }
}
