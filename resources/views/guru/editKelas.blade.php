@extends('layouts.main')

@section('container')
    <div class="pagetitle mt-3">
        <h1>Tambah Kelas</h1>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="mt-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form class="row g-3 mt-3" method="GET" action="{{route('updateKelas', ['id' => base64_encode($id)])}}">
                        <div class="col-md-12"> <label for="guru" class="form-label">Pengajar :</label> <input type="text" class="form-control" id="guru" name="guru" value="{{ $kelas[0]->guru }}" readonly></div>
                        <div class="col-md-12"> <label for="tahun_ajaran" class="form-label">Tahun Ajaran :</label> <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="{{ $kelas[0]->tahun_ajaran }}" readonly></div>
                        {{-- <div class="col-md-12"> <label for="ruang" class="form-label">Ruang Kelas :</label> <input type="text" class="form-control" id="ruang" name="ruang" value="{{ $kelas[0]->ruang }}"></div> --}}
                        <div class="col-md-12">
                            <label for="ruang" class="form-label">Kelas :</label> 
                            <select id="ruang" class="form-select" name="ruang">
                                {{-- <option>Pilih Kelas!</option> --}}
                                
                                <!-- Grup Kelas X -->
                                <optgroup label="Kelas X">
                                    <option value="X1" {{ $kelas[0]->ruang == 'X1' ? 'selected' : '' }}>X1</option>
                                    <option value="X2" {{ $kelas[0]->ruang == 'X2' ? 'selected' : '' }}>X2</option>
                                    <option value="X3" {{ $kelas[0]->ruang == 'X3' ? 'selected' : '' }}>X3</option>
                                    <option value="X4" {{ $kelas[0]->ruang == 'X4' ? 'selected' : '' }}>X4</option>
                                    <option value="X5" {{ $kelas[0]->ruang == 'X5' ? 'selected' : '' }}>X5</option>
                                    <option value="X6" {{ $kelas[0]->ruang == 'X6' ? 'selected' : '' }}>X6</option>
                                    <option value="X7" {{ $kelas[0]->ruang == 'X7' ? 'selected' : '' }}>X7</option>
                                    <option value="X8" {{ $kelas[0]->ruang == 'X8' ? 'selected' : '' }}>X8</option>
                                    <option value="X9" {{ $kelas[0]->ruang == 'X9' ? 'selected' : '' }}>X9</option>
                                </optgroup>
                        
                                <!-- Grup Kelas XI IPA -->
                                <optgroup label="Kelas XI IPA">
                                    <option value="XI IPA 1" {{ $kelas[0]->ruang == 'XI IPA 1' ? 'selected' : '' }}>XI IPA 1</option>
                                    <option value="XI IPA 2" {{ $kelas[0]->ruang == 'XI IPA 2' ? 'selected' : '' }}>XI IPA 2</option>
                                    <option value="XI IPA 3" {{ $kelas[0]->ruang == 'XI IPA 3' ? 'selected' : '' }}>XI IPA 3</option>
                                    <option value="XI IPA 4" {{ $kelas[0]->ruang == 'XI IPA 4' ? 'selected' : '' }}>XI IPA 4</option>
                                    <option value="XI IPA 5" {{ $kelas[0]->ruang == 'XI IPA 5' ? 'selected' : '' }}>XI IPA 5</option>
                                    <option value="XI IPA 6" {{ $kelas[0]->ruang == 'XI IPA 6' ? 'selected' : '' }}>XI IPA 6</option>
                                </optgroup>
                        
                                <!-- Grup Kelas XI IPS -->
                                <optgroup label="Kelas XI IPS">
                                    <option value="XI IPS 1" {{ $kelas[0]->ruang == 'XI IPS 1' ? 'selected' : '' }}>XI IPS 1</option>
                                    <option value="XI IPS 2" {{ $kelas[0]->ruang == 'XI IPS 2' ? 'selected' : '' }}>XI IPS 2</option>
                                    <option value="XI IPS 3" {{ $kelas[0]->ruang == 'XI IPS 3' ? 'selected' : '' }}>XI IPS 3</option>
                                    <option value="XI IPS 4" {{ $kelas[0]->ruang == 'XI IPS 4' ? 'selected' : '' }}>XI IPS 4</option>
                                    <option value="XI IPS 5" {{ $kelas[0]->ruang == 'XI IPS 5' ? 'selected' : '' }}>XI IPS 5</option>
                                </optgroup>
                        
                                <!-- Grup Kelas XII IPA -->
                                <optgroup label="Kelas XII IPA">
                                    <option value="XII IPA 1" {{ $kelas[0]->ruang == 'XII IPA 1' ? 'selected' : '' }}>XII IPA 1</option>
                                    <option value="XII IPA 2" {{ $kelas[0]->ruang == 'XII IPA 2' ? 'selected' : '' }}>XII IPA 2</option>
                                    <option value="XII IPA 3" {{ $kelas[0]->ruang == 'XII IPA 3' ? 'selected' : '' }}>XII IPA 3</option>
                                    <option value="XII IPA 4" {{ $kelas[0]->ruang == 'XII IPA 4' ? 'selected' : '' }}>XII IPA 4</option>
                                    <option value="XII IPA 5" {{ $kelas[0]->ruang == 'XII IPA 5' ? 'selected' : '' }}>XII IPA 5</option>
                                    <option value="XII IPA 6" {{ $kelas[0]->ruang == 'XII IPA 6' ? 'selected' : '' }}>XII IPA 6</option>
                                </optgroup>
                        
                                <!-- Grup Kelas XII IPS -->
                                <optgroup label="Kelas XII IPS">
                                    <option value="XII IPS 1" {{ $kelas[0]->ruang == 'XII IPS 1' ? 'selected' : '' }}>XII IPS 1</option>
                                    <option value="XII IPS 2" {{ $kelas[0]->ruang == 'XII IPS 2' ? 'selected' : '' }}>XII IPS 2</option>
                                    <option value="XII IPS 3" {{ $kelas[0]->ruang == 'XII IPS 3' ? 'selected' : '' }}>XII IPS 3</option>
                                    <option value="XII IPS 4" {{ $kelas[0]->ruang == 'XII IPS 4' ? 'selected' : '' }}>XII IPS 4</option>
                                    <option value="XII IPS 5" {{ $kelas[0]->ruang == 'XII IPS 5' ? 'selected' : '' }}>XII IPS 5</option>
                                </optgroup>
                            </select>
                        </div>


                        {{-- <div class="col-md-12"> <label for="pelajaran" class="form-label">Pelajaran :</label> <input type="text" class="form-control" id="pelajaran" name="pelajaran" value="{{ $kelas[0]->pelajaran }}"></div> --}}
                        <div class="col-md-12">
                            <label for="pelajaran" class="form-label">Mata Pelajaran :</label> 
                            <select id="pelajaran" class="form-select" name="pelajaran">
                                {{-- <option>Pilih Pelajaran!</option> --}}
                                <option value="Kimia" {{ $kelas[0]->pelajaran == 'Kimia' ? 'selected' : '' }}>Kimia</option>
                                <option value="Ekonomi" {{ $kelas[0]->pelajaran == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                                <option value="Fisika" {{ $kelas[0]->pelajaran == 'Fisika' ? 'selected' : '' }}>Fisika</option>
                                <option value="Sejarah Indonesia" {{ $kelas[0]->pelajaran == 'Sejarah Indonesia' ? 'selected' : '' }}>Sejarah Indonesia</option>
                                <option value="Biologi" {{ $kelas[0]->pelajaran == 'Biologi' ? 'selected' : '' }}>Biologi</option>
                                <option value="Pendidikan Agama Islam" {{ $kelas[0]->pelajaran == 'Pendidikan Agama Islam' ? 'selected' : '' }}>Pendidikan Agama Islam</option>
                                <option value="Bahasa Inggris" {{ $kelas[0]->pelajaran == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa Inggris</option>
                                <option value="Matematika" {{ $kelas[0]->pelajaran == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                                <option value="Sejarah Peminatan" {{ $kelas[0]->pelajaran == 'Sejarah Peminatan' ? 'selected' : '' }}>Sejarah Peminatan</option>
                                <option value="Pendidikan Pancasila dan Kewarganegaraan" {{ $kelas[0]->pelajaran == 'Pendidikan Pancasila dan Kewarganegaraan' ? 'selected' : '' }}>Pendidikan Pancasila dan Kewarganegaraan</option>
                                <option value="Sosiologi" {{ $kelas[0]->pelajaran == 'Sosiologi' ? 'selected' : '' }}>Sosiologi</option>
                                <option value="Geografi" {{ $kelas[0]->pelajaran == 'Geografi' ? 'selected' : '' }}>Geografi</option>
                                <option value="Bahasa Jepang" {{ $kelas[0]->pelajaran == 'Bahasa Jepang' ? 'selected' : '' }}>Bahasa Jepang</option>
                                <option value="Bahasa Arab" {{ $kelas[0]->pelajaran == 'Bahasa Arab' ? 'selected' : '' }}>Bahasa Arab</option>
                                <option value="Prakarya dan Kewirausahaan" {{ $kelas[0]->pelajaran == 'Prakarya dan Kewirausahaan' ? 'selected' : '' }}>Prakarya dan Kewirausahaan</option>
                                <option value="Bahasa Indonesia" {{ $kelas[0]->pelajaran == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                                <option value="PJOK" {{ $kelas[0]->pelajaran == 'PJOK' ? 'selected' : '' }}>PJOK</option>
                                <option value="Sejarah" {{ $kelas[0]->pelajaran == 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
                                <option value="Seni Budaya dan Keterampilan" {{ $kelas[0]->pelajaran == 'Seni Budaya dan Keterampilan' ? 'selected' : '' }}>Seni Budaya dan Keterampilan</option>
                                <option value="PKWU" {{ $kelas[0]->pelajaran == 'Kimia' ? 'PKWU' : '' }}>PKWU</option>
                                <option value="Pendidikan Agama Kristen" {{ $kelas[0]->pelajaran == 'Pendidikan Agama Kristen' ? 'selected' : '' }}>Pendidikan Agama Kristen</option>
                                <option value="Biologi Lintas Minat" {{ $kelas[0]->pelajaran == 'Biologi Lintas Minat' ? 'selected' : '' }}>Biologi Lintas Minat</option>
                                <option value="Geografi Lintas Minat" {{ $kelas[0]->pelajaran == 'Geografi Lintas Minat' ? 'selected' : '' }}>Geografi Lintas Minat</option>
                                <option value="Matematika Peminatan" {{ $kelas[0]->pelajaran == 'Matematika Peminatan' ? 'selected' : '' }}>Matematika Peminatan</option>
                                <option value="Informatika" {{ $kelas[0]->pelajaran == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="hari" class="form-label">Hari :</label> 
                            <select id="hari" class="form-select" name="hari">
                                {{-- <option>Pilih Hari!</option> --}}
                                <option value="Senin" {{ $kelas[0]->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ $kelas[0]->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ $kelas[0]->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ $kelas[0]->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ $kelas[0]->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                <option value="Sabtu" {{ $kelas[0]->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            </select>
                        </div>                        
                        <div class="col-md-12"> <label for="waktu" class="form-label">Waktu :</label> <input type="time" class="form-control" id="waktu" name="waktu" value="{{ substr($kelas[0]->waktu, 0, 5) }}"></div>
                        <div class="text-center mb-5 mt-4"> <button type="submit" class="btn btn-primary">Submit</button></div>
                    </form>
                </div>
            </div> 
        </div>
    </section>
@endsection