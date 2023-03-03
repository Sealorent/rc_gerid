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
                <i class="fa fa-snowflake bg-c-blue"></i>
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
                    <li class="breadcrumb-item"><a href="{{ route('virus.index') }}">{{ ucwords( Request::segment(2)
                            )}}</a> </li>
                    <li class="breadcrumb-item"><a href="">Detail Virus</a> </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
{{-- <div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- [ page content ] start -->
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between align-middle">
                            <h6 class="mt-2 fw-bold">{{ $title }}</h6>
                            <button class="btn btn-primary border-none" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-minus m-0"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-block collapse {{ session()->has('errors') == 1 ? 'show' : '' }}"
                        id="collapseExample">
                        <form action="{{ route('virus.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <input type="text" name="nama_virus" id="disabledTextInput" class="form-control @error('nama_virus')
                                    is-invalid @enderror" placeholder="Masukkan Nama Virus">
                                    @error('nama_virus')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-4 ">
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- [ page content ] end -->
            </div>
        </div>
    </div>
</div> --}}

<div class="pcoded-inner-content m-0">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- [ page content ] start -->
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between align-middle">
                            <h6 class="mt-2 fw-bold">{{ $title }} {{ $virus}}</h6>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap" id="table-virus">
                                <thead>
                                    <tr>
                                        <th style="width: 4%">#</th>
                                        <th style="width: 70%">Genotipe & Subtipe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <a href="">{{ $item->kode_genotipe }}</a> </td>
                                        {{-- <th>
                                            <div class="d-flex justify-content-start">
                                                <button class="btn btn-primary " style="margin-right: 0.5em"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $item->id }}"><i
                                                        class="fa fa-pencil text-center m-0"></i></button>
                                                <form action="{{  route('virus.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="sumbit" class="btn btn-danger"><i
                                                            class="fa fa-trash text-center m-0"></i></button>
                                                </form>
                                            </div>
                                        </th> --}}
                                    </tr>
                                    @include('backend.virus.editModal')
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Masih tidak ada</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Genotipe & Subtipe</th>
                                    </tr>
                                </tfoot>
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
@push('js')
<script>
    $(document).ready(function () {
        $('.table').DataTable({
            "autoWidth": false,
        });
    });
</script>
@endpush
