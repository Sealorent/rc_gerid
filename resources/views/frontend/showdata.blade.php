@extends('frontend.template')
<style>
    a {}

    thead {
        display: none;
        margin-bottom: 2em;
    }

    .table {
        table-layout: fixed !important;
        white-space: inherit;
    }

    table td,
    th {
        word-wrap: break-word;
        overflow: hidden;
        white-space: inherit !important;

    }

    footer {
        margin-top: auto;
        bottom: 0;
    }
</style>
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endpush
@section('content')

<div class="card mb-5 mt-2">
    <div class="card-header">
        <h5>Results 1 of 2</h5>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table class="table nowrap" style="border:none" id="datatable">
                <thead>
                    <tr>
                        <th style="width: 1em">Column 1</th>
                        <th style="width: 90%">Column 2</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($data as $item)
                    <tr>
                        <td style="width: 1;border:none" class="">
                            <input class="form-check-input" type="checkbox" id="check1" name="option1"
                                value="something">
                            <p>1</p>
                        </td>
                        <td style="width: 90%;border:none">
                            <div class=" text-start">
                                <div class="mb-1 text-muted">{{ $item->name }}</div>
                                <h5 class="d-inline-block mb-2 text-primary"><a
                                        href="{{ route('home.detail',$item->id) }}"
                                        class="break_word">{{$item->judul_artikel }}</a>
                                </h5>
                                <h6 class="mb-0 " style="font-weight: 800">{{
                                    getKota($item->id_kota).','.getProvinsi($item->id_provinsi) }}
                                </h6>
                                <p>{{ $item->nama_pengarang }} | {{ tanggal_indo($item->tanggal_pengambilan) }}</p>
                                <h6><a href="{{ route('fasta.detail',$item->id) }}">Fasta</a> </h6>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@php
function tanggal_indo($tanggal)
{
$bulan = array (1 => 'Januari',
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
'Desember'
);
$split = explode('-', $tanggal);
return $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function getProvinsi($id)
{
$prov = App\Models\Provinsi::where('id', $id)->pluck('nama_provinsi')[0];
return $prov;
}
function getKota($id)
{
$kab = App\Models\Kabupaten::where('id', $id)->pluck('nama_kabupaten')[0];
return $kab;
}
@endphp
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
    integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready( function () {
    $('#datatable').DataTable({
      "dom": 'rftp'
    });
  });
</script>
@endpush
