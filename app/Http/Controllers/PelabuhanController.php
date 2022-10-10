<?php

namespace App\Http\Controllers;

use App\Models\Pelabuhan;
use App\Models\Pendataanpelabuhan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class PelabuhanController extends Controller
{

    public function index($id){
        return view('pelabuhan.index',[
            'title' => 'Data Pelabuhan',

            'totjmltrip_berangkat' => 0,
            'epnp_berangkat' => 0,
            'er2_berangkat' => 0,
            'er4_berangkat' => 0,
            'ebus_berangkat' => 0,
            'etruk_berangkat' => 0,
            
            'totjmltrip_datang' => 0,
            'epnp_datang' => 0,
            'er2_datang' => 0,
            'er4_datang' => 0,
            'ebus_datang' => 0,
            'etruk_datang' => 0,

            'labuhan' => Pendataanpelabuhan::find($id),

            'laporan_berangkat' => Pelabuhan::where('berangkatordatang', 'berangkat')->where('pelabuhan_id', $id)->get(),
            'laporan_datang' => Pelabuhan::where('berangkatordatang', 'datang')->where('pelabuhan_id', $id)->get(),
        ]);
    }
    public function create(){
        return view('pelabuhan.create',[
            'title' => 'Input data pelabuhan',
            'pelabuhan' => Pendataanpelabuhan::all()
        ]);
    }

    public function json(){
        return DataTables::eloquent(Pelabuhan::query())->make(true);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'tanggal' => 'required',
            'berangkatordatang' => 'required',
            'jml_trip' => 'required',
            'e_pnp' => 'required',
            'e_r2' => 'required',
            'e_r4' => 'required',
            'e_bus' => 'required',
            'e_truk' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 401,
                'errors' => 'Data tidak bisa di inputkan',
            ]);
        } else {
            $pelabuhan = new Pelabuhan();
            $pelabuhan->pelabuhan_id = $request->pelabuhan_id;
            $pelabuhan->tanggal = $request->tanggal;
            $pelabuhan->berangkatordatang = $request->berangkatordatang;
            if($request->berangkatordatang == 'berangkat'){
                $pelabuhan->jmltrip_berangkat = $request->jml_trip;
                $pelabuhan->e_pnp_berangkat = $request->e_pnp;
                $pelabuhan->e_r2_berangkat = $request->e_r2;
                $pelabuhan->e_r4_berangkat = $request->e_r4;
                $pelabuhan->e_bus_berangkat = $request->e_bus;
                $pelabuhan->e_truk_berangkat = $request->e_truk;

                $pelabuhan->jmltrip_datang = 0;
                $pelabuhan->e_pnp_datang = 0;
                $pelabuhan->e_r2_datang = 0;
                $pelabuhan->e_r4_datang = 0;
                $pelabuhan->e_bus_datang = 0;
                $pelabuhan->e_truk_datang = 0;
            }else{
                $pelabuhan->jmltrip_datang = $request->jml_trip;
                $pelabuhan->e_pnp_datang = $request->e_pnp;
                $pelabuhan->e_r2_datang = $request->e_r2;
                $pelabuhan->e_r4_datang = $request->e_r4;
                $pelabuhan->e_bus_datang = $request->e_bus;
                $pelabuhan->e_truk_datang = $request->e_truk;

                $pelabuhan->jmltrip_berangkat = 0;
                $pelabuhan->e_pnp_berangkat = 0;
                $pelabuhan->e_r2_berangkat = 0;
                $pelabuhan->e_r4_berangkat = 0;
                $pelabuhan->e_bus_berangkat = 0;
                $pelabuhan->e_truk_berangkat = 0;
            }
            $pelabuhan->save();
            return response()->json([
                'status' => 200,
                'message' => 'berhasil',
            ]);
        }
    }
}
