<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tagihans = Tagihan::all(); // Example of fetching all tagihan records
        return view('tagihan.index', compact('tagihans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Logic to show the form for creating a new tagihan
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic to store a new tagihan
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Logic to display a specific tagihan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Logic to show the form for editing a specific tagihan
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Logic to update a specific tagihan
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Logic to delete a specific tagihan
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'payment' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'payment_date' => 'required|date',
        ]);

        $tagihan = Tagihan::findOrFail($id);
        $tagihan->status = 'lunas';
        $tagihan->tanggal_bayar = $request->payment_date;
        $tagihan->save();

        // Simpan riwayat pembayaran jika ada model Payment
        // Payment::create([...]);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dibayar.');
    }
}
