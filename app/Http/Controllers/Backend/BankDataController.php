<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Genotipe;
use App\Models\Kabupaten;
use App\Models\Pengarang;
use App\Models\Provinsi;
use App\Models\Sampel;
use App\Models\Sitasi;
use App\Models\Virus;
use Illuminate\Http\Request;
use App\Repository\Wilayah;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;

class BankDataController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sitasi::select('*')->join('tb_sampel', 'tb_sampel.id', 'tb_sitasi.id_sampel')->join('tm_pengarang', 'tm_pengarang.id', 'tb_sitasi.id_pengarang')
            ->orderByDesc('tb_sitasi.created_at')->get();
        return view('backend.bank-data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $virus = Virus::all();
        $provinsi = Provinsi::all();
        $pengarang = Pengarang::all();
        $genotipe = Genotipe::all();
        return view('backend.bank-data.create', compact('virus', 'provinsi', 'pengarang', 'genotipe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'kode_sampel' => 'required|unique:tb_sampel',
            'judul_artikel' => 'required',
            'id_virus'  => 'required',
            'genotipe' => 'required',
            'data_sekuen' => 'required',
            'nama_pengarang' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'nama_gen' => 'required'
        ]);
        try {

            $data_sampel = new Sampel;
            $data_sampel->kode_sampel = $request->get('kode_sampel');
            $data_sampel->id_virus = $request->get('id_virus');
            $data_sampel->id_genotipe = $request->get('genotipe');
            $data_sampel->nama_gen = $request->get('nama_gen');
            $data_sampel->data_sekuen = $request->get('data_sekuen');
            $data_sampel->id_kota = $request->get('id_kabupaten');
            $data_sampel->id_provinsi = $request->get('id_provinsi');
            $data_sampel->tempat = $request->get('tempat');
            $data_sampel->tanggal_pengambilan = $request->get('tanggal') . '-01';
            $data_sampel->id_pengarang = $request->get('nama_pengarang');
            $data_sampel->save();

            $data_sitasi = new Sitasi;
            $data_sitasi->judul_artikel = $request->get('judul_artikel');
            $data_sitasi->id_pengarang = $request->get('nama_pengarang');
            $data_sitasi->id_sampel = $data_sampel->id;
            $data_sitasi->id_user = Auth()->user()->id;
            $data_sitasi->save();

            return redirect()->route('bank-data.index')->withSuccess('Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return $e;
            return redirect()->back()->withErrors($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        $virus = Virus::all();
        $provinsi = Provinsi::all();
        $pengarang = Pengarang::all();
        $genotipe = Genotipe::all();
        $data = Sitasi::select('*')
            ->join('tb_sampel', 'tb_sampel.id', 'tb_sitasi.id_sampel')
            ->join('tm_pengarang', 'tm_pengarang.id', 'tb_sitasi.id_pengarang')
            ->where('tb_sitasi.id', $id)->first();
        // return $data;
        return view('backend.bank-data.edit', compact('data', 'pengarang', 'genotipe', 'provinsi', 'virus'));
        // return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_sampel' => 'required',
            'judul_artikel' => 'required',
            'id_virus'  => 'required',
            'genotipe' => 'required',
            'data_sekuen' => 'required',
            'nama_pengarang' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'nama_gen' => 'required'
        ]);
        // return $request;
        try {

            $data_sampel = new Sampel;
            $data_sampel->kode_sampel = $request->get('kode_sampel');
            $data_sampel->id_virus = $request->get('id_virus');
            $data_sampel->id_genotipe = $request->get('genotipe');
            $data_sampel->nama_gen = $request->get('nama_gen');
            $data_sampel->data_sekuen = $request->get('data_sekuen');
            $data_sampel->id_kota = $request->get('id_kabupaten');
            $data_sampel->id_provinsi = $request->get('id_provinsi');
            $data_sampel->tempat = $request->get('tempat');
            $data_sampel->tanggal_pengambilan = $request->get('tanggal') . '-01';
            $data_sampel->id_pengarang = $request->get('nama_pengarang');
            $data_sampel->update();

            $data_sitasi = new Sitasi;
            $data_sitasi->judul_artikel = $request->get('judul_artikel');
            $data_sitasi->id_pengarang = $request->get('nama_pengarang');
            // $data_sitasi->id_sampel = $data_sampel->id;
            // $data_sitasi->id_user = Auth()->user()->id;
            $data_sitasi->update();
            return redirect()->route('bank-data.index')->withSuccess('Data Berhasil Dirubah');
        } catch (\Exception $e) {
            return $e;
            return redirect()->back()->withErrors($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Sitasi::find($id);
            $sampel = Sampel::find($data->id_sampel);
            $data->delete();
            $sampel->delete();
            return redirect()->route('bank-data.index')->withSuccess('Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return $e;
            return redirect()->back()->withErrors($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
