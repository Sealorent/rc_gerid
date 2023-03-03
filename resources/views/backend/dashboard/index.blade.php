@extends('template.template')
@section('content')
@push('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endpush
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Dashboard</h5>
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
                    <li class="breadcrumb-item"><a href="#!">Dashboard CRM</a> </li>
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
                <div class="row">
                    <!-- product profit start -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card card-red">
                            <div class="card-body">
                                <div class="row align-items-center m-b-30">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Total Visitor</h6>
                                        <h3 class="m-b-0 f-w-700 text-white">
                                            {{ App\Models\Visitor::count() }}
                                        </h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                                    </div>

                                </div>
                                {{-- <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From
                                    Previous Month</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card card-blue">
                            <div class="card-body">
                                <div class="row align-items-center m-b-30">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Total Sampel</h6>
                                        <h3 class="m-b-0 f-w-700 text-white">
                                            {{ App\Models\Sitasi::count() }}
                                        </h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-database text-c-blue f-18"></i>
                                    </div>
                                </div>
                                {{-- <p class="m-b-0 text-white"><span
                                        class="label label-primary m-r-10">+12%</span>From
                                    Previous Month</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card card-green">
                            <div class="card-body">
                                <div class="row align-items-center m-b-30">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Jenis Virus</h6>
                                        <h3 class="m-b-0 f-w-700 text-white">
                                            {{ App\Models\Virus::count() }}
                                        </h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign text-c-green f-18"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card card-yellow">
                            <div class="card-body">
                                <div class="row align-items-center m-b-30">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Author</h6>
                                        <h3 class="m-b-0 f-w-700 text-white">
                                            {{ App\Models\Pengarang::count() }}
                                        </h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tags text-c-yellow f-18"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <div class="d-flex align-items-start justify-content-between">
                                    <h5>Jumlah Visitor</h5>
                                    <div class="input-group w-25">
                                        <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="date" name="year" placeholder="Tahun"
                                            value="{{ old('date',date('Y'))  }}">
                                        <i class="fa fa-calendar calendar-icon"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <div class="">
                                    <h5>Virus</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col">
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-3">
                                            <select name="id_virus" id="pieVirus" class="form-control">
                                                <option value="">Jenis Virus</option>
                                                @foreach ($virus as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_virus }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select name="id_provinsi" id="pieProvinsi" class="form-control">
                                                <option value="">Provinsi</option>
                                                @foreach ($provinsi as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_provinsi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('tanggal') is-invalid @enderror"
                                                    id="pieDate" name="year" placeholder="Tahun & Bulan"
                                                    value="{{ old('date')  }}">
                                                <i class="fa fa-calendar calendar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary" id="btnFilter">filter</button>
                                            <button class="btn btn-danger" id="btnReset">reset</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ page content ] end -->
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/widget.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"
    rel="stylesheet">
<style>
    .calendar-icon {
        position: absolute;
        right: 15px;
        top: 11px;
    }
</style>
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="{{ asset('assets/pages/dashboard/crm-dashboard.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $('#lokasi').select2();
        $('#date').datepicker({
            autoclose: true,
            viewMode: 'years',
            format: 'yyyy',
            minViewMode: 'years',
            changeYear: true,
            zIndexOffset : 99999,
            orientation: "bottom",
        });
        $('#pieDate ').datepicker({
            autoclose: true,
            viewMode: 'years',
            format: 'mm-yyyy',
            minViewMode: 1,
            zIndexOffset : 99999999,
        });
        $(document).ready(function() {
            var valdate = $("#date").val();
            ajaxGetDate(valdate);
            pieChart();

        })
        $("#date").on('change', function(){
            ajaxGetDate($("#date").val());

        });
        var visitorChart;
        function ajaxGetDate(params) {
        if(visitorChart != null){
            visitorChart.destroy();
        }
        $.ajaxSetup ({
            cache:   false
        });
        $.ajax({
                method: 'GET',
                url: '/api-visitor',
                data: {
                    year: params,
                },
                async: true,
                success: function(result) {
                visitorChart =  new Chart(document.getElementById("myChart"), {
                        type: 'line',
                        data: {
                            labels: result[0],
                            datasets: [{
                                data: result[1],
                                label: "Jumlah Visitor",
                                borderColor: "rgb(255, 73, 42)",
                                backgroundColor: ' rgba(255, 0, 0, 0.3)',
                                fill: true
                            },
                            ]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                    align: "end",
                                    labels: {
                                        padding: 20
                                    },
                                }
                            },
                            scales: {
                                y: {
                                    // type: 'linear' as const, // magic
                                    ticks: {
                                        precision: 0,
                                        stepSize: 1,
                                    },
                                },
                            },
                        }
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError);
                }
            });
        }
        // Line Chart

        $('#btnFilter').on('click', function(){
            pieChart();
        })

        $('#btnReset').on('click', function(){
            reset();
        })

        function reset(){
            $("#pieDate").val('');
            $("#pieProvinsi").val('')
            $("#pieVirus").val('')
            pieChart();
        }
        // Pie Chart
        var virusChart;
        function pieChart () {
        var pieDate = $("#pieDate").val();
        var pieProvinsi = $("#pieProvinsi").val();
        var pieVirus = $("#pieVirus").val();
        if(virusChart != null){
            virusChart.destroy();
        }
        $.ajax({
                method: 'GET',
                url: '/api-jumlah-virus',
                async: true,
                data: {
                    virus: pieVirus,
                    date: pieDate,
                    provinsi: pieProvinsi,
                },
                success: function(result) {
                if(result == 'null'){
                    alert('maaf data belum tersedia');
                    reset();
                }else{
                   virusChart =  new Chart(document.getElementById('pieChart'), {
                        type: 'pie',
                        data: {
                        labels: result.nama_virus ,
                        datasets: [{
                            label: '# of Votes',
                            data: result.jumlah,
                            borderWidth: 1
                        }]
                        },
                        options: {
                            scales: {
                                    y: {
                                        // type: 'linear' as const, // magic
                                        ticks: {
                                            precision: 0,
                                            stepSize: 1,
                                        },
                                    },
                                },
                        }
                    });
                }
                }

                // error: function(xhr, ajaxOptions, thrownError) {
                //     console.log(thrownError);
                // }
        });
        // const ctx = document.getElementById('pieChart');
    }



</script>
@endpush
