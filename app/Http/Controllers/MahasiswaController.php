<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = [
        ['nama' => 'Syalita Widyandini', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
        ['nama' => 'Fairuza Attar Aviciena', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
        ['nama' => 'Danni Hernando', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
        ['nama' => 'Febrian Adipurnowo', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Inactive'],
        ['nama' => 'Yessa Khoirunissa', 'nip' => '2000018247', 'divisi' => 'PROGRAMMER', 'status' => 'done'],
        ['nama' => 'Syalita Widyandini', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
        ['nama' => 'Fairuza Attar Aviciena', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
        ['nama' => 'Danni Hernando', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'done'],
        ['nama' => 'Febrian Adipurnowo', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Inactive'],
        ['nama' => 'Yessa Khoirunissa', 'nip' => '2000018247', 'divisi' => 'PROGRAMMER', 'status' => 'done'],
    ];
        // $mahasiswa = Mahasiswa::getDataMahasiswa();
        return view('jumlah-mahasiswa.jumlah-mahasiswa', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
