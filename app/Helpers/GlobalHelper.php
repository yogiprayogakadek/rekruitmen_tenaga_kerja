<?php

use App\Models\Lamaran;
use App\Models\Pelamar;
use App\Models\Pengumuman;

    function model() {
        $data = [
            'Pelamar', 'Lamaran', 'Pengumuman'
        ];

        return $data;
    }

    function route_to_model() {
        $data = [
            'pelamar.index', 'lamaran.index', 'pengumuman.index'
        ];

        return $data;
    }

    function total_data_model() {
        $total = 0;
        
        foreach(model() as $key => $value) {
            $a = 'App\Models\\' . $value;
            $total = $a::count();
        }
        
        return $total;
    }