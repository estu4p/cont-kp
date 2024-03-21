<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
// use Illuminate\Http\Request;
use App\Models\Shift;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;





class ManageDivisiController extends Controller
{
    public function daftarMitraPengaturanDivisi(Request $request)
    {
        $divisi = Divisi::all();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['message' => 'Pengaturan Divisi', 'Divisi' => $divisi]);
        } else {
            return view('pengaturan.margepenilaiandivisi', ['divisi' => $divisi]);
        }
    }

    public function addDivisi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required',
            'deskripsi_divisi' => '',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Divisi([
            'nama_divisi' => $request->input('nama_divisi'), // Sesuaikan dengan nama yang benar dari permintaan
        ]);

        $data->save();

        return response()->json(['success' => true, 'message' => 'Success to add divisi'], 200);
    }
    public function updateDivisi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required',
            'deskripsi_divisi' => '',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'gagal update divisi',], 404);
        }
        $data = Divisi::find($id);
        $data->fill([
            'nama_divisi' => $request->nama_divisi
        ]);
        $data->save();
        return response()->json(['success' => true, 'message' => 'succes to update divisi', 'data' => $data], 200);
    }
    public function destroyDivisi($id)
    {
        $data = Divisi::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Succes to delete divisi'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
    }


    public function addShifft(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_shift' => 'required',
            'jml_jam_kerja'=> 'required',
            'jam_masuk'=> 'required',
            'jam_pulang'=> 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Shift([
            'nama_shift' => $request->input('nama_shift'),
            'jml_jam_kerja'=> $request->input('jml_jam_kerja'),
            'jam_masuk'=> $request->input('jam_masuk'),
            'jam_pulang'=> $request->input('jam_pulang'),
        ]);

        $data->save();

        return response()->json(['success'=> true, 'message'=> 'Berhasil menambahkan shift'], 200);
    }

    public function updateShift($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_shift' => 'required',
            'jml_jam_kerja'=> 'required',
            'jam_masuk'=> 'required',
            'jam_pulang'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Gagal update shift',], 404);
        }
        $data = Shift::find($id);
        $data->fill([
            'nama_shift' => $request->nama_shift,
            'jml_jam_kerja'=> $request->jml_jam_kerja,
            'jam_masuk'=> $request->jam_masuk,
            'jam_pulang'=> $request->jam_pulang,
        ]);

        $data->save();

        return response()->json(['success'=> true,'message'=> 'Berhasil update shift'], 200);
    }

    public function deleteShift($id)
    {
        //
    }
}
