<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Genotipe;
use App\Models\Virus;
use Illuminate\Http\Request;

class GenotipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Genotipe::all();
        $virus = Virus::all();
        return view('backend.genotipe.index', compact('data', 'virus'));
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
            'kode_genotipe' => 'required',
            'kode_virus' => 'required'
        ]);
        try {
            $genotipe = new Genotipe;
            $genotipe->id_virus = $request->get('kode_virus');
            $genotipe->kode_genotipe = $request->get('kode_genotipe');
            $genotipe->save();
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
            'kode_genotipe' => 'required'
        ]);
        try {
            $genotipe = Genotipe::findOrFail($id);
            $genotipe->kode_genotipe = $request->get('kode_genotipe');
            $genotipe->update();
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
            $genotipe = Genotipe::findOrFail($id);
            $genotipe->delete();
            return redirect()->back()->withSuccess('Berhasil Menghapus Data');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
