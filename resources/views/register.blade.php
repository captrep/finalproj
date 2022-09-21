@extends('auth.__style')
@section('title','Pendaftaran')
@section('content')
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <div class="login-brand">
      <img src="{{asset('img/logodampasan.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
    </div>

    <div class="card card-primary">
      <div class="card-header"><h4>Registrasi Mandiri</h4></div>
      <div class="card-body">
        <form action="{{route('regist')}}" method="POST" enctype="multipart/form-data">
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
            <input id="schoolorigin" name="schoolorigin" type="text" class="form-control @error('schoolorigin') is-invalid @enderror" value="{{old('schollorigin')}}">
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
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
              Registrasi
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection
@if (session()->has('successDaftar'))
@push('flashmessage')
    <script>
      swal("Berhasil!", "Apabila ada kesalahan input silahkan menghubungi panitia", "success");
      </script>
@endpush
@endif