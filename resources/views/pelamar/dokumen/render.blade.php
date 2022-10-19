@foreach (json_decode($pelamar->documents, true) as $key => $value)
    <td>
        {!! $value == 'empty' ? '<span class="badge bg-primary pointer btn-upload" data-id="'.$pelamar->id.'" data-document="'.$key.'">Unggah</span>' : '<a href="'.asset($value).'" target="_blank"><span class="badge bg-info">View</span></a>  <span class="badge bg-secondary pointer btn-upload" data-id="'.$pelamar->id.'" data-document="'.$key.'">Ubah</span>' !!}
    </td>
@endforeach
