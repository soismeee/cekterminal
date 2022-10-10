<?php

namespace App\Http\Controllers;

use App\Models\Pendataanpelabuhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DataPelabuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datapelabuhan.index', [
            'title' => 'Data pelabuhan'
        ]);
    }

    public function json(){
        return DataTables::eloquent(Pendataanpelabuhan::query())
            ->addIndexColumn()
            ->addColumn('action', function(Pendataanpelabuhan $pelabuhan){
                return view('datapelabuhan.action', [
                    'pelabuhan' => $pelabuhan
                ]);
            })->make(true);
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
            'nama_pelabuhan' => 'required|max:255',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 401,
                'errors' => 'Data tidak bisa di inputkan',
            ]);
        } else {
            $pelabuhan = new Pendataanpelabuhan();
            $pelabuhan->nama_pelabuhan = $request->nama_pelabuhan;
            $pelabuhan->save();
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
        $pelabuhan = Pendataanpelabuhan::find($id);
        if($pelabuhan){
            return response()->json([
                'status' => 200,
                'data' => $pelabuhan
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'data tidak ditemukan'
            ]);
        }
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
        $validate = Validator::make($request->all(), [
            'nama_pelabuhan' => 'required|max:255'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => 'Data tidak bisa di ubah',
            ]);
        } else {
            $pelabuhan = Pendataanpelabuhan::find($id);
            if ($pelabuhan) {
                $pelabuhan->nama_pelabuhan = $request->nama_pelabuhan;
                $pelabuhan->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Data berhasil diubah',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak berhasil diambil',
                ]);
            }
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
        Pendataanpelabuhan::destroy($id);
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
