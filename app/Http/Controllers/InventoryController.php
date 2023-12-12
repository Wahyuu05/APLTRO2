<?php
// app/Http/Controllers/InventoryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Pengguna;

class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::all();
        return view('inventorys.index', compact('inventoryItems'));
    }

    public function create()
    {
        $penggunas = Pengguna::all();
        return view('inventorys.create', compact('penggunas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idtype' => 'required|string|max:50',
            'namabarang' => 'required|string|max:50',
            'jenisbarang' => 'required|string|max:50',
            'jumlahbarang' => 'required|integer',
            'satuan' => 'required|string|max:50',
            'uom' => 'nullable|string|max:50',
            'modifiedbydate' => 'required|date',
            'idPengguna' => 'required|string|max:50',
        ]);

        // Pastikan bahwa nilai jumlahbarang tidak kurang dari 0
        $jumlahbarang = max(0, $request->jumlahbarang);

        // Simpan data ke database
        Inventory::create([
            'idtype' => $request->idtype,
            'namabarang' => $request->namabarang,
            'jenisbarang' => $request->jenisbarang,
            'jumlahbarang' => $jumlahbarang,
            'satuan' => $request->satuan,
            'uom' => $request->uom,
            'modifiedbydate' => $request->modifiedbydate,
            'idPengguna' => $request->idPengguna,
        ]);

        return redirect()->route('inventorys.index')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show($idbarang)
    {
        $inventoryItem = Inventory::with('pengguna')->where('idbarang', $idbarang)->first();
        return view('inventorys.show', compact('inventoryItem'));
    }

    public function edit($idbarang)
    {
        $inventoryItem = Inventory::find($idbarang);
        $penggunas = Pengguna::all();
        return view('inventorys.edit', compact('inventoryItem', 'penggunas'));
    }

    public function update(Request $request, $idbarang)
    {
        $inventoryItem = Inventory::find($idbarang);
        $inventoryItem->update($request->all());

        return redirect()->route('inventorys.index')->with('success', 'Data barang berhasil diperbarui');
    }

    public function destroy($idbarang)
    {
        Inventory::destroy($idbarang);

        return redirect()->route('inventorys.index')->with('success', 'Data barang berhasil dihapus');
    }
}
