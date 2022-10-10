<?php

namespace App\Http\Controllers;

use App\Models\Pendataanbis;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data.index', [
            'title' => 'Input data',
            'terminals' => Terminal::all()
        ]);
    }

    public function json(){
        return DataTables::eloquent(Pendataanbis::query())
            ->addIndexColumn()
            ->addColumn('nama_terminal', function(Pendataanbis $datainput){
                return view('data.nama_terminal', [
                    'datainput' => $datainput
                ]);
            })->addColumn('tanggal', function(Pendataanbis $datainput){
                return view('data.tanggal', [
                    'datainput' => $datainput
                ]);
            })->make(true);
    }

    public function rekap(){
        return view('data.rekap_laporan',[
            'title' => 'Rekap Laporan',
            'bis_akap_datang' => 0,
            'pnpg_akap_datang' => 0,
            'bis_akdp_datang' => 0,
            'pnpg_akdp_datang' => 0,
            
            'bis_akap_berangkat' => 0,
            'pnpg_akap_berangkat' => 0,
            'bis_akdp_berangkat' => 0,
            'pnpg_akdp_berangkat' => 0,
            'laporan_berangkat' => Pendataanbis::where('datangorberangkat', 'berangkat')->get(),
            'laporan_datang' => Pendataanbis::where('datangorberangkat', 'datang')->get(),
            'terminal' => Terminal::all()
        ]);
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
        $validate = Validator::make($request->all(), [
            'terminal_id' => 'required|max:255',
            'jml_bis' => 'required|max:255',
            'jml_penumpang' => 'required|max:255',
            'akaporakdp' => 'required|max:255',
            'datangorberangkat' => 'required|max:255',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 401,
                'errors' => 'Data tidak bisa di inputkan',
            ]);
        } else {
            $bidang = new Pendataanbis();
            if($request->akaporakdp == 'akap'){
                $bidang->jml_bis_akap = $request->jml_bis;
                $bidang->jml_pnpg_akap = $request->jml_penumpang;

                $bidang->jml_bis_akdp = 0;
                $bidang->jml_pnpg_akdp = 0;
            }else{
                $bidang->jml_bis_akdp = $request->jml_bis;
                $bidang->jml_pnpg_akdp = $request->jml_penumpang;
                
                $bidang->jml_pnpg_akap = 0;
                $bidang->jml_bis_akap = 0;
            }
            $bidang->terminal_id = $request->terminal_id;
            $bidang->akaporakdp = $request->akaporakdp;
            $bidang->datangorberangkat = $request->datangorberangkat;
            $bidang->save();
            return response()->json([
                'status' => 200,
                'message' => 'berhasil',
            ]);
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
        //
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
