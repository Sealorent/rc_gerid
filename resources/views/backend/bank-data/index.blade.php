@extends('template.template')
@section('content')
<style>
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
</style>
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-folder bg-c-blue"></i>
                <div class="d-inline">
                    <h5>{{ ucwords( Request::segment(1) )}}</h5>
                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="">{{ ucwords( Request::segment(1) )}}</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- [ page content ] start -->
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bold">Bank Data</h4>
                            <a href="{{ route('bank-data.create') }}" class="btn btn-primary"> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">#</th>
                                        <th style="width: 5%">Kode Sampel</th>
                                        <th style="width: 3% ">Virus</th>
                                        <th style="width: 4%;">Genotipe dan Subtipe
                                        </th>
                                        <th style="width: 3%">Tanggal</th>
                                        <th style="width: 5%">Tempat</th>
                                        <th style="width: 3%">Gen</th>
                                        <th style="width: 20%;">Data Sekuen</th>
                                        <th style="width: 5%">Judul</th>
                                        <th style="width: 5%">Author</th>
                                        <th style="width: 5%">Opsi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Sampel</th>
                                        <th>Virus</th>
                                        <th>Genotipe dan Subtipe</th>
                                        <th>Tanggal</th>
                                        <th>Tempat</th>
                                        <th>Gen</th>
                                        <th>Data Sekuen</th>
                                        <th>Judul</th>
                                        <th>Author</th>
                                        <th style="width: 5%">Opsi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($data as $item)
                                    @php
                                    $virus = App\Models\Virus::select('nama_virus')->where('id',$item->id_virus)->pluck('nama_virus')[0];
                                    $genotipe = App\Models\Genotipe::select('kode_genotipe')->where('id',$item->id_genotipe)->pluck('kode_genotipe')[0];
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_sampel }}</td>
                                        <td>{{ $virus }}</td>
                                        <td>{{ $genotipe }}</td>
                                        <td>{{ tanggal_indo($item->tanggal_pengambilan)}}</td>
                                        <td>{{ $item->tempat }}</td>
                                        <td>{{ $item->nama_gen }}</td>
                                        <td style="text-align: justify;">{{ $item->data_sekuen }}</td>
                                        <td>{{ $item->judul_artikel }}</td>
                                        <td>{{ $item->nama_pengarang.';'.$item->anggota }}</td>
                                        <td class="text-center ">
                                                <a class="btn btn-primary m-2"
                                                    href="{{ route('bank-data.edit',$item->id) }}"><i
                                                        class="fa fa-pencil text-center m-0"></i>
                                                </a>
                                                <form action="{{ route('bank-data.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                                            class="btn btn-danger"><i
                                                                class="fa fa-trash text-center m-0"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center"> Data Masih Belum ada</td>
                                    </tr>
                                    @endforelse

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- [ page content ] end -->
            </div>
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
@endphp
@include('template.partials.alert')
@push('js')
<script>
    $(document).ready(function () {
        $('.table').DataTable({
            "autoWidth": false,

        });
    });
</script>
@endpush
