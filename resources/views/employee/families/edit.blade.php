@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-semibold mb-6 text-center">Edit Informasi Anak</h2>

    <form action="{{ route('families.update', ['employee' => $employee->id, 'family' => $family->id]) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nama Lengkap -->
            <div>
                <label class="block mb-1">Nama Lengkap *</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $family->nama_lengkap) }}" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label class="block mb-1">Jenis Kelamin *</label>
                <select name="jenis_kelamin" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach($jenisKelamin as $jk)
                        <option value="{{ $jk }}" {{ $family->jenis_kelamin == $jk ? 'selected' : '' }}>{{ $jk }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tempat Lahir -->
            <div>
                <label class="block mb-1">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $family->tempat_lahir) }}" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label class="block mb-1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $family->tanggal_lahir) }}" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Pendidikan -->
            <div>
                <label class="block mb-1">Pendidikan</label>
                <select name="pendidikan" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach($pendidikan as $p)
                        <option value="{{ $p }}" {{ $family->pendidikan == $p ? 'selected' : '' }}>{{ $p }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Status Anak -->
            <div>
                <label class="block mb-1">Status Anak</label>
                <select name="status_anak" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach($statusAnak as $sa)
                        <option value="{{ $sa }}" {{ $family->status_anak == $sa ? 'selected' : '' }}>{{ $sa }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Urutan Anak -->
            <div>
                <label class="block mb-1">Urutan Anak</label>
                <select name="urutan_anak" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach($urutanAnak as $ua)
                        <option value="{{ $ua }}" {{ $family->urutan_anak == $ua ? 'selected' : '' }}>{{ $ua }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Keterangan -->
            <div>
                <label class="block mb-1">Keterangan</label>
                <select name="keterangan" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach($keterangan as $ket)
                        <option value="{{ $ket }}" {{ $family->keterangan == $ket ? 'selected' : '' }}>{{ $ket }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('employees.show', $employee->id) }}" class="bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
