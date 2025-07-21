@extends('pengelola.layouts.app')


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
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswaBaru as $key => $siswa)
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
                    <form action="{{ route('pengelola.data_siswa_baru.destroy', $siswa->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    </td>
                    <td>
                    <!-- Tombol untuk membuka modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalKelas{{ $siswa->id }}">
                        Masukkan ke Kelas
                    </button>
                    </td>

                    <!-- Modal -->
                    <div class="modal fade" id="modalKelas{{ $siswa->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $siswa->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('siswa.update.kelas', $siswa->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $siswa->id }}">Pilih Kelas untuk {{ $siswa->nama_lengkap }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="kelas_id">Kelas</label>
                                            <select class="form-control" name="kelas_id" required>
                                                <option value="">-- Pilih Kelas --</option>
                                                @foreach ($kelas as $k)
                                                    <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                                                        {{ $k->nama_kelas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal{{ $siswa->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $siswa->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <form action="{{ route('pengelola.data_siswa_baru.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $siswa->id }}">Edit Data Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body row">

                            <!-- Data Calon Siswa -->
                            <div class="form-group col-md-6"><label>Tanggal Daftar</label><input type="date" name="tanggal_daftar" class="form-control" value="{{ $siswa->tanggal_daftar }}"></div>
                            <div class="form-group col-md-6"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ $siswa->nama_lengkap }}"></div>
                            <div class="form-group col-md-6"><label>Jenis Kelamin</label><input type="text" name="jenis_kelamin" class="form-control" value="{{ $siswa->jenis_kelamin }}"></div>
                            <div class="form-group col-md-6"><label>NISN</label><input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}"></div>
                            <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ $siswa->nik }}"></div>
                            <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control" value="{{ $siswa->tempat_lahir }}"></div>
                            <div class="form-group col-md-6"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}"></div>
                            <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama" class="form-control" value="{{ $siswa->agama }}"></div>
                            <div class="form-group col-md-6"><label>Berkebutuhan Khusus</label><input type="text" name="berkebutuhan_khusus" class="form-control" value="{{ $siswa->berkebutuhan_khusus }}"></div>

                            <!-- Alamat -->
                            <div class="form-group col-md-6"><label>Dusun</label><input type="text" name="dusun" class="form-control" value="{{ $siswa->dusun }}"></div>
                            <div class="form-group col-md-6"><label>Desa</label><input type="text" name="desa" class="form-control" value="{{ $siswa->desa }}"></div>
                            <div class="form-group col-md-6"><label>Kode Pos</label><input type="text" name="kode_pos" class="form-control" value="{{ $siswa->kode_pos }}"></div>
                            <div class="form-group col-md-6"><label>Kecamatan</label><input type="text" name="kecamatan" class="form-control" value="{{ $siswa->kecamatan }}"></div>
                            <div class="form-group col-md-6"><label>Kabupaten/Kota</label><input type="text" name="kab_kota" class="form-control" value="{{ $siswa->kab_kota }}"></div>
                            <div class="form-group col-md-6"><label>Provinsi</label><input type="text" name="provinsi" class="form-control" value="{{ $siswa->provinsi }}"></div>

                            <!-- Transportasi & Jenis Tinggal -->
                            <div class="form-group col-md-6"><label>Alat Transportasi</label><input type="text" name="alat_transportasi" class="form-control" value="{{ $siswa->alat_transportasi }}"></div>
                            <div class="form-group col-md-6"><label>Jenis Tinggal</label><input type="text" name="jenis_tinggal" class="form-control" value="{{ $siswa->jenis_tinggal }}"></div>
                            <div class="form-group col-md-6"><label>No. Telp Rumah</label><input type="text" name="no_telp_rumah" class="form-control" value="{{ $siswa->no_telp_rumah }}"></div>
                            <div class="form-group col-md-6"><label>No. HP</label><input type="text" name="no_hp" class="form-control" value="{{ $siswa->no_hp }}"></div>
                            <div class="form-group col-md-6"><label>Email</label><input type="email" name="email" class="form-control" value="{{ $siswa->email }}"></div>

                            <!-- Data Periodik -->
                            <div class="form-group col-md-6"><label>Tinggi Badan</label><input type="text" name="tinggi_badan" class="form-control" value="{{ $siswa->tinggi_badan }}"></div>
                            <div class="form-group col-md-6"><label>Berat Badan</label><input type="text" name="berat_badan" class="form-control" value="{{ $siswa->berat_badan }}"></div>
                            <div class="form-group col-md-6"><label>Jarak ke Sekolah</label><input type="text" name="jarak_ke_sekolah" class="form-control" value="{{ $siswa->jarak_ke_sekolah }}"></div>
                            <div class="form-group col-md-6"><label>Waktu Tempuh</label><input type="text" name="waktu_tempuh_ke_sekolah" class="form-control" value="{{ $siswa->waktu_tempuh_ke_sekolah }}"></div>
                            <div class="form-group col-md-6"><label>Jumlah Saudara</label><input type="text" name="jumlah_saudara" class="form-control" value="{{ $siswa->jumlah_saudara }}"></div>

                            <!-- Data Ayah -->
                            <div class="form-group col-md-6"><label>NIK Ayah</label><input type="text" name="nik_ayah" class="form-control" value="{{ $siswa->nik_ayah }}"></div>
                            <div class="form-group col-md-6"><label>Nama Ayah</label><input type="text" name="nama_ayah" class="form-control" value="{{ $siswa->nama_ayah }}"></div>
                            <div class="form-group col-md-6"><label>Tahun Lahir Ayah</label><input type="text" name="tahun_lahir_ayah" class="form-control" value="{{ $siswa->tahun_lahir_ayah }}"></div>
                            <div class="form-group col-md-6"><label>Berkebutuhan Khusus Ayah</label><input type="text" name="berkebutuhan_khusus_ayah" class="form-control" value="{{ $siswa->berkebutuhan_khusus_ayah }}"></div>
                            <div class="form-group col-md-6"><label>Pekerjaan Ayah</label><input type="text" name="pekerjaan_ayah" class="form-control" value="{{ $siswa->pekerjaan_ayah }}"></div>
                            <div class="form-group col-md-6"><label>Pendidikan Ayah</label><input type="text" name="pendidikan_ayah" class="form-control" value="{{ $siswa->pendidikan_ayah }}"></div>
                            <div class="form-group col-md-6"><label>Penghasilan Ayah</label><input type="text" name="penghasilan_ayah" class="form-control" value="{{ $siswa->penghasilan_ayah }}"></div>

                            <!-- Data Ibu -->
                            <div class="form-group col-md-6"><label>NIK Ibu</label><input type="text" name="nik_ibu" class="form-control" value="{{ $siswa->nik_ibu }}"></div>
                            <div class="form-group col-md-6"><label>Nama Ibu</label><input type="text" name="nama_ibu" class="form-control" value="{{ $siswa->nama_ibu }}"></div>
                            <div class="form-group col-md-6"><label>Tahun Lahir Ibu</label><input type="text" name="tahun_lahir_ibu" class="form-control" value="{{ $siswa->tahun_lahir_ibu }}"></div>
                            <div class="form-group col-md-6"><label>Berkebutuhan Khusus Ibu</label><input type="text" name="berkebutuhan_khusus_ibu" class="form-control" value="{{ $siswa->berkebutuhan_khusus_ibu }}"></div>
                            <div class="form-group col-md-6"><label>Pekerjaan Ibu</label><input type="text" name="pekerjaan_ibu" class="form-control" value="{{ $siswa->pekerjaan_ibu }}"></div>
                            <div class="form-group col-md-6"><label>Pendidikan Ibu</label><input type="text" name="pendidikan_ibu" class="form-control" value="{{ $siswa->pendidikan_ibu }}"></div>
                            <div class="form-group col-md-6"><label>Penghasilan Ibu</label><input type="text" name="penghasilan_ibu" class="form-control" value="{{ $siswa->penghasilan_ibu }}"></div>

                            <!-- Upload Dokumen -->
                            <div class="form-group col-md-6"><label>Upload Foto KTP</label><input type="file" name="foto_ktp" class="form-control-file"></div>
                            <div class="form-group col-md-6"><label>Upload Foto KK</label><input type="file" name="foto_kk" class="form-control-file"></div>
                            <div class="form-group col-md-6"><label>Upload Foto Akte</label><input type="file" name="foto_akte" class="form-control-file"></div>

                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

                            <hr>
                            <h5 style="text-align: center; color: #007BFF; font-weight: bold; margin-top: 20px; font-size: 24px;">
                                Dokumen Pendukung
                            </h5>
                            @if($siswa->foto_ktp)
                                <p><strong>Foto KTP:</strong><br>
                                <img src="{{ asset('storage/' . $siswa->foto_ktp) }}" alt="Foto KTP" width="200"></p>
                            @endif

                            @if($siswa->foto_kk)
                                <p><strong>Foto KK:</strong><br>
                                <img src="{{ asset('storage/' . $siswa->foto_kk) }}" alt="Foto KK" width="200"></p>
                            @endif

                            @if($siswa->foto_akte)
                                <p><strong>Foto Akte:</strong><br>
                                <img src="{{ asset('storage/' . $siswa->foto_akte) }}" alt="Foto Akte" width="200"></p>
                            @endif
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.pilih-kelas').change(function () {
        const kelasId = $(this).val();
        const siswaId = $(this).data('siswa-id');

        if (kelasId) {
            $.ajax({
                url: '/siswa/' + siswaId + '/pilih-kelas',
                type: 'POST',
                data: {
                    kelas_id: kelasId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    alert(response.message); // Atau ganti dengan toast
                },
                error: function () {
                    alert('Gagal mengatur kelas.');
                }
            });
        }
    });
</script>
