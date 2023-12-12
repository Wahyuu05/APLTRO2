<!-- resources/views/lecturers/edit.blade.php -->

@extends('layouts.main')
@section('container')
<div class="container mx-auto p-4">
    <h1 style="font-size: 30px; font: bold;" class="mb-6 no-select">Edit Lecturer</h1>
    <form action="{{ route('penggunas.update_lecturers', $penggunas->idPengguna) }}" method="POST" class="no-select">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="idPengguna" class="block text-gray-700">Lecturer's ID</label>
            <input type="text" name="idPengguna" id="idPengguna" value="{{ $penggunas->idPengguna }}"  class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="namaPengguna" class="block text-gray-700">Lecturer's Name</label>
            <input type="text" name="namaPengguna" id="namapengguna" value="{{ $penggunas->namaPengguna }}" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="username" class="block text-gray-700">Username</label>
            <input type="text" name="username" id="username" value="{{ $penggunas->username }}" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="text" name="password" id="password" value="{{ $penggunas->password }}" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="admin" class="block text-gray-700">Admin</label>
            @if($adminData)
            <input type="text" name="admin" id="admin" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $adminData }}" readonly>
            @else
            <span>Tidak ada data admin ditemukan.</span>
            @endif
        </div>
        <input name="role" type="hidden" name="role" id="role" value="{{ $penggunas->role }}" readonly>

        <button href="{{ route('penggunas.index_lecturers') }}" class="bg-slate-700 text-white px-4 py-2 rounded-md">Cancel</button>
        <button type="submit" class="bg-slate-700 hover:bg-opacity-90 text-white px-4 py-2 rounded-md">Update</button>
    </form>
</div>
@endsection