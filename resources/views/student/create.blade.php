@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Tambah Santri')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Tambah Santri</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Tambah Data Santri</h2>
        <p class="section-lead">Isi data dengan benar</p>
        <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4>Input Data</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('regist')}}" method="post" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                              </div>
                    
                              <div class="form-group">
                                <label for="schoolorigin">Asal Sekolah</label>
                                <input id="schoolorigin" name="schoolorigin" type="text" class="form-control @error('schoolorigin') is-invalid @enderror" value="{{old('schoolorigin')}}">
                                @error('schoolorigin')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                              </div>
                    
                              <div class="form-group">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Tempat Lahir</label>
                                        <input id="birthplace" name="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" value="{{old('birthplace')}}">
                                        @error('birthplace')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Tanggal Lahir</label>
                                        <input id="birthdate" name="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate')}}">
                                        @error('birthdate')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pas Foto</label>
                                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{old('photo')}}">
                                    @error('photo')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                    @enderror
                                  </div>
                    
                              </div>
                    
                              <div class="form-divider">
                                Alamat Rumah
                              </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Alamat</label>
                                        <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" placeholder="Jl xzxxxx">
                                        @error('address')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Kota/Kabupaten</label>
                                        <input id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror" value="{{old('city')}}">
                                        @error('city')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Provinsi</label>
                                        <input id="province" name="province" type="text" class="form-control @error('province') is-invalid @enderror" value="{{old('province')}}">
                                        @error('province')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Kode Pos</label>
                                        <input id="postalcode" name="postalcode" type="text" class="form-control @error('postalcode') is-invalid @enderror" value="{{old('postalcode')}}">
                                        @error('postalcode')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                    </form>
                      </div>
                  </div>
      </div>
    </section>
  </div>
@endsection
