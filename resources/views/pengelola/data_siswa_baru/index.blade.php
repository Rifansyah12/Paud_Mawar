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
                    <form action="{{ route('admin.calon_siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
