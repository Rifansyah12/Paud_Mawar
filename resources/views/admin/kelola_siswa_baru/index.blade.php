{{-- resources/views/admin/calon_siswa/index.blade.php --}}
@extends('admin.layouts.app')
@section('title', 'Kelola Siswa Baru')
@section('content')
    <h2>Daftar Siswa yang Telah Dikonfirmasi</h2>
    <p>Berikut adalah siswa yang telah dikonfirmasi pendaftarannya:</p>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftaran as $key => $siswa)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $siswa->nama_lengkap }}</td>
                    <td> 
                        @php
                            $usia = \Carbon\Carbon::parse($siswa->tanggal_lahir)->age;
                        @endphp
                        {{ $usia }} tahun
                    </td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>
                    <!-- Tombol untuk membuka modal edit -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $siswa->id }}">
                        Edit
                    </button>

                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal{{ $siswa->id }}">Lihat</a>          
                    <form action="{{ route('admin.calon_siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    </td>
                    <!-- Modal edit -->
                     <!-- Modal Edit -->
<div class="modal fade" id="editModal{{ $siswa->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $siswa->id }}" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <form action="{{ route('admin.calon_siswa.update', $siswa->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel{{ $siswa->id }}">Edit Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="row">
            <!-- Data Calon Siswa -->
            <div class="col-md-6">
              <h5>Data Calon Siswa</h5>
              <div class="form-group">
                <label>Tanggal Daftar</label>
                <input type="date" name="tanggal_daftar" class="form-control" value="{{ $siswa->tanggal_daftar }}" required>
              </div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{ $siswa->nama_lengkap }}" required>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                  <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label>NISN</label>
                <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}" required>
              </div>
              <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik" class="form-control" value="{{ $siswa->nik }}" required>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ $siswa->tempat_lahir }}" required>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}" required>
              </div>
              <div class="form-group">
                <label>Agama</label>
                <input type="text" name="agama" class="form-control" value="{{ $siswa->agama }}" required>
              </div>
              <div class="form-group">
                <label>Berkebutuhan Khusus</label>
                <input type="text" name="berkebutuhan_khusus" class="form-control" value="{{ $siswa->berkebutuhan_khusus }}">
              </div>
            </div>

            <!-- Alamat, Tinggal, Kontak -->
            <div class="col-md-6">
              <h5>Alamat & Kontak</h5>
              <div class="form-group">
                <label>Dusun</label>
                <input type="text" name="dusun" class="form-control" value="{{ $siswa->dusun }}">
              </div>
              <div class="form-group">
                <label>Desa</label>
                <input type="text" name="desa" class="form-control" value="{{ $siswa->desa }}">
              </div>
              <div class="form-group">
                <label>Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control" value="{{ $siswa->kecamatan }}">
              </div>
              <div class="form-group">
                <label>Kab/Kota</label>
                <input type="text" name="kab_kota" class="form-control" value="{{ $siswa->kab_kota }}">
              </div>
              <div class="form-group">
                <label>Provinsi</label>
                <input type="text" name="provinsi" class="form-control" value="{{ $siswa->provinsi }}">
              </div>
              <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" name="kode_pos" class="form-control" value="{{ $siswa->kode_pos }}">
              </div>
              <div class="form-group">
                <label>Jenis Tinggal</label>
                <input type="text" name="jenis_tinggal" class="form-control" value="{{ $siswa->jenis_tinggal }}" required>
              </div>
              <div class="form-group">
                <label>Alat Transportasi</label>
                <input type="text" name="alat_transportasi" class="form-control" value="{{ $siswa->alat_transportasi }}" required>
              </div>
              <div class="form-group">
                <label>No Telp Rumah</label>
                <input type="text" name="no_telp_rumah" class="form-control" value="{{ $siswa->no_telp_rumah }}">
              </div>
              <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $siswa->no_hp }}">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $siswa->email }}">
              </div>
            </div>

            <!-- Data Periodik -->
            <div class="col-md-6">
              <h5>Data Periodik</h5>
              <div class="form-group">
                <label>Tinggi Badan (cm)</label>
                <input type="number" name="tinggi_badan" class="form-control" value="{{ $siswa->tinggi_badan }}" required>
              </div>
              <div class="form-group">
                <label>Berat Badan (kg)</label>
                <input type="number" name="berat_badan" class="form-control" value="{{ $siswa->berat_badan }}" required>
              </div>
              <div class="form-group">
                <label>Jarak ke Sekolah (km)</label>
                <input type="number" step="0.01" name="jarak_ke_sekolah" class="form-control" value="{{ $siswa->jarak_ke_sekolah }}" required>
              </div>
              <div class="form-group">
                <label>Waktu Tempuh (menit)</label>
                <input type="number" name="waktu_tempuh_ke_sekolah" class="form-control" value="{{ $siswa->waktu_tempuh_ke_sekolah }}" required>
              </div>
              <div class="form-group">
                <label>Jumlah Saudara</label>
                <input type="number" name="jumlah_saudara" class="form-control" value="{{ $siswa->jumlah_saudara }}" required>
              </div>
            </div>

            <!-- Data Ayah -->
            <div class="col-md-6">
              <h5>Data Ayah</h5>
              <div class="form-group">
                <label>NIK Ayah</label>
                <input type="text" name="nik_ayah" class="form-control" value="{{ $siswa->nik_ayah }}" required>
              </div>
              <div class="form-group">
                <label>Nama Ayah</label>
                <input type="text" name="nama_ayah" class="form-control" value="{{ $siswa->nama_ayah }}" required>
              </div>
              <div class="form-group">
                <label>Tahun Lahir Ayah</label>
                <input type="text" name="tahun_lahir_ayah" class="form-control" value="{{ $siswa->tahun_lahir_ayah }}" required>
              </div>
              <div class="form-group">
                <label>Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" class="form-control" value="{{ $siswa->pekerjaan_ayah }}" required>
              </div>
              <div class="form-group">
                <label>Pendidikan Ayah</label>
                <input type="text" name="pendidikan_ayah" class="form-control" value="{{ $siswa->pendidikan_ayah }}" required>
              </div>
              <div class="form-group">
                <label>Penghasilan Ayah</label>
                <input type="text" name="penghasilan_ayah" class="form-control" value="{{ $siswa->penghasilan_ayah }}" required>
              </div>
              <div class="form-group">
                <label>Berkebutuhan Khusus Ayah</label>
                <input type="text" name="berkebutuhan_khusus_ayah" class="form-control" value="{{ $siswa->berkebutuhan_khusus_ayah }}">
              </div>
            </div>

            <!-- Data Ibu -->
            <div class="col-md-6">
              <h5>Data Ibu</h5>
              <div class="form-group">
                <label>NIK Ibu</label>
                <input type="text" name="nik_ibu" class="form-control" value="{{ $siswa->nik_ibu }}" required>
              </div>
              <div class="form-group">
                <label>Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control" value="{{ $siswa->nama_ibu }}" required>
              </div>
              <div class="form-group">
                <label>Tahun Lahir Ibu</label>
                <input type="text" name="tahun_lahir_ibu" class="form-control" value="{{ $siswa->tahun_lahir_ibu }}" required>
              </div>
              <div class="form-group">
                <label>Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" class="form-control" value="{{ $siswa->pekerjaan_ibu }}" required>
              </div>
              <div class="form-group">
                <label>Pendidikan Ibu</label>
                <input type="text" name="pendidikan_ibu" class="form-control" value="{{ $siswa->pendidikan_ibu }}" required>
              </div>
              <div class="form-group">
                <label>Penghasilan Ibu</label>
                <input type="text" name="penghasilan_ibu" class="form-control" value="{{ $siswa->penghasilan_ibu }}" required>
              </div>
              <div class="form-group">
                <label>Berkebutuhan Khusus Ibu</label>
                <input type="text" name="berkebutuhan_khusus_ibu" class="form-control" value="{{ $siswa->berkebutuhan_khusus_ibu }}">
              </div>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan Perubahan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </form>
  </div>
</div>

                    <!-- Modal Lihta -->
    <div class="modal fade" id="detailModal{{ $siswa->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $siswa->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel{{ $siswa->id }}">Detail Calon Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <div class="modal-body">
                <h5 style="text-align: center; color: #007BFF; font-weight: bold; margin-top: 20px; font-size: 24px;">
                    Data Calon Siswa
                </h5>

                <p><strong>NIK:</strong> {{ $siswa->nik }}</p>
                <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
                <p><strong>Nama Lengkap:</strong> {{ $siswa->nama_lengkap }}</p>
                <p><strong>Tempat, Tanggal Lahir:</strong> {{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</p>
                <p><strong>Agama:</strong> {{ $siswa->agama }}</p>
                <p><strong>Berkebutuhan Khusus:</strong> {{ $siswa->berkebutuhan_khusus ?? '-' }}</p>
                <p><strong>Alamat:</strong>
                    {{ $siswa->dusun ? $siswa->dusun . ', ' : '' }}
                    {{ $siswa->desa }}, {{ $siswa->kecamatan }}, {{ $siswa->kab_kota }}, {{ $siswa->provinsi }}
                    {{ $siswa->kode_pos ? ' - ' . $siswa->kode_pos : '' }}
                </p>

                <p><strong>Jenis Tinggal:</strong> {{ $siswa->jenis_tinggal }}</p>
                <p><strong>Alat Transportasi:</strong> {{ $siswa->alat_transportasi }}</p>
                <p><strong>No Tlp:</strong> {{ $siswa->no_telp_rumah }}</p>
                <p><strong>No HP:</strong> {{ $siswa->no_hp }}</p>
                <p><strong>Email:</strong> {{ $siswa->email}}</p>
                <hr>
                <h5 style="text-align: center; color: #007BFF; font-weight: bold; margin-top: 20px; font-size: 24px;">
                    Data Priodik
                </h5>
                <p><strong>Tinggi Badan:</strong> {{ $siswa->tinggi_badan }} cm</p>
                <p><strong>Berat Badan:</strong> {{ $siswa->berat_badan }} kg</p>
                <p><strong>Jarak ke Sekolah:</strong> {{ $siswa->jarak_ke_sekolah }} km</p>
                <p><strong>Waktu Tempuh:</strong> {{ $siswa->waktu_tempuh_ke_sekolah }} menit</p>
                <p><strong>Jumlah Saudara:</strong> {{ $siswa->jumlah_saudara }}</p>
                <hr>
                <h5 style="text-align: center; color: #007BFF; font-weight: bold; margin-top: 20px; font-size: 24px;">
                    Data Ayah
                </h5>
                <p><strong>NIK Ayah:</strong> {{ $siswa->nik_ayah }}</p>
                <p><strong>Nama Ayah:</strong> {{ $siswa->nama_ayah }}</p>
                <p><strong>Tahun Lahir Ayah:</strong> {{ $siswa->tahun_lahir_ayah }}</p>
                <p><strong>Pekerjaan Ayah:</strong> {{ $siswa->pekerjaan_ayah }}</p>
                <p><strong>Pendidikan Ayah:</strong> {{ $siswa->pendidikan_ayah }}</p>
                <p><strong>Penghasilan Ayah:</strong> {{ $siswa->penghasilan_ayah }}</p>
                <p><strong>Berkebutuhan Khusus Ayah:</strong> 
                    {{ $siswa->berkebutuhan_khusus_ayah ?? '-' }}
                </p>

                <hr>
                <h5 style="text-align: center; color: #007BFF; font-weight: bold; margin-top: 20px; font-size: 24px;">
                    Data Ibu
                </h5>
                <p><strong>NIK Ibu:</strong> {{ $siswa->nik_ibu }}</p>
                <p><strong>Nama Ibu:</strong> {{ $siswa->nama_ibu }}</p>
                <p><strong>Tahun Lahir Ibu:</strong> {{ $siswa->tahun_lahir_ibu }}</p>
                <p><strong>Pekerjaan Ibu:</strong> {{ $siswa->pekerjaan_ibu }}</p>
                <p><strong>Pendidikan Ibu:</strong> {{ $siswa->pendidikan_ibu }}</p>
                <p><strong>Penghasilan Ibu:</strong> {{ $siswa->penghasilan_ibu }}</p>
                <p><strong>Berkebutuhan Khusus Ibu:</strong> 
                    {{ $siswa->berkebutuhan_khusus_ibu ?? '-' }}
                </p>


                <p><strong>Status:</strong>
                    @if($siswa->status === 'Dikonfirmasi')
                        <span class="badge bg-success">{{ $siswa->status }}</span>
                    @elseif($siswa->status === 'Menunggu')
                        <span class="badge bg-warning text-dark">{{ $siswa->status }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $siswa->status }}</span>
                    @endif
                </p>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
        </div>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada siswa yang dikonfirmasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('admin.calon_siswa.export') }}" class="btn btn-success mb-3">
    Export ke Excel
    </a>

    


@endsection
