<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengarang;
use App\Models\Sitasi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // index 2
        // $data = Sitasi::select('*')
        //     ->join('tb_sampel', 'tb_sampel.id', 'tb_sitasi.id_sampel')->join('tm_pengarang', 'tm_pengarang.id', 'tb_sitasi.id_pengarang')->get();
        // return view('backend.pengarang.index-2', compact('data'));
        // index 1
        $data = Pengarang::all();
        return view('backend.pengarang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pengarang.create');
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
            'pengarang' => 'required',
            'anggota' => 'required',
            'alamat' => 'required',
            'institusi' => 'required'
        ]);

        try {
            $pengarang = new Pengarang;
            $pengarang->nama_pengarang = $request->get('pengarang');
            $pengarang->anggota = $request->get('anggota');
            $pengarang->alamat = $request->get('alamat');
            $pengarang->institusi = $request->get('institusi');
            $pengarang->save();
            return redirect()->route('pengarang.index')->withSuccess('Data Berhasil Ditambahkan');
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
        $data = Sitasi::join('tb_sampel', 'tb_sampel.id', 'tb_sitasi.id_sampel')
            ->where('tb_sitasi.id_pengarang', $id)
            ->get();
        // return $data;
        return view('backend.pengarang.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengarang = Pengarang::findOrFail($id);

        return view('backend.pengarang.edit', compact('pengarang'));
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
            'pengarang' => 'required',
            'anggota' => 'required',
            'alamat' => 'required',
            'institusi' => 'required'
        ]);

        try {
            $pengarang = Pengarang::findOrFail($id);
            $pengarang->nama_pengarang = $request->get('pengarang');
            $pengarang->anggota = $request->get('anggota');
            $pengarang->alamat = $request->get('alamat');
            $pengarang->institusi = $request->get('institusi');
            $pengarang->update();
            return redirect()->route('pengarang.index')->withSuccess('Data Berhasil Dirubah');
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
        //
    }
}
