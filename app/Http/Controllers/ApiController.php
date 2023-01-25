<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kontrak;
use App\Models\Pegawai;
use Illuminate\Http\Request;
// use Yajra\DataTables\DataTables;
use DataTables;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{


    public function getDataPegawai(Request $request)
    {
        ini_set('memory_limit', '-1');
        if ($request->id) {
            $data = Pegawai::where('id', $request->id)->get();
        } elseif ($request->nama) {
            $data = Pegawai::where('nama', $request->nama)->get();
        } else {
            $data = Pegawai::join('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id')
                ->join('kontrak', 'pegawai.id', '=', 'kontrak.id_pegawai')
                ->select('pegawai.nama', 'pegawai.alamat', 'pegawai.no_telp', 'jabatan.posisi', 'kontrak.durasi', 'kontrak.gaji', 'pegawai.id')
                ->get();
            // $data = Pegawai::all();
        }
        return DataTables::of($data)->toJson();

        if ($data->count()) {
            return response()->json([
                'status' => true,
                'total' => $data->count(),
                'message' => 'success',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'total' => 0,
                'message' => 'failed',
                'data' => 'Data Not Found'
            ], 400);
        }
    }

    public function addPegawai(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:6',
            'no_telp' => 'required',
            'id_jabatan' => 'required',
            'durasi' => 'required',
            'gaji' => 'required'
        ]);

        $pegawai = Pegawai::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'id_jabatan' => $request->id_jabatan,
        ]);

        $id_pegawai = Pegawai::latest()->value('id');
        // dd($id_pegawai);
        $kontrak = Kontrak::create([
            'durasi' => $request->durasi,
            'gaji' => $request->gaji,
            'id_pegawai' =>  $id_pegawai
        ]);
        // return DataTables::of($data)->toJson();
        // return redirect('/dashboard')->with('success', "Pegawai berhasil dibuat");

        if ($pegawai && $kontrak) {
            return response()->json([
                'status' => true,
                'message' => 'Pegawai berhasil ditambahkan',
                'data' => $pegawai, $kontrak
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'failed'
            ], 400);
        }
    }
    public function editPegawai(Request $request, $id)
    {


        $pegawai = Pegawai::find($id);
        $kontrak = Kontrak::find($id);

        $pegawai->nama = $request->input('nama');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->no_telp = $request->input('no_telp');
        $pegawai->id_jabatan = $request->input('id_jabatan');
        $kontrak->durasi = $request->input('durasi');
        $kontrak->gaji = $request->input('gaji');

        $pegawai->save();
        $kontrak->save();

        if ($pegawai && $kontrak) {
            return response()->json([
                'status' => true,
                'message' => 'Pegawai berhasil diedit',
                'data' => $pegawai, $kontrak
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'failed'
            ], 400);
        }
    }

    public function destroyPegawai($id)
    {
        $data = Pegawai::find($id);
        $data->delete();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Pegawai berhasil dihapus',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Pegawai tidak berhasil dihapus'
            ], 400);
        }
    }
}
