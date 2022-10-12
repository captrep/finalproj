@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Ubah Data Santri')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Ubah Santri</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Ubah Data Santri</h2>
        <p class="section-lead">Ubah data dengan benar</p>
        <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4>Data Saat Ini</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('update.santri', $student->id)}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf 
                        <div class="form-group">
                          <label>Nama Lengkap Santri</label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $student->name}}">
                          @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Asal Sekolah</label>
                          <input type="text" name="schoolorigin" class="form-control @error('schoolorigin') is-invalid @enderror" value="{{old('schoolorigin') ?? $student->schoolorigin}}">
                          @error('schoolorigin')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Tempat Lahir</label>
                          <input type="text" name="birthplace" class="form-control @error('birthplace') is-invalid @enderror" value="{{old('birthplace') ?? $student->birthplace}}">
                            @error('birthplace')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate') ?? $student->birthdate}}">
                              @error('birthdate')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address') ?? $student->address}}">
                              @error('address')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label>Kota/Kabupaten</label>
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{old('city') ?? $student->city}}">
                              @error('city')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" name="province" class="form-control @error('province') is-invalid @enderror" value="{{old('province') ?? $student->province}}">
                              @error('province')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" name="postalcode" class="form-control @error('postalcode') is-invalid @enderror" value="{{old('postalcode') ?? $student->postalcode}}">
                              @error('postalcode')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                              @enderror
                          </div>
                        <div class="form-group">
                          <label>Foto</label>
                          <div class="form-group">
                            @if ($student->photo == null)
                              <img alt="image" src="{{asset("img/avatar/avatar-1.png")}}" class="rounded-circle" width="35">
                            @else
                              <img alt="image" src="{{asset("storage/".$student->photo)}}" class="rounded-circle" width="35">
                            @endif
                          </div>
                          <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{old('photo')}}">
                          @error('photo')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                          @enderror
                        </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Ubah Data Santri</button>
                    </form>
                      </div>
                  </div>
      </div>
    </section>
  </div>
  @endsection