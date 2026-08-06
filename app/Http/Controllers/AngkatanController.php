<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;
use Exception;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $angkatan = Angkatan::all();
        return view('admin.angkatan.index', compact('angkatan'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'angkatan' => 'required|string|max:255',
            ]);
            Angkatan::create($request->all());
            return redirect()->back()->with('success', 'Angkatan berhasil ditambahkan');
        }catch  (Exception $e){
            return redirect()->back()->with('error', 'Angkatan gagal ditambahkan: ' . $e->getMessage());
        }

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $angkatan = Angkatan::findOrFail($id);
        $request->validate([
            'angkatan' => 'required|string|max:255',
        ]);
        $angkatan->update($request->all());
        return redirect()->back()->with('success', 'Angkatan berhasil diubah');
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Angkatan gagal diubah: ' . $e->getMessage());
    }
}

public function destroy($id)
{
    try {
        $angkatan = Angkatan::findOrFail($id);
        $angkatan->delete();
        return redirect()->back()->with('success', 'Angkatan berhasil dihapus');
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Angkatan gagal dihapus: ' . $e->getMessage());
    }
}
}
