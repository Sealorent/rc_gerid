@extends('frontend.template')
@section('content')
<div class="row mt-5">
    <div class="col-10">
        <h4>{{ $data->judul_artikel }}</h4>
        <p>{{ $data->institusi }} Reference Sequence: {{ $data->kode_sampel }}</p>
        <p><a href="{{ route('fasta.detail',$data->id) }}">FASTA</a></p>
        <hr>
        <table class="border table table-striped ">
            <tr>
                <td>REFERENCE </td>
                <td style="padding-left: 1em"></td>
            </tr>
            <tr>
                <td class="text-end"> AUTHOR</td>
                <td style="padding-left: 1em">
                    <p> <a href="http://www.google.com/search?q={{ $data->nama_pengarang.' , '.$data->anggota }}"
                            target="_blank" rel="noopener noreferrer">{{ $data->nama_pengarang.' , '.$data->anggota
                            }}</a></p>
                </td>
            </tr>
            <tr>
                <td class="text-end"> TITLE</td>
                <td style="padding-left: 1em">
                    <p><a href="https://www.google.com/search?q={{ $data->judul_artikel }}" target="_blank">{{
                            $data->judul_artikel }}</a></p>
                </td>
            </tr>
            <tr>
                <td>FEATURE </td>
                <td style="padding-left: 1em"></td>
            </tr>
            <tr>
                <td class="text-end">virus</td>
                <td style="padding-left: 1em">
                    <p class="m-0">{{ $data->nama_virus}}</p>
                </td>
            </tr>
            <tr>
                <td class="text-end">sampel</td>
                <td style="padding-left: 1em">
                    <p class="m-0">{{ $data->kode_sampel }}</p>
                </td>
            </tr>
            <tr>
                <td class="text-end">gene</td>
                <td style="padding-left: 1em">
                    <p class="m-0">{{ $data->nama_gen }}</p>
                </td>
            </tr>
            <tr>
                <td style="width:2%">DATA SEKUEN </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 3em; width:20%; break-word">
                    <div class="col-6">
                        {{ $data->data_sekuen }}
                    </div>
                </td>
            </tr>
        </table>

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
