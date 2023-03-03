<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\Sampel;
use App\Models\Virus;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class DashboardController extends Controller
{

    public function index()
    {
        $virus = Virus::all();
        $provinsi = Provinsi::all();
        return view('backend.dashboard.index', compact('virus', 'provinsi'));
        # code...
    }


    public function getApiVisitor(Request $request)
    {
        $data = Visitor::select(DB::raw('count(*) as total_visitor, MONTH(date) as date'))
            ->groupBy(DB::raw('MONTH(date)'))
            ->whereYear('date', $request->year)->orderBy('date', 'ASC')->get();

        $bulanarr   = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        if (!$data->isEmpty()) {
            for ($i = 0; $i < count($data); $i++) {
                $arr[0][]  = $bulanarr[$data[$i]['date'] - 1];
                $arr[1][] = $data[$i]['total_visitor'];
            }
            return  $arr;
        } else {
            return 'empty';
        }
    }

    public function getVirus(Request $request)
    {
        if ($request->virus != null) {
            $data = Sampel::select(DB::raw('count(id_virus) as total_virus ,nama_virus'))
                ->where('tanggal_pengambilan', date('Y-m-d', strtotime("01-" . $request->date)))
                ->where('id_virus', $request->virus)
                ->where('id_provinsi', $request->provinsi)
                ->join('tm_virus', 'tm_virus.id', 'tb_sampel.id_virus')
                ->groupBy('nama_virus')
                ->get();
        } else {
            $data = Sampel::select(DB::raw('count(id_virus) as total_virus ,nama_virus'))
                ->join('tm_virus', 'tm_virus.id', 'tb_sampel.id_virus')
                ->groupBy('nama_virus')
                ->get();
        }
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                $arr['nama_virus'][] = $value->nama_virus;
                $arr['jumlah'][] = $value->total_virus;
            }
            return $arr;
        } else {
            return 'null';
        }
    }
}
