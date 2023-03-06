<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kasus;
use App\Models\KelompokUmur;
use App\Models\Transmisi;
use App\Service\WilayahService;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    public $wilayahService;

    public function __construct(WilayahService $wilayahService)
    {
        $this->wilayahService = $wilayahService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Kasus::all();
        return view('backend.kasus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = $this->wilayahService->get_provinsi();
        $kelompokUmur = KelompokUmur::all();
        $transmisi = Transmisi::all();
        return view('backend.kasus.create', compact('provinsi', 'kelompokUmur', 'transmisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'no_kasus' => 'required|integer',
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'kelompok_umur' => 'required',
            'jenis_kelamin' => 'required',
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'id_kecamatan' => 'required',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);
        try {
            $kasus = new Kasus;
            $kasus->tanggal = $request->tanggal . "-01-01";
            $kasus->no_kasus = $request->no_kasus;
            $kasus->nama = $request->nama;
            $kasus->umur = $request->umur;
            $kasus->kelompok_umur = $request->kelompok_umur;
            $kasus->id_provinsi = $request->id_provinsi;
            $kasus->id_kabupaten = $request->id_kabupaten;
            $kasus->transmisi = $request->transmisi;
            $kasus->id_kecamatan = $request->id_kecamatan;
            $kasus->jenis_kelamin = $request->jenis_kelamin;
            $kasus->lat = $request->latitude;
            $kasus->long = $request->longitude;
            $kasus->alamat = $request->alamat;
            $kasus->save();
            return redirect()->route('kasus.index')->withSuccess('Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
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
        $data = Kasus::findOrFail($id);
        $kelompokUmur = KelompokUmur::all();
        $transmisi = Transmisi::all();
        $provinsi = $this->wilayahService->get_provinsi();
        return view('backend.kasus.edit', compact('data','kelompokUmur', 'transmisi', 'provinsi'));
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
            'tanggal' => 'required',
            'no_kasus' => 'required|integer',
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'kelompok_umur' => 'required',
            'jenis_kelamin' => 'required',
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'id_kecamatan' => 'required',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);
        try {
            $kasus = Kasus::findOrFail($id);
            $kasus->tanggal = $request->tanggal . "-01-01";
            $kasus->no_kasus = $request->no_kasus;
            $kasus->nama = $request->nama;
            $kasus->umur = $request->umur;
            $kasus->kelompok_umur = $request->kelompok_umur;
            $kasus->id_provinsi = $request->id_provinsi;
            $kasus->id_kabupaten = $request->id_kabupaten;
            $kasus->transmisi = $request->transmisi;
            $kasus->id_kecamatan = $request->id_kecamatan;
            $kasus->jenis_kelamin = $request->jenis_kelamin;
            $kasus->lat = $request->latitude;
            $kasus->long = $request->longitude;
            $kasus->alamat = $request->alamat;
            $kasus->update();
            return redirect()->route('kasus.index')->withSuccess('Data Berhasil Dirubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
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
            $kasus = Kasus::findOrFail($id);
            $kasus->delete();
            return redirect()->route('kasus.index')->withSuccess('Data Telah Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
