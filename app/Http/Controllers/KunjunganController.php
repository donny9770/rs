<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kunjungan;
use App\Models\Dokter;

use PDF;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Kunjungan Pasien';
		$data['q'] = $request->q;
        $data['rows'] = Kunjungan::where('nama', 'like', '%' . $request->q . '%')->get();
        return view('kunjungan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Kunjungan Pasien';		
		$data['dokters'] = Dokter::all();
        return view('kunjungan.create', $data);
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
            'ktp' => 'required',
            'nama' => 'required',
			'kelamin' => 'required',
            'tgllahir' => 'required',
			'alamat' => 'required',
            'nomorhp' => 'required',
			'dokter' => 'required',
            'keluhan' => 'required',
			'penanganan' => 'required',
            'biaya' => 'required',
        ]);

        $kunjungan = new Kunjungan();
        $kunjungan->ktp = $request->ktp;
        $kunjungan->nama = $request->nama;
		$kunjungan->kelamin = $request->kelamin;
        $kunjungan->tgllahir = $request->tgllahir;
		$kunjungan->alamat = $request->alamat;
        $kunjungan->nomorhp = $request->nomorhp;
		$kunjungan->dokter = $request->dokter;
        $kunjungan->keluhan = $request->keluhan;
		$kunjungan->penanganan = $request->penanganan;
		$kunjungan->biaya = $request->biaya;
        $kunjungan->save();
        return redirect('kunjungan')->with('success', 
				'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kunjungan $kunjungan)
    {
		$data['row'] = $kunjungan;
		$pdf = PDF::loadview('kunjungan.kuitansi',$data);
		return $pdf->download('kunjungan-'.$kunjungan->ktp.'-pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunjungan $kunjungan)
    {
        $data['title'] = 'Ubah Kunjungan';
        $data['row'] = $kunjungan;
		$data['dokters'] = Dokter::all();
        return view('kunjungan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        $request->validate([
            'ktp' => 'required',
            'nama' => 'required',
			'kelamin' => 'required',
            'tgllahir' => 'required',
			'alamat' => 'required',
            'nomorhp' => 'required',
			'dokter' => 'required',
            'keluhan' => 'required',
			'penanganan' => 'required',
            'biaya' => 'required',
        ]);

        $kunjungan->ktp = $request->ktp;
        $kunjungan->nama = $request->nama;
		$kunjungan->kelamin = $request->kelamin;
        $kunjungan->tgllahir = $request->tgllahir;
		$kunjungan->alamat = $request->alamat;
        $kunjungan->nomorhp = $request->nomorhp;
		$kunjungan->dokter = $request->dokter;
        $kunjungan->keluhan = $request->keluhan;
		$kunjungan->penanganan = $request->penanganan;
		$kunjungan->biaya = $request->biaya;
        $kunjungan->save();
        return redirect('kunjungan')->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();
        return redirect('kunjungan')->with('success', 'Hapus Data Berhasil');
    }
}
