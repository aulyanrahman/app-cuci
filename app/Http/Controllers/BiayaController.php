<?php

namespace App\Http\Controllers;

use App\Biaya;
use Illuminate\Http\Request;
use Alert;

class BiayaController extends Controller
{
    public function index(){
        $biaya = Biaya::all();
        return view('biaya.index', compact('biaya'));
    }

    public function create(){
        $biaya = Biaya::all();
        return view('biaya.create', compact('biaya'));
    }

    public function store(Request $request){
        Biaya::create($request->all());
        alert('Sukses', 'Simpan data berhasil!', 'success');
        return redirect()->route('biaya');
    }

    public function edit(Request $request, $id){
        $biaya = Biaya::where('id_biaya', $id)->first();
        return view('biaya.edit', compact('biaya'));
    }

    public function update(Request $request, $id){
        $biaya = Biaya::where('id_biaya', $id)->update([
            'jenis' => $request->jenis,
            'biaya' => $request->biaya
        ]);
        return redirect()->route('biaya');
    }

    public function destroy(Request $request, $id){
        $biaya = Biaya::where('id_biaya', $id)->delete();
        return redirect()->route('biaya');
    }
}
