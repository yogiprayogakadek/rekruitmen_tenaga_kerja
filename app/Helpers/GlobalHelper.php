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

    function total_data_model($model) {
        $total = 0;

        $a = 'App\Models\\' . $model;
        $total = $a::count();

        return $total;
    }

    function needValidate(){
        return Lamaran::wherenull('status')->count();
    }

    function bulan()
    {
        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];

        return $bulan;
    }
