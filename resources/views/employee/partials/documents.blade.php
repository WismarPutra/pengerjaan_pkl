<h4 class="font-bold mb-2">Dokumen Lainnya</h4>

<form action="{{ route('employee.updateDocuments', $employee->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @foreach ($employee->documents as $doc)
        <div class="mb-3 flex items-center gap-3">
            <span class="w-48">{{ $doc->jenis_dokumen }}</span>
            
            @if($doc->file_path)
                <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank" class="text-blue-600 underline">
                    Klik untuk Melihat
                </a>
                <form action="{{ route('employee.deleteDocument', $doc->id) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2">✕</button>
                </form>
            @else
                <input type="file" name="dokumen[{{ $doc->jenis_dokumen }}]" class="border p-1 rounded">
            @endif
        </div>
    @endforeach

    {{-- Input baru untuk tambah dokumen --}}
    <div id="new-docs"></div>

    <button type="button" onclick="addDoc()" class="bg-blue-600 text-white px-3 py-1 rounded">
        + Tambah
    </button>

    <div class="mt-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
    </div>
</form>

<script>
function addDoc() {
    let container = document.getElementById('new-docs');
    let div = document.createElement('div');
    div.classList.add('mb-3');
    div.innerHTML = `
        <input type="text" name="new_jenis[]" placeholder="Nama Dokumen" class="border p-1 rounded w-48">
        <input type="file" name="new_file[]" class="border p-1 rounded">
    `;
    container.appendChild(div);
}
</script>
