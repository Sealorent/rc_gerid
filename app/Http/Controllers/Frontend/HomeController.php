<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Genotipe;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Sampel;
use App\Models\Sitasi;
use App\Models\Virus;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class HomeController extends Controller
{
    public function index()
    {
        DB::table('visitor')->insert([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'date' => date('Y-m-d H:i:s'),
        ]);
        $title = 'Bank Data';
        $virus = Virus::all();
        return view('frontend.home', compact('title', 'virus'));
    }
    public function data(Request $request)
    {
        $title = 'Bank Data';
        $data = Sitasi::select('users.name', 'tb_sitasi.id', 'tb_sitasi.judul_artikel', 'tb_sampel.id_kota', 'tb_sampel.id_provinsi', 'tm_pengarang.nama_pengarang', 'tb_sampel.tanggal_pengambilan')
            ->join('tb_sampel', 'tb_sampel.id', 'tb_sitasi.id_sampel')
            ->join('tm_pengarang', 'tm_pengarang.id', 'tb_sitasi.id_pengarang')
            ->join('users', 'users.id', 'tb_sitasi.id_user')
            ->join('tm_genotipe', 'tm_genotipe.id', 'tb_sampel.id_genotipe')
            ->join('tm_virus', 'tm_virus.id', 'tb_sampel.id_virus')
            ->join('tm_provinsi', 'tm_provinsi.id', 'tb_sampel.id_provinsi')
            ->join('tm_kabupaten', 'tm_kabupaten.id', 'tb_sampel.id_kota')
            ->Where('kode_genotipe', 'like', '%' . strtoupper($request->get('req')) . '%')
            ->orWhere('data_sekuen', 'like', '%' . $request->get('req') . '%')
            ->orWhere('kode_sampel', 'like', '%' . strtoupper($request->get('req')) . '%')
            ->orWhere('nama_virus', 'like', '%' . strtoupper($request->get('req')) . '%')
            ->orWhere('nama_kabupaten', 'like', '%' . strtoupper($request->get('req')) . '%')
            ->orWhere('nama_provinsi', 'like', '%' . strtoupper($request->get('req')) . '%')
            ->get();
        // return $data;
        return view('frontend.showdata', compact('title', 'data'));
    }

    public function detail($id)
    {
        // return $id;
        $title = 'Bank Data';
        $data = Sitasi::select('*', 'tb_sitasi.id')->where('tb_sitasi.id', $id)
            ->join('tb_sampel', 'tb_sampel.id', 'tb_sitasi.id_sampel')
            ->join('tm_pengarang', 'tm_pengarang.id', 'tb_sitasi.id_pengarang')
            ->join('tm_virus', 'tm_virus.id', 'tb_sampel.id_virus')
            // ->join('users', 'users.id', 'tb_sitasi.id_user')
            ->first();
        // return $data;
        return view('frontend.detail', compact('title', 'data'));
    }

    public function signIn()
    {
        return view('frontend.auth.login');
    }

    public function postSignIn(LoginRequest $request)
    {
        if (Auth()->user() != null && Auth::guard('web')->user() != null) {
            return redirect()->route('signIn')->withError('Anda Masih Login dengan user' . ' ' . Auth()->user()->name);
        } else {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'pengguna';
        $user->save();

        event(new Registered($user));

        if (Auth()->user() != null && Auth::guard('web')->user() != null) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('signIn')->withSuccess('Terimakasih Telah Mendaftar');
        } else {
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        }
    }

    public function detailFasta($id)
    {
        $title = 'Bank Data';
        $data = Sitasi::select('tb_sitasi.judul_artikel', 'tb_sampel.kode_sampel', 'tb_sampel.nama_gen', 'tb_sampel.data_sekuen')
            ->where('tb_sitasi.id', $id)
            ->join('tb_sampel', 'tb_sampel.id', 'tb_sitasi.id_sampel')
            // ->join('tm_pengarang', 'tm_pengarang.id', 'tb_sitasi.id_pengarang')
            // ->join('users', 'users.id', 'tb_sitasi.id_user')
            ->first();
        // return $data;
        return view('frontend.detail-fasta', compact('title', 'data'));
    }


    public function stateAwalMaps()
    {
        $lastDate = DB::table('tb_sampel')->select('tanggal_pengambilan')->orderByDesc('tanggal_pengambilan')->first()->tanggal_pengambilan;
        $date = explode('-', $lastDate);
        $data = DB::table('tb_sampel')
            ->select(DB::raw('count(id_virus) as virus, id_provinsi, tanggal_pengambilan, id_virus'))
            ->whereMonth('tanggal_pengambilan', $date[1])->whereYear('tanggal_pengambilan', $date[0])
            ->where('id_virus', 1)
            ->groupBy('id_provinsi', 'tanggal_pengambilan', 'id_virus')
            ->get();

        $mappedcollection = $data->map(function ($item, $key) {
            return [
                'provinsi' => strtoupper($this->getProvinsi($item->id_provinsi)),
                'kota' => $this->getKotaCollection($item->id_provinsi, $item->tanggal_pengambilan),
                'potensi' => $this->getPotensi($item->virus),
                'id_virus' => $this->getVirus($item->id_virus),
                'collection' => $this->getCollection($item->id_provinsi, $item->tanggal_pengambilan),
                'collection_genotipe' => $this->getCollectionGenotipe($item->id_provinsi, $item->tanggal_pengambilan),
                'jumlah_kasus' => $this->getJumlah($item->id_provinsi, $item->tanggal_pengambilan),
            ];
        });

        return $mappedcollection;

    }

    public function filter(Request $request)
    {
        // return $request;
        $date = explode('-', $request->date);

        $data = DB::table('tb_sampel')
            ->select(DB::raw('count(id_virus) as virus, id_provinsi, tanggal_pengambilan, id_virus'))
            ->whereMonth('tanggal_pengambilan', $date[1])->whereYear('tanggal_pengambilan', $date[0])
            ->where('id_virus', $request->id_virus)
            ->groupBy('id_provinsi', 'tanggal_pengambilan', 'id_virus')
            ->get();

        $mappedcollection = $data->map(function ($item, $key) {
            return [
                'provinsi' => strtoupper($this->getProvinsi($item->id_provinsi)),
                'kota' => $this->getKotaCollection($item->id_provinsi, $item->tanggal_pengambilan),
                'potensi' => $this->getPotensi($item->virus),
                'id_virus' => $this->getVirus($item->id_virus),
                'collection' => $this->getCollection($item->id_provinsi, $item->tanggal_pengambilan),
                'collection_genotipe' => $this->getCollectionGenotipe($item->id_provinsi, $item->tanggal_pengambilan),
                'jumlah_kasus' => $this->getJumlah($item->id_provinsi, $item->tanggal_pengambilan),
            ];
        });

        return $mappedcollection;
    }

    function getCollection($id_provinsi, $date)
    {
        $date = explode('-', $date);
        $data = Sampel::select('tempat', 'id_provinsi')->whereMonth('tanggal_pengambilan', $date[1])->whereYear('tanggal_pengambilan', $date[0])->where('id_provinsi', $id_provinsi)->first();
        return $data;
        
    }

    function getCollectionGenotipe($id_provinsi, $date)
    {
        $date = explode('-', $date);
        $data = Sampel::select(DB::raw('count(id_genotipe) as jumlah, id_genotipe'))
            ->whereMonth('tanggal_pengambilan', $date[1])->whereYear('tanggal_pengambilan', $date[0])
            ->where('id_provinsi', $id_provinsi)
            ->groupBy('id_genotipe')
            ->get();
        // return $data;
        $mappedcollection = $data->map(function ($item, $key) {
            return [
                'genotipe' => $this->getGenotipe($item->id_genotipe),
                'jumlah' => $item->jumlah,
            ];
        });
        return $mappedcollection;
    }

    public function getKotaCollection($id_provinsi, $date)
    {
        $date = explode('-', $date);
        $data = Sampel::select('id_kota')->whereMonth('tanggal_pengambilan', $date[1])->whereYear('tanggal_pengambilan', $date[0])->where('id_provinsi', $id_provinsi)->first()->id_kota;
        return $this->getKota($data);
    }

    public function getJumlah($id_provinsi, $date)
    {
        $date = explode('-', $date);
        $data = Sampel::whereMonth('tanggal_pengambilan', $date[1])->whereYear('tanggal_pengambilan', $date[0])->where('id_provinsi', $id_provinsi)->get();
        return count($data);
    }

    function getPotensi($jml)
    {
        if ($jml < 5) {
            return 'rendah';
        } elseif ($jml >  10) {
            return 'tinggi';
        }
    }
    public function getGenotipe($id)
    {
        $genotipe = Genotipe::find($id)->kode_genotipe;
        return $genotipe;
    }

    function getVirus($id)
    {
        $virus = Virus::where('id', $id)->pluck('nama_virus')[0];
        return $virus;
    }

    function getProvinsi($id)
    {
        $prov = Provinsi::where('id', $id)->pluck('nama_provinsi')[0];
        return $prov;
    }
    function getKota($id)
    {
        $kab = Kabupaten::where('id', $id)->pluck('nama_kabupaten')[0];
        return $kab;
    }

    
}
