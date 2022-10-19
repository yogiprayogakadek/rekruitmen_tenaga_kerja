<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelamar extends Authenticatable
{
    use HasFactory;

    protected $table = 'pelamar';
    protected $guarded = ['id'];

    public function lamaran()
    {
        return $this->hasOne(Lamaran::class, 'pelamar_id', 'id');
    }
}
