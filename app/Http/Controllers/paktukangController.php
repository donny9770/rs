<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paktukangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Data Unit Kerja paktukang';
        $data['q'] = $request->q;
        $data['rows'] = paktukang::where('paktukang', 'like', '%'. $request->q . '%')->get();
        return view('paktukang.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Unit Kerja paktukang';
        $data['paktukangs'] = User::where('role', 'paktukang')->get();
        $data['pelayanans'] = Pelayanan::all();
return view('paktukang.create', $data);
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
'paktukang' => 'required',
'pelayanan' => 'required',
]);
$paktukang = new paktukang();
$paktukang->paktukang = $request->paktukang;
$paktukang->pelayanan = $request->pelayanan;
$paktukang->save();
return redirect('paktukang')->with('success', 'Tambah Data
Berhasil');
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
        $data['title'] = 'Ubah Unit Kerja Dokter';
        $data['row'] = $paktukang;
        $data['paktukang'] = User::where('role', 'paktukang')->get();
        $data['pelayanans'] = Pelayanan::all();
    return view('paktukang.edit', $data);
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
        $request->validate([
'paktukang' => 'required',
'pelayanan' => 'required',
]);
$paktukang->paktukang = $request->paktukang;
$paktukang->pelayanan = $request->pelayanan;
$dokter->save();
return redirect('paktukang')->with('success', 'Ubah Data
Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter->delete();
return redirect('paktukang')->with('success', 'Hapus Data
Berhasil');
    }
}
