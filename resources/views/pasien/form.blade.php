<section id="form-pasien" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card">
                    <h2 class="h4 fw-bold mb-3 border-bottom pb-2">Formulir Data Pasien</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pasien.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="Nomor_Rekam_Medis" class="form-label">Nomor Rekam Medis</label>
                            <input type="number" class="form-control" id="Nomor_Rekam_Medis" name="Nomor_Rekam_Medis"
                                value="{{ old('Nomor_Rekam_Medis') }}" placeholder="Contoh: 100001" required>
                        </div>

                        <div class="mb-3">
                            <label for="Profil_Pasien" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" id="Profil_Pasien" name="Profil_Pasien"
                                value="{{ old('Profil_Pasien') }}" maxlength="40"
                                placeholder="Masukkan nama lengkap pasien" required>
                        </div>

                        <div class="mb-3">
                            <label for="Kontak_Darurat_Pasien" class="form-label">Kontak Darurat</label>
                            <input type="text" class="form-control" id="Kontak_Darurat_Pasien" name="Kontak_Darurat_Pasien"
                                value="{{ old('Kontak_Darurat_Pasien') }}" maxlength="12"
                                placeholder="Contoh: 081234567890" required>
                        </div>

                        <div class="mb-3">
                            <label for="Domisili_Pasien" class="form-label">Domisili Pasien</label>
                            <input type="text" class="form-control" id="Domisili_Pasien" name="Domisili_Pasien"
                                value="{{ old('Domisili_Pasien') }}" maxlength="100"
                                placeholder="Alamat atau kota domisili" required>
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100 py-2">Simpan Data Pasien</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($errors->any())
    <script>document.getElementById('form-pasien').scrollIntoView();</script>
@endif
