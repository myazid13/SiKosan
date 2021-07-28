@extends('layouts.backend.app')
@section('title','Tambah Kosan')
@section('content')
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create New Campaign</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form action="{{route('kamar.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body ">
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="col-form-label">Nama Kamar</label>
                            <input type="text" class="form-control @error('nama_kamar') is-invalid @enderror" name="nama_kamar" placeholder="Nama Kamar" value="{{old('nama_kamar')}}" autocomplete="off">
                            @error('nama_kamar')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Kategori</label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                                <option value="">--Kategori Kamar--</option>
                                <option value="Kost" {{old('kategori') == 'Kost' ? 'selected' : ''}} >Kost</option>
                                <option value="Apartment" {{old('kategori') == 'Apartment' ? 'selected' : ''}}>Apartment</option>
                            </select>
                            @error('kategori')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Jenis Kamar</label>
                            <select name="jenis_kamar" class="form-control @error('jenis_kamar') is-invalid @enderror">
                                <option value="">--Putra/Putri--</option>
                                <option value="Putra" {{old('jenis_kamar') == 'Putra' ? 'selected' : ''}}>Putra</option>
                                <option value="Putri" {{old('jenis_kamar') == 'Putri' ? 'selected' : ''}}>Putri</option>
                                <option value="Campur" {{old('jenis_kamar') == 'Campur' ? 'selected' : ''}}>Campur</option>
                            </select>
                            @error('jenis_kamar')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Background Foto Kamar</label>
                            <input type="file" name="bg_foto" class="form-control @error('bg_foto') is-invalid @enderror ">
                            @error('bg_foto')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="col-form-label">Status Booking</label>
                            <select name="book" class="form-control @error('book') is-invalid @enderror">
                                <option value="">-- Aktif/Non-aktif --</option>
                                <option value="1" {{old('book') == '1' ? 'selected' : ''}}>Aktif</option>
                                <option value="0" {{old('book') == '0' ? 'selected' : ''}}>Tidak</option>
                            </select>
                            @error('book')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Luas Kamar</label>
                            <input type="text" name="luas_kamar" class="form-control @error('luas_kamar') is-invalid @enderror" value="{{old('luas_kamar')}}" placeholder="Contoh 3 x 4">
                            @error('luas_kamar')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label class=" col-form-label">Stok Kamar</label>
                            <input type="number" name="stok_kamar" class="form-control @error('stok_kamar') is-invalid @enderror"  value="{{old('stok_kamar')}}" placeholder="Kamar Tersedia">
                            @error('stok_kamar')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Harga Kamar</label>
                            <input type="number" name="harga_kamar" class="form-control @error('harga_kamar') is-invalid @enderror" value="{{old('harga_kamar')}}" placeholder="Harga Kamar">
                            @error('harga_kamar')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label class="col-form-label">Biaya Listrik</label>
                        <select name="listrik" class="form-control @error('listrik') is-invalid @enderror">
                            <option value="">-- Listrik Kamar --</option>
                            <option value="1" {{old('listrik') == '1' ? 'selected' : ''}}>Termasuk Listrik</option>
                            <option value="0" {{old('listrik') == '0' ? 'selected' : ''}}>Tidak Termasuk Listrik</option>
                        </select>
                        @error('listrik')
                          <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                          </div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="col-form-label">Provinsi</label>
                        <select name="provinsi_id" class="form-control kode @error('provinsi_id') is-invalid @enderror" id="select2">
                          <option value="">-- Pilih Provinsi --</option>
                            @foreach ($provinsi as $item)
                                <option value="{{$item->kode}}" {{old('provinsi_id') == $item->kode ? 'selected' : ''}} >{{$item->nama}}</option>
                            @endforeach
                        </select>
                        @error('provinsi_id')
                          <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                          </div>
                        @enderror
                    </div>
                    <span id="select-provinsi"></span>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="col-form-label">Keterangan Lain</label>
                            <textarea name="ket_lain" class="form-control @error('ket_lain') is-invalid @enderror" rows="4" placeholder="Opsional"> {{old('ket_lain')}} </textarea>
                            @error('ket_lain')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label class=" col-form-label">Keterangan Biaya</label>
                            <textarea name="ket_biaya" class="form-control @error('ket_biaya') is-invalid @enderror" rows="4" placeholder="Opsional"> {{old('ket_biaya')}} </textarea>
                            @error('ket_biaya')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">Deskripsi</label>
                            <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" rows="4" placeholder="Opsional"> {{old('desc')}} </textarea>
                            @error('desc')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Start Fasilitas Kamar --}}
                <span id="fkamar">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-xl-5 col-10">
                            <label class="col-form-label">Fasilitas Kamar</label>
                            <input type="text" name="addmore[0][name]" class="form-control @error('addmore[0][name]') is-invalid @enderror" placeholder="Fasilitas Kamar">
                            @error('addmore[0][name]')
                              <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>
                        <div class="col-2 col-lg-1 col-xl-1">
                            <label class="col-form-label">.</label>
                            <input type="button" id="addfkamar" name="addfkamar" class="form-control btn btn-success btn-sm" value="+">
                        </div>
                        </div>
                    </div>
                </span>
                {{-- End Fasilitas Kamar --}}

                {{-- Start Fasilitas Kamar Mandi --}}
                    <span id="fkm">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-5 col-xl-5 col-10">
                                    <label class="col-form-label">Fasilitas Kamar Mandi</label>
                                    <input type="text" name="addkm[0][name]" class="form-control @error('addkm[0][name]') is-invalid @enderror"  placeholder="Fasilitas Kamar Mandi">
                                    @error('addkm[0][name]')
                                      <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                      </div>
                                    @enderror
                                </div>
                                <div class="col-2 col-lg-1 col-xl-1">
                                    <label class="col-form-label">.</label>
                                    <input type="button" id="addkm" name="addkm" class="form-control btn btn-success btn-sm" value="+">
                                </div>
                            </div>
                        </div>
                    </span>
                {{-- End Fasilitas Kamar Mandi --}}

                {{-- Start Fasilitas Bersama --}}
                    <span id="fbersama">
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-lg-5 col-xl-5 col-10">
                                    <label class="col-form-label">Fasilitas Bersama</label>
                                    <input type="text" class="form-control @error('addbersama[0][name]') is-invalid @enderror" name="addbersama[0][name]" placeholder="Fasilitas Bersama">
                                    @error('addbersama[0][name]')
                                      <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                      </div>
                                    @enderror
                                </div>
                                <div class="col-2 col-lg-1 col-xl-1">
                                    <label class="col-form-label">.</label>
                                    <input type="button" id="addbersama" name="addbersama" class="form-control btn btn-success btn-sm" value="+">
                                </div>
                            </div>
                        </div>
                    </span>
                {{-- End Fasilitas Bersama --}}

                {{-- Start Fasilitas Parkir --}}
                <span id="fparkir">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-lg-5 col-xl-5 col-10">
                                <label class="col-form-label">Fasilitas Parkir</label>
                                <input type="text" class="form-control @error('addparkir[0][name]') is-invalid @enderror" name="addparkir[0][name]" placeholder="Fasilitas Parkir">
                                @error('addparkir[0][name]')
                                  <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                  </div>
                                @enderror
                            </div>
                            <div class="col-2 col-lg-1 col-xl-1">
                                <label class="col-form-label">.</label>
                                <input type="button" id="addparkir" name="addparkir" class="form-control btn btn-success btn-sm" value="+">
                            </div>
                        </div>
                    </div>
                </span>
                {{-- End Fasilitas Parkir --}}

                {{-- Start Area --}}
                <span id="farea">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-lg-5 col-xl-5 col-10">
                                <label class="col-form-label">Area Lingkungan</label>
                                <input type="text" class="form-control @error('addarea[0][name]') is-invalid @enderror" name="addarea[0][name]" placeholder="Area Lingkungan">
                                @error('addarea[0][name]')
                                  <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                  </div>
                                @enderror
                            </div>
                            <div class="col-2 col-lg-1 col-xl-1">
                                <label class="col-form-label">.</label>
                                <input type="button" id="addarea" name="addarea" class="form-control btn btn-success btn-sm" value="+">
                            </div>
                        </div>
                    </div>
                </span>
                {{-- End Area --}}

                {{-- Start Image --}}
                <span id="image">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-lg-5 col-xl-5 col-10">
                                <label class="col-form-label">Foto Kamar</label>
                                <input type="file" class="form-control @error('addfoto[0][name]') is-invalid @enderror" name="addfoto[0][foto_kamar]">
                                @error('addfoto[0][name]')
                                  <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                  </div>
                                @enderror
                            </div>
                            <div class="col-2 col-lg-1 col-xl-1">
                                <label class="col-form-label">.</label>
                                <input type="button" id="addfoto" name="addfoto" class="form-control btn btn-success btn-sm" value="+">
                            </div>
                        </div>
                    </div>
                </span>
                {{-- End Image --}}

                <div class="form-group row ">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Kosan</button>
                        <a href="{{route('kamar.index')}}" class="btn btn-warning">Batal</a>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
  <script src="{{asset('ctrl/kamar/create.js')}}"></script>
@endsection