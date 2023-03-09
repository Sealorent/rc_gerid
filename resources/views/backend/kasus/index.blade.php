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
                            <a href="{{ route('kasus.create') }}" class="btn btn-primary"> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th  >#</th>
                                        <th >Nama</th>
                                        <th >Alamat</th>
                                        <th >Jenis Kelamin</th>
                                        <th >Umur</th>
                                        <th >Tahun</th>
                                        <th >Opsi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th >#</th>
                                        <th >Nama</th>
                                        <th >Alamat</th>
                                        <th >Jenis Kelamin</th>
                                        <th >Umur</th>
                                        <th >Tahun</th>
                                        <th >Opsi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($data as $item)
                                    <tr>
                                        <td >{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->jenis_kelamin == 1 ? 'Male' : 'Female' }}</td>
                                        <td>{{ $item->umur }}</td>
                                        <td>{{ date('Y', strtotime($item->tanggal)) }}</td>
                                        <td class="text-center">
                                            <div class="row">
                                                <div class="col-2 m-3">
                                                <a class="btn btn-primary"
                                                    href="{{ route('kasus.edit',$item->id) }}"
                                                    style="margin-right: 0.5em"><i
                                                        class="fa fa-pencil text-center m-0"></i>
                                                </a>
                                                </div>
                                                <div class="col-2 m-3">
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

<?php Session::forget('sweet_alert'); ?>
@endsection
@include('template.partials.alert')
@push('js')
<script>
    $(document).ready(function () {
        $('.table').DataTable({
        });
    });
</script>
@endpush
