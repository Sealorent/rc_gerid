@extends('template.template')
@section('content')
<style>
    .table {
        table-layout: fixed !important;
        white-space: inherit;
    }

    table td {
        word-wrap: break-word;
        overflow: hidden;
        white-space: inherit !important;
    }

    table th {
        word-wrap: break-word;
        overflow: hidden;
        white-space: inherit !important;
    }
</style>
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="fa fa-clipboard bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Data Penulis</h5>
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
                    <li class="breadcrumb-item"><a href="">Detail Penulis</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="pcoded-inner-content m-0">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- [ page content ] start -->
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between align-middle">
                            <h6 class="mt-2 fw-bold">Detail Penulis</h6>
                            {{-- <a href="{{ route('pengarang.create') }}" class="btn btn-primary">Tambah Data</a> --}}
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">#</th>
                                        <th>Artikel</th>
                                        <th>Tempat</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 10%">#</th>
                                        <th>Artikel</th>
                                        <th>Tempat</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->judul_artikel }}</td>
                                        <td>{{ getKota($item->id_kota)." , " .getProvinsi($item->id_provinsi) }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data Masih Tidak ada</td>
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
@include('template.partials.alert')
@php
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
<script>
    $(document).ready(function () {
        $('.table').DataTable();
    });
</script>
@endpush
