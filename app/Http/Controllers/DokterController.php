<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dokter;
use App\Models\Pelayanan;
use App\Models\User;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Unit Kerja Dokter';
		$data['q'] = $request->q;
        $data['rows'] = Dokter::where('dokter', 'like', '%' . $request->q . '%')->get();
        return view('dokter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Unit Kerja Dokter';		
		$data['dokters'] = User::where('role', 'dokter')->get();
		$data['pelayanans'] = Pelayanan::all();
        return view('dokter.create', $data);
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
            'dokter' => 'required',
            'pelayanan' => 'required',
        ]);

        $dokter = new Dokter();
        $dokter->dokter = $request->dokter;
        $dokter->pelayanan = $request->pelayanan;
        $dokter->save();
        return redirect('dokter')->with('success', 'Tambah Data Berhasil');
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
    public function edit(Dokter $dokter)
    {
        $data['title'] = 'Ubah Unit Kerja Dokter';
        $data['row'] = $dokter;
		$data['dokters'] = User::where('role', 'dokter')->get();
		$data['pelayanans'] = Pelayanan::all();
        return view('dokter.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'dokter' => 'required',
            'pelayanan' => 'required',
        ]);

        $dokter->dokter = $request->dokter;
        $dokter->pelayanan = $request->pelayanan;
        $dokter->save();
        return redirect('dokter')->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect('dokter')->with('success', 'Hapus Data Berhasil');
    }
}
