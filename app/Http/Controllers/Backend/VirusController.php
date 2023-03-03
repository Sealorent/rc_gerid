<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Genotipe;
use App\Models\Virus;
use Illuminate\Http\Request;

class VirusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Virus::all();
        return view('backend.virus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'nama_virus' => 'required'
        ]);
        try {
            $virus = new Virus;
            $virus->nama_virus = $request->get('nama_virus');
            $virus->save();
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
        $title = "Detail Genotipe Virus";
        $virus = Virus::find($id)->nama_virus;
        $data = Genotipe::where('id_virus', $id)->get();
        return view('backend.virus.detail', compact('data', 'title', 'virus'));
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
            'nama_virus' => 'required'
        ]);
        try {
            $virus = Virus::findOrFail($id);
            $virus->nama_virus = $request->get('nama_virus');
            $virus->update();
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
            $virus = Virus::findOrFail($id);
            $virus->delete();
            return redirect()->back()->withSuccess('Berhasil Menghapus Data');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
