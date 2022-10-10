<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('terminal.index', [
            'title' => 'Menu Terminal',
            'terminals' => Terminal::all()
        ]);
    }

    public function json(){
        return DataTables::eloquent(Terminal::query())
            ->addIndexColumn()
            ->addColumn('action', function(Terminal $terminal){
                return view('terminal.action', [
                    'terminal' => $terminal
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
            'nama_terminal' => 'required|max:255',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 401,
                'errors' => 'Data tidak bisa di inputkan',
            ]);
        } else {
            $terminal = new Terminal();
            $terminal->nama_terminal = $request->nama_terminal;
            $terminal->save();
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
        $terminal = Terminal::find($id);
        if($terminal){
            return response()->json([
                'status' => 200,
                'data' => $terminal
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
            'nama_terminal' => 'required|max:255'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => 'Data tidak bisa di ubah',
            ]);
        } else {
            $terminal = Terminal::find($id);
            if ($terminal) {
                $terminal->nama_terminal = $request->nama_terminal;
                $terminal->update();

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
        Terminal::destroy($id);
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
