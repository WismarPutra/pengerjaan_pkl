<div class="modal fade" id="kehadiranModal" tabindex="-1" aria-labelledby="kehadiranModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ route('kehadiran.store') }}" methode="POST">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="kehadiranModalLabel">Input Kehadiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <form id="formKehadiran">
                      <table id="customers" style="margin-top: 10px; grid-column: 1 / -1">
                      <tr>
                          <th>No</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Regional/Direktorat</th>
                          <th>Nama Posisi</th>
                          <th>Email</th>
                          <th>No. Telepon</th>
                          <th>Kehadiran</th>
                      </tr>
                      @foreach ($pesertas as $index => $peserta)
                      <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ $peserta->nik }}</td>
                          <td>{{ $peserta->nama }}</td>
                          <td>{{ $peserta->direktorat }}</td>
                          <td>{{ $peserta->posisi }}</td>
                          <td>{{ $peserta->email }}</td>
                          <td>{{ $peserta->telepon }}</td>
                          <td>
                            <input type="checkbox" name="kehadiran[]" value="{{ $peserta->id }}">
                          </td>
                      </tr>
                      @endforeach
                      </table>
                    </form>
                  </div>
                
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
    </div>