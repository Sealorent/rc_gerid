@extends('template.template')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
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
                    <li class="breadcrumb-item"><a href="{{ route('pengarang.index') }}">{{ ucwords( Request::segment(1)
                            )}}</a> </li>
                    <li class="breadcrumb-item"><a href="{{ route('pengarang.create') }}">{{ ucwords(
                            Request::segment(2)
                            )}}</a> </li>

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
                            <h6 class="mt-2 fw-bold">Pengarang</h6>
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('pengarang.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="pengarang" class="form-label">Pengarang<small class="text-danger">
                                            *</small> </label>
                                    <input type="text" name="pengarang" id="pengarang"
                                        class="form-control @error('pengarang') is-invalid @enderror"
                                        placeholder="Masukkan Pengarang">
                                    @error('pengarang')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="anggota" class="form-label">Anggota<small class="text-danger">
                                            *</small> </label>
                                    <input type="text" name="anggota" id="anggota"
                                        class="form-control @error('anggota') is-invalid @enderror"
                                        placeholder="Masukkan Pengarang">
                                    @error('anggota')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="alamat" class="form-label">Alamat<small class="text-danger"> *</small>
                                    </label>
                                    <input type="text" name="alamat" id="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Masukkan Alamat Pengarang">
                                    @error('alamat')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="instansi" class="form-label">Institusi First Author<small
                                            class="text-danger">
                                            *</small>
                                    </label>
                                    <input type="text" name="institusi" id="institusi"
                                        class="form-control @error('institusi') is-invalid @enderror"
                                        placeholder="Masukkan Nama Institusi">
                                    @error('institusi')
                                    <span class="invalid-feedback message">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary "> Tambah Data </button>
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
