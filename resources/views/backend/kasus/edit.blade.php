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
                    <h5>Edit Bank Data</h5>
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
                    <li class="breadcrumb-item"><a href="{{ route('bank-data.index') }}">{{ ucwords( Request::segment(3
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
                        <h6 class="fw-bold">Edit Data</h6>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('kasus.update', $data->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-4">
                                    <label for="kode_sampel" class="form-label">Tahun<small class="text-danger"> *</small></label>
                                    <div class="input-group ">
                                        <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="date" name="tanggal" placeholder="Tanggal Pengambilan"
                                            value="{{ old('tanggal',date('Y',strtotime($data->tanggal))) }}">
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
                                    <label for="" class="form-label">No Kasus<small class="text-danger">*</small>
                                    </label>
                                    <input type="text" name="no_kasus" id="no_kasus" value="{{ old('no_kasus',$data->no_kasus) }}"
                                        class="form-control @error('no_kasus') is-invalid @enderror"
                                        placeholder="Masukkan No Kasus">
                                    @error('no_kasus')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="" class="form-label">IDKD <small class="text-danger">* </small>
                                    </label>
                                    <input type="text" name="nama" id="nama" value="{{ old('nama',$data->nama) }}"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Masukkan IDKD">
                                    <small class="text-primary fst-italic">Format : (NAMA-THN-BLN-TGL)</small>
                                    @error('nama')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="" class="form-label">Alamat IDKD <small
                                            class="text-danger">* </small>
                                    </label>
                                    <input type="text" name="alamat" id="alamat" value="{{ old('alamat',$data->alamat) }}"
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Masukkan Alamat IDKD">
                                    @error('alamat')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="" class="form-label">Umur <small
                                            class="text-danger">* </small>
                                    </label>
                                    <input type="text" name="umur" id="umur" value="{{ old('umur',$data->umur) }}"
                                        class="form-control @error('umur') is-invalid @enderror"
                                        placeholder="Masukkan umur IDKD">
                                    @error('umur')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="" class="form-label">Kelompok Umur<small
                                            class="text-danger">* </small>
                                    </label>
                                    <select name="kelompok_umur" id="kelompok_umur" class="form-control @error('kelompok_umur') is-invalid @enderror ">
                                            <option value="" >-- Pilih Kelompok Umur --</option>
                                            @foreach ($kelompokUmur as $item)
                                            <option value="{{ $item->id }}" {{ old('id',$data->kelompok_umur)==$item->id ? 'selected' : ' ' }}>{{ $item->kelompok_umur }}</option>
                                            @endforeach
                                    </select>
                                    @error('kelompok_umur')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="" class="form-label">Jenis Kelamin<small
                                            class="text-danger">* </small>
                                    </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror ">
                                            <option value="" >-- Pilih Jenis Kelamin --</option>
                                            <option value="1" {{ old('id',$data->jenis_kelamin)==1 ? 'selected' : ' ' }}>Male</option>
                                            <option value="2" {{ old('id',$data->jenis_kelamin)==2 ? 'selected' : ' ' }}>Female</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="" class="form-label">Transmisi<small
                                            class="text-danger">* </small>
                                    </label>
                                    <select name="transmisi" id="transmisi" class="form-control @error('transmisi') is-invalid @enderror ">
                                            <option value="" >-- Pilih Jenis Transmisi --</option>
                                            @foreach ($transmisi as $item)
                                            <option value="{{ $item->id }}" {{ old('id',$data->transmisi)==$item->id ? 'selected' : ' ' }}>{{ $item->transmisi }}</option>
                                            @endforeach
                                    </select>
                                    @error('transmisi')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-4 mb-3">
                                        <label for="id_virus" class="form-label">Provinsi<small
                                                class="text-danger">*</small>
                                        </label>
                                        <select name="id_provinsi" id="id_provinsi"
                                            class="form-control @error('id_provinsi') is-invalid @enderror ">
                                            @foreach ($provinsi as $item)
                                            <option value="{{ $item->id }}" {{ old('id',$data->id_provinsi)==$item->id ? 'selected' : ' ' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_provinsi')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="text" value="{{ $data->id_kabupaten }}" id="kabupaten" hidden>
                                        <label for="" class="form-label">Kota/Kabupaten<small class="text-danger"> *</small> </label>
                                        <select name="id_kabupaten" id="id_kabupaten" class="form-control @error('id_kabupaten') is-invalid @enderror">
                                        </select>
                                        @error('id_kabupaten')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="text" value="{{ $data->id_kecamatan }}" id="kecamatan" hidden>
                                        <label for="kode_sampel" class="form-label">Kecamatan<small
                                                class="text-danger"> *</small> </label>
                                        <select name="id_kecamatan" id="id_kecamatan" class="form-control @error('id_kecamatan') is-invalid @enderror">
                                        </select>
                                        @error('id_kecamatan')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="" class="form-label">Latitude <small
                                                class="text-danger">* </small>
                                        </label>
                                        <input type="text" name="latitude" id="latitude" value="{{ old('latitude',$data->lat) }}" class="form-control @error('latitude') is-invalid @enderror" placeholder="Masukkan Latitude">
                                        @error('latitude')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="" class="form-label">Longitude <small
                                                class="text-danger">* </small>
                                        </label>
                                        <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $data->long) }}" class="form-control @error('longitude') is-invalid @enderror" placeholder="Masukkan Longitude">
                                        @error('longitude')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <a href="{{  route('bank-data.index') }} " class="btn btn-danger me-1">Batal</a>
                                <button class="btn btn-primary">Update Data</button>
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
        
        $.ajax({
                type: "get",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+$('#id_provinsi').val(),
                success: function(res){
                    let data = res['kota_kabupaten'];
                    console.log(data);
                    var html = '';
                    for (var i = 0; i < data.length ; ++i) {
                        html +=`<option value="`+ data[i]['id'] + `">` + data[i]['nama'] + `</option>`;
                    }
                    $('#id_kabupaten').html(html);
                    $("#id_kabupaten").val($('#kabupaten').val()).change();
                }
        });

        $.ajax({
                type: "get",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+$('#kabupaten').val(),
                success: function(res){
                    let data = res['kecamatan'];
                    var html = '';
                    for (var i = 0; i < data.length ; ++i) {
                        html +=`<option value="`+ data[i]['id'] + `">` + data[i]['nama'] + `</option>`;
                    }
                    $('#id_kecamatan').html(html);
                    $("#id_kecamatan").val($('#kecamatan').val()).change();
                }
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
</script>
@endpush
