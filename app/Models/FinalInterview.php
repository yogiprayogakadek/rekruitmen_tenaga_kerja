<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalInterview extends Model
{
    use HasFactory;

    protected $table = 'hasil_finalinterview';
    protected $guarded = ['id'];

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class, 'id', 'jadwal_id');
    }
}
