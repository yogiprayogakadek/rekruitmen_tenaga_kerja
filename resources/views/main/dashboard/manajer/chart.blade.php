<div>
    <canvas id="myChart" width="300px"></canvas>
</div>

<script>
    @if ($totalData == 0)
        $('body .render').html('<div class="alert alert-danger text-center">Tidak ada data pada bulan ini</div>');
    @endif

    $('body .chart-title').html('Chart {{$bulan}} {{$tahun}}');

    var label = [];
    var jumlah = [];
    var chart = '';

    @if ($filter == 'kelulusan')
        @foreach ($kelulusan as $key => $value)
            label.push('{{$value->hasil}}');
            jumlah.push('{{$value->total}}');
        @endforeach
        chart = 'bar';
    @else
        @foreach ($lamaran as $key => $value)
            label.push('{{ ($value->status == 1 ? "Disetujui" : "Ditolak") }}');
            jumlah.push('{{$value->total}}');
        @endforeach
        chart = 'pie';
    @endif

    var data = {
        labels: label,
        datasets: [{
            label: '{{$filter == "kelulusan" ? "Jumlah Kelulusan" : "Jumlah Pelamar"}}',
            data: jumlah,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    var config = {
        type: chart,
        data: data,
        options: {}
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>