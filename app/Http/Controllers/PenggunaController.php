<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    //controller untuk Lectures
    public function index_lecturers()
    {
        $penggunas = Pengguna::all();
        return view('penggunas.index_lecturers', compact('penggunas'));
    }

    public function create_lecturers()
    {
        $adminData = Pengguna::getAdmin();
        return view('penggunas.create_lecturers', compact('adminData'));
    }

    public function store_lecturers(Request $request)
    {
        
        $request->validate([
            'idPengguna' => 'required|string|max:50',
            'namaPengguna' => 'required|string|max:50',
            'kelas' => 'nullable|string|max:50',
            'nohp' => 'nullable|string|max:20',
            'angkatan' => 'nullable|integer',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:50',
            'admin' => 'nullable|string|max:50',
            'role' => 'required|string|max:50',
        ]);
        Pengguna::create($request->all());
        return redirect()->route('penggunas.index_lecturers');
    }    

    public function edit_lecturers($id)
    {
        $penggunas = Pengguna::findOrFail($id);
        $adminData = Pengguna::getAdmin();
        return view('penggunas.edit_lecturers', compact('penggunas', 'adminData'));
    }

    public function update_lecturers(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update($request->all());
        return redirect()->route('penggunas.index_lecturers');
    }

    public function show_lecturers($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('penggunas.show_lecturers', compact('pengguna'));
    }

    public function destroy_lecturers($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();
        return redirect()->route('penggunas.index_lecturers');
    }

    //controller unutuk students
    public function index_students()
    {
        $penggunas = Pengguna::all();
        return view('penggunas.index_students', compact('penggunas'));
    }

    public function create_students()
    {
        $adminData = Pengguna::getAdmin();
        return view('penggunas.create_students', compact('adminData'));
    }

    public function store_students(Request $request)
    {
        
        $request->validate([
            'idPengguna' => 'required|string|max:50',
            'namaPengguna' => 'required|string|max:50',
            'kelas' => 'nullable|string|max:50',
            'nohp' => 'nullable|string|max:20',
            'angkatan' => 'nullable|integer',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:50',
            'admin' => 'nullable|string|max:50',
            'role' => 'required|string|max:50',
        ]);
        Pengguna::create($request->all());
        return redirect()->route('penggunas.index_students');
    }    

    public function edit_students($id)
    {
        $penggunas = Pengguna::findOrFail($id);
        $adminData = Pengguna::getAdmin();
        return view('penggunas.edit_students', compact('penggunas', 'adminData'));
    }

    public function update_students(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update($request->all());
        return redirect()->route('penggunas.index_students');
    }

    public function show_students($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('penggunas.show_students', compact('pengguna'));
    }

    public function destroy_students($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();
        return redirect()->route('penggunas.index_students');
    }
}
