<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KelompokUmur;
use Illuminate\Http\Request;

class KelompokUmurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KelompokUmur::all();
        return view('backend.kelompok-umur.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'kelompok_umur' => 'required'
        ]);
        try {
            $kelompokUmur = new KelompokUmur;
            $kelompokUmur->kelompok_umur = $request->get('kelompok_umur');
            $kelompokUmur->save();
            return redirect()->back()->withSuccess('Data Berhasil Ditambahkan');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'kelompok_umur' => 'required'
        ]);
        try {
            $kelompokUmur = KelompokUmur::findOrFail($id);
            $kelompokUmur->kelompok_umur = $request->get('kelompok_umur');
            $kelompokUmur->update();
            return redirect()->back()->withSuccess('Berhasil Mengubah Data');
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
            $kelompokUmur = KelompokUmur::findOrFail($id);
            $kelompokUmur->delete();
            return redirect()->back()->withSuccess('Berhasil Menghapus Data');
        } catch (\Exception $e) {
            return $e;
            return redirect()->back()->withErrors($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
