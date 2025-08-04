<?php

namespace App\Http\Controllers;

use App\Imports\PelangganImport;
use App\Models\Pelanggan;
use App\Models\Penarik;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user || !$user->hasRole('admin')) {
            $pelanggans = Pelanggan::with('penarik')->orderBy('id')->get();
        } else {
            $pelanggans = Pelanggan::with('user')
            ->where('penarik_id', $user->id)
            ->orderBy('id')
            ->get();
        }

        return view('pelanggan.index', compact('pelanggans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function show($id)
    {
        $pelanggans = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'telepon' => 'required|string|max:15',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan created successfully.');
    }

    public function edit($id)
    {
        $pelanggans = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggans'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email,' . $pelanggan->id,
            'telepon' => 'required|string|max:15',
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan updated successfully.');
    }

    public function importPelanggan(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new PelangganImport, $request->file('file'));

        return back()->with('success', 'Data pelanggan berhasil diimpor!');
    }
}
