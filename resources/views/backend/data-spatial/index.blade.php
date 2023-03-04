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

    .loader {
        position: absolute;
        bottom: 12em;
        align-items: center;
        z-index: 99999;
        opacity: 1;
    }
</style>
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="fa fa-globe bg-c-blue"></i>
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

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- [ page content ] start -->
                <div class="card">
                    <div class="card-header bg-light d-flex justify-content-between">
                        <h4 class="fw-bold">Map</h4>
                        <div class="d-flex justify-content-start">
                            <select name="id_virus" id="id_virus"
                                class="form-control  @error('id_virus') is-invalid @enderror" required>
                                @foreach ($virus as $item)
                                <option value="{{ $item->id }} ">
                                    {{ $item->nama_virus }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control  @error('tanggal') is-invalid @enderror" id="date"
                                name="date" style="padding-right: 2em" value="2017-08" placeholder="Bulan & Tahun"
                                required>
                            <button class="btn btn-primary filter">Filter</button>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-warning loader" id="spinner" role="status">
                                {{-- <span class="visually-hidden">Loading...</span> --}}
                            </div>
                        </div>
                        <div id="map">
                        </div>
                    </div>
                </div>
                <!-- [ page content ] end -->
            </div>
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- [ page content ] start -->
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bold">Data Spasial</h4>
                            <a href="{{ route('bank-data.create') }}" class="btn btn-primary"> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th style="width: 4%">Kode Sampel</th>
                                        <th style="width: 3% ">Virus</th>
                                        <th style="width: 4%;">Genotipe dan Subtipe</th>
                                        <th style="width: 4%">Bulan/Tahun Sampel</th>
                                        <th style="width: 5%;">Tempat Pengambilan</th>
                                        <th style="width: 5%">Kota Pengambilan</th>
                                        <th style="width: 5%">Provinsi Pengambilan</th>
                                        <th style="width: 5%">Opsi</th>
                                    </tr>
                                </thead>
                                <tfoot align="center">
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th style="width: 5%">Kode Sampel</th>
                                        <th style="width: 3% ">Virus</th>
                                        <th style="width: 4%;">Genotipe dan Subtipe</th>
                                        <th style="width: 5%">Bulan/Tahun Sampel</th>
                                        <th style="width: 9%;">Tempat Pengambilan</th>
                                        <th style="width: 5%">Kota Pengambilan</th>
                                        <th style="width: 5%">Provinsi Pengambilan</th>
                                        <th style="width: 5%">Opsi</th>
                                    </tr>
                                </tfoot>
                                <tbody align="center">
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
                                        <td>{{ tanggal_indo($item->tanggal_pengambilan) }}</td>
                                        <td>{{ $item->tempat}}</td>
                                        <td>{{ getKota($item->id_kota)}}</td>
                                        <td>{{ getProvinsi($item->id_provinsi) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <a class="btn btn-primary"
                                                    href="{{ route('bank-data.edit',$item->id) }}"
                                                    style="margin-right: 0.5em"><i
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
                                        <td colspan="9" class="text-center">Data Masih Belum ada</td>
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
@include('backend.data-spatial.leaflet')
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


<script>
    $('#date').datepicker({
        autoclose: true,
        viewMode: 'years',
        format: 'yyyy-mm',
        minViewMode: 1,
        zIndexOffset : 99999999,
    });

    $(document).ready(function () {
        $('.table').DataTable({
            "autoWidth": false,
        });
    });

</script>
@endpush
