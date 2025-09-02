{{-- partials/aktivitas_karir.blade.php --}}
<div class="content">
    <div class="content5" >
        <div class="left-content">
          <h4 class="content-info">Aktivitas Karir</h4>
        </div>
        <div class="right-content3">
          <a href="#" class="add-btn" data-bs-toggle="modal" data-bs-target="#tambahAktivitasModal"><i class="fas fa-plus"></i>Tambah</a>
        </div>
    </div> 

    <div class="body-card">
        @if($career->isEmpty())
            <p class="text-muted">Belum ada data aktivitas karir.</p>
        @else
        @php
            // ambil tahun terbesar dari semua data
            $maxYear = $career->map(function($item) {
                return \Carbon\Carbon::parse($item->tanggalKDMP)->year;
            })->max();
        @endphp
            
            <div class="timeline-container">
                <div class="timeline-group">
                    @foreach($career as $item)
                        @php
                            $tahun = \Carbon\Carbon::parse($item->tanggalKDMP)->year;
                            $isNewest = $tahun == $maxYear;
                        @endphp
                        
                        <div class="timeline-item {{ $isNewest ? 'new' : 'old' }}">
                            <div class="{{ $isNewest ? 'timeline-year' : 'timeline-year1' }}">{{ $tahun }}</div>
                            <div class="timeline-content">
                                <div class="role-left">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#detailAktivitasModal" class="{{ $isNewest ? 'role-title' : 'role-title1' }}">
                                        {{ $item->nama_role }}
                                    </a>
                                </div>
                                <div class="role-right">
                                    <form action="{{ route('career.delete', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn"><i class="fas fa-trash-can"></i>Delete</button>
                                    </form>
                                    <a href="#" class="edit-btn"><i class="fas fa-pen"></i>Edit</a>
                                </div> 
                            </div>
                            <div class="timeline-content1">
                                <p class="sub-info">{{ $item->tanggalBand }} • {{ $item->regional_direktorat }} • {{ $item->band_posisi }}</small>
                                <p class="promo-date">Tanggal Promosi : {{ $item->tanggalKDMP }}</small>
                                <p class="description">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <hr class="divider">

        @include('employee.partials.histori_pekerjaan', ['career' => $career, 'employee' => $employee])
    </div>
</div>


{{-- Modal Tambah Aktivitas --}}
<div class="modal" id="tambahAktivitasModal">
    <div class="modal-dialog">
        <form action="{{ route('employee.career.store', $employee->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="content6">
                <div class="left-content6">
                    <h5>Tambah Aktivitas Karir</h5>
                </div>
                
                <div class="right-content6">

                    <a href="javascript:void(0)" class="addInfo-btn" id="openInfo">
                        <i class="fas fa-plus"></i>Tambah Informasi Lain
                    </a>

                    <button data-bs-dismiss="modal" class="close-button">
                        <i class="fas fa-circle-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="form-grid1">
                <div class="form-group">
                    <div class="label-group">
                        <label>Nama Role</label>
                        <label class="bintang">*</label>
                    </div>
                    <input type="text" name="nama_role" class="form-control" required>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Regional/Direktorat</label>
                        <label class="bintang">*</label>
                    </div>
                    <select name="regional_direktorat" class="form-control1"  required>
                        <option disabled selected value=""></option>
                        <option value="blablabla">blablabla</option>
                        <option value="claclacla">claclacla</option>
                        <option value="dladladla">dladladla</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Unit/Sub Direktorat</label>
                        <label class="bintang">*</label>
                    </div>
                    <select name="unitSub" class="form-control1"  required>
                        <option disabled selected value=""></option>
                        <option value="blablabla">blablabla</option>
                        <option value="claclacla">claclacla</option>
                        <option value="dladladla">dladladla</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Band</label>
                        <label class="bintang">*</label>
                    </div>
                    <select name="band_posisi" class="form-control1"  required>
                        <option disabled selected value=""></option>
                        <option value="band level V">Band Level V</option>
                        <option value="claclacla">claclacla</option>
                        <option value="dladladla">dladladla</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Deskripsi</label>
                        <label class="bintang">*</label>
                    </div>
                    <input type="text" name="deskripsi" class="form-control" required>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Status PJ</label>
                        <label class="bintang">*</label>
                    </div>
                    <select name="statusPJ" class="form-control1"  required>
                        <option disabled selected value=""></option>
                        <option value="blablabla">blablabla</option>
                        <option value="claclacla">claclacla</option>
                        <option value="dladladla">dladladla</option>
                    </select>
                </div>


                <!-- container untuk field tambahan -->
                <div id="extraFields"></div>

            </div>
            <div class="form-buttons">
                <button type="button" class="cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="submit">Tambah</button>
            </div>
            
        </form>
    </div>
</div>

{{-- Modal Detail Aktivitas Karir --}}
<div class="modal" id="detailAktivitasModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="content6">
                <div class="left-content6">
                <h5>Detail Aktivitas Karir</h5>
                </div>
                    
                <div class="right-content6">
                    <button data-bs-dismiss="modal" class="close-button">
                        <i class="fas fa-circle-xmark"></i>
                    </button>
                </div>
            </div>
            @foreach($career as $item)
                <div class="form-grid">
                    <div class="form-group">
                        <h4>Nama Role</h4>
                        <p>{{ $item->nama_role }}</p>
                    </div>

                    <div class="form-group">
                        <h4>Regional/Direktorat</h4>
                        <p>{{ $item->regional_direktorat }}</p>
                    </div>

                    <div class="form-group">
                        <h4>Unit/Sub Unit</h4>
                        <p>{{ $item->unitSub }}</p>
                    </div>

                    <div class="form-group">
                        <h4>Band</h4>
                        <p>{{ $item->band_posisi }}</p>
                    </div>

                    <div class="form-group">
                        <h4>Deskripsi</h4>
                        <p>{{ $item->deskripsi }}</p>
                    </div>

                    @if($item->tanggalKDMP)
                        <div class="form-group">
                            <h4>Tanggal Promosi</h4>
                            <p>{{ \Carbon\Carbon::parse($item->tanggalKDMP)->format('d F Y') }}</p>
                        </div>
                    @endif

                    @if($item->tanggalBand)
                        <div class="form-group">
                            <h4>Tanggal Band Posisi Terakhir</h4>
                            <p>{{ \Carbon\Carbon::parse($item->tanggalBand)->format('d F Y') }}</p>
                        </div>
                    @endif

                    @if($item->tanggalTKWT)
                        <div class="form-group">
                            <h4>Tanggal TKWT</h4>
                            <p>{{ \Carbon\Carbon::parse($item->tanggalTKWT)->format('d F Y') }}</p>
                        </div>
                    @endif


                    @if($item->dokumenSK)
                        <div class="form-group">
                            <h4>Dokumen SK</h4>
                            <a href="{{ asset('storage/'.$item->dokumenSK) }}" target="_blank">Klik Untuk Melihat</a>                    
                        </div>
                    @endif

                    @if($item->dokumen_nota_dinas)
                        <div class="form-group">
                            <h4>Dokumen Nota Dinas</h4>
                            <a href="{{ asset('storage/'.$item->dokumen_nota_dinas) }}" target="_blank">Klik Untuk Melihat</a>                    
                        </div>
                    @endif

                    @if($item->dokumen_lainnya)
                        <div class="form-group">
                            <h4>Dokumen Lainnya</h4>
                            <a href="{{ asset('storage/'.$item->dokumen_lainnya) }}" target="_blank">Klik Untuk Melihat</a>                    
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>


<div class="modal fade" id="infoModal">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="tanggalKDMP" value="Tanggal KDMP" id="info1">
        <label class="form-check-label" for="info1">Tanggal KDMP</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="tanggalTKWT" value="Tanggal TKWT" id="info2">
        <label class="form-check-label" for="info2">Tanggal TKWT</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="tanggal_akhirTKWT" value="Tanggal Akhir TKWT" id="info3">
        <label class="form-check-label" for="info3">Tanggal Akhir TKWT</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="tanggal_mutasi" value="Tanggal Mutasi" id="info4">
        <label class="form-check-label" for="info4">Tanggal Mutasi</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="tanggalPJ" value="Tanggal PJ" id="info5">
        <label class="form-check-label" for="info5">Tanggal PJ</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="tanggal_lepasPJ" value="Tanggal Lepas PJ" id="info6">
        <label class="form-check-label" for="info6">Tanggal Lepas PJ</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="tanggalBand" value="Tanggal Band Posisi Terakhir" id="info7">
        <label class="form-check-label" for="info7">Tanggal Band Posisi Terakhir</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="tanggal_pensiun" value="Tanggal Pensiun" id="info8">
        <label class="form-check-label" for="info8">Tanggal Pensiun</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="tanggal_akhir_kontrak" value="Tanggal Akhir Kontrak" id="info9">
        <label class="form-check-label" for="info9">Tanggal Akhir Kontrak</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="dokumenSK" value="Dokumen SK" id="info10">
        <label class="form-check-label" for="info10">Dokumen SK</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="dokumen_nota_dinas" value="Dokumen Nota Dinas" id="info11">
        <label class="form-check-label" for="info11">Dokumen Nota Dinas</label>
      </div>
      <div class="form-check">
        <input class="form-check-input info-option" type="checkbox" name="dokumen_lainnya" value="Dokumen Lainnya" id="info12">
        <label class="form-check-label" for="info12">Dokumen Lainnya</label>
      </div>

      <div class="buttons1">
        <button type="button" class="cancel1" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="simpan1" id="saveInfo">Simpan</button>
      </div>
    </div>
  </div>
</div>