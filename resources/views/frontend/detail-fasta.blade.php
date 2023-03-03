@extends('frontend.template')
@section('content')
<div class="row mt-5">
    <div class="col-10">
        <h4>{{ $data->judul_artikel }}</h4>
        <p>Kode Sampel: {{ $data->kode_sampel }}</p>
        <hr>
        <p> >{{ $data->nama_gen }}</p>
        <div class="col-5">
            <p>{{ $data->data_sekuen }}</p>
        </div>
    </div>
    <div class="col-2">
        <table>
            <tbody>
                <tr>Analyze this Sequence</tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
