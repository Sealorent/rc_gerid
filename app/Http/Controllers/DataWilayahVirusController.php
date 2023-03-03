<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Sampel;
use App\Models\Virus;
use Illuminate\Http\Request;

class DataWilayahVirusController extends Controller
{
    public function getData()
    {
        $data = Sampel::all();

        $mappedcollection = $data->map(function ($item, $key) {
            return [
                'id' => $item->id,
                'kode_sampel' => $item->kode_sampel,
                'virus' => $this->getVirus($item->id_virus),
                'data_sekuen' => $item->data_sekuen,
                'tempat' => $item->tempat,
                'kota' => $this->getKota($item->kota),
                'provinsi' => $this->getProvinsi($item->provinsi),
                'tanggal pengambilan' => $this->tanggalIndo($item->tanggal_pengambilan),
            ];
        });

        return $mappedcollection;
    }


    function getVirus($id_virus)
    {
        $virus = Virus::where('id', $id_virus)->pluck('nama_virus')[0];
        return $virus;
    }

    public function tanggalIndo($tanggal)
    {
        $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $split = explode('-', $tanggal);
        return $bulan[(int)$split[1]] . ' ' . $split[0];
    }


    public function getKabupaten(Request $request)
    {
        $data = Kabupaten::where('id_provinsi', $request->id_provinsi)->get();
        return $data;
    }
}
