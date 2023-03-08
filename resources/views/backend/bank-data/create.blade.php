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
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Tambah {{ ucwords( Request::segment(1) )}}</h5>
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
                    <li class="breadcrumb-item"><a href="{{ route('bank-data.index') }}">{{ ucwords( Request::segment(1)
                            )}}</a> </li>
                    <li class="breadcrumb-item"><a href="{{ route('bank-data.index') }}">{{ ucwords( Request::segment(2
                            )
                            )}}</a> </li>
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
                        <h6 class="fw-bold">Tambah Data</h6>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('bank-data.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="id_virus" class="form-label">Nama Pengarang<small
                                            class="text-danger">*</small>
                                    </label>
                                    <select name="nama_pengarang" id="nama_pengarang"
                                        class="form-control @error('nama_pengarang') is-invalid @enderror ">
                                        @foreach ($pengarang as $item)
                                        <option value="{{ $item->id }}" {{ old('nama_pengarang')==$item->id ? 'selected'
                                            : ' ' }}>{{ $item->nama_pengarang }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_pengarang')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="id_virus" class="form-label">Judul Artikel<small
                                            class="text-danger">*</small>
                                    </label>
                                    <input type="text" name="judul_artikel" id="judul_artikel"
                                        value="{{ old('judul_artikel') }}"
                                        class="form-control @error('judul_artikel') is-invalid @enderror"
                                        placeholder="Masukkan Judul Artikel">
                                    @error('judul_artikel')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="kode_sampel" class="form-label">Tempat Pengambilan Sampel<small
                                            class="text-danger"> *</small> </label>
                                    <input type="text" name="tempat" id="tempat"
                                        class="form-control @error('tempat') is-invalid @enderror"
                                        placeholder="Masukkan Tempat Pengambilan Sampel" value="{{ old('tempat') }}">
                                    @error('tempat')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="kode_sampel" class="form-label">Tahun Pengumpulan Sampel<small
                                            class="text-danger"> *</small></label>
                                    <div class="input-group ">
                                        <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="date" name="tanggal" placeholder="Tanggal Pengambilan"
                                            value="{{ old('tanggal') }}">
                                        <span class="input-group-text  addon-style" id="icon-date">
                                            <label class="">
                                                <i class="fa fa-calendar"></i>
                                            </label>
                                        </span>
                                        @error('tanggal')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="kode_sampel" class="form-label">Provinsi<small class="text-danger">
                                            *</small> </label>
                                    <select name="id_provinsi" id="id_provinsi"
                                        class="form-control  @error('id_provinsi') is-invalid @enderror">
                                        @foreach ($provinsi as $item)
                                        <option value="{{ $item->id }} ">
                                            {{ $item->nama_provinsi }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_provinsi')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="kode_sampel" class="form-label">Kota/Kabupaten<small
                                            class="text-danger"> *</small> </label>
                                    <select name="id_kabupaten" id="id_kabupaten"
                                        class="form-control @error('id_kabupaten') is-invalid @enderror">
                                    </select>
                                    @error('id_kabupaten')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="kode_sampel" class="form-label">Kode Sampel <small
                                            class="text-danger">*</small>
                                    </label>
                                    <input type="text" name="kode_sampel" id="kode_sampel"
                                        class="form-control   @error('kode_sampel') is-invalid @enderror"
                                        placeholder="Masukkan Kode Sampel">
                                    @error('kode_sampel')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="id_virus" class="form-label">Nama Virus<small
                                            class="text-danger">*</small>
                                    </label>
                                    <select name="id_virus" id="id_virus"
                                        class="form-control @error('id_virus') is-invalid @enderror ">
                                        @foreach ($virus as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_virus }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_virus')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="genotipe" class="form-label">Genotipe<small
                                            class="text-danger">*</small>
                                    </label>
                                    <select name="genotipe" id="genotipe"
                                        class="form-control @error('genotipe') is-invalid @enderror ">
                                        @foreach ($genotipe as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode_genotipe }}</option>
                                        @endforeach
                                    </select>
                                    @error('genotipe')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="kode_sampel" class="form-label">Gen<small class="text-danger">*</small>
                                    </label>
                                    <input type="text" name="nama_gen" id="nama_gen"
                                        class="form-control   @error('nama_gen') is-invalid @enderror"
                                        placeholder="Masukkan Kode Sampel">
                                    @error('nama_gen')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-8 mb-3">
                                    <label for="genotipe" class="form-label">Data Sekuen<small
                                            class="text-danger">*</small>
                                    </label>
                                    <textarea rows="10" type="text" name="data_sekuen" id="data_sekuen"
                                        class="form-control @error('data_sekuen') is-invalid @enderror "
                                        placeholder="Masukkan Data Sekuen"></textarea>
                                    @error('data_sekuen')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <a href="{{  route('bank-data.index') }} " class="btn btn-danger me-1">Batal</a>
                                <button class="btn btn-primary">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- [ page content ] end -->
            </div>
        </div>
    </div>
</div>
@endsection
@include('template.partials.alert')
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    $(document).ready(function () {

        $( function() {
            $('#icon-date').on('click', function(){
                $('#date').focus();
            })
            $('#date').datepicker({
                autoclose: true,
                viewMode: 'years',
                format: 'yyyy-mm',
                minViewMode: 1,
                zIndexOffset : 999,
                orientation:'bottom',
            });
        });
        
        $('#id_provinsi').change(function(){
            $.ajax({
                type: "get",
                url: "/kabupaten",
                data: {
                    id_provinsi : $('#id_provinsi').val(),
                },
                success: function(res){
                    var html = '';
                    for (var i = 0; i < res.length ; ++i) {
                        html +=`<option value="`+ res[i]['id'] + `">` + res[i]['nama_kabupaten'] + `</option>`;
                    }
                    $('#id_kabupaten').html(html);
                }
            });
        });
    });
</script>
@endpush
