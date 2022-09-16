@extends('auth.__style')
@section('title','Registrasi')
@section('content')
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <div class="login-brand">
      <img src="{{asset('img/logodampasan.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
    </div>

    <div class="card card-primary">
      <div class="card-header"><h4>Registrasi Mandiri</h4></div>

      <div class="card-body">
        <form action="{{route('regist')}}" method="POST">
            @csrf
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input id="name" type="text" class="form-control" name="name">
            <div class="invalid-feedback">
            </div>
          </div>

          <div class="form-group">
            <label for="schoolorigin">Asal Sekolah</label>
            <input id="schoolorigin" type="text" class="form-control" name="schoolorigin">
            <div class="invalid-feedback">
            </div>
          </div>

          <div class="form-group">
            <div class="row">
                <div class="form-group col-6">
                    <label>Tempat Lahir</label>
                    <input id="birthplace" type="text" class="form-control" name="birthplace">
                </div>
                <div class="form-group col-6">
                    <label>Tanggal Lahir</label>
                    <input id="birthdate" type="text" class="form-control datepicker" name="birthdate">
                </div>
            </div>
            <div class="form-group">
                <label>Pas Foto</label>
                <input type="file" class="form-control">
              </div>
          </div>



          <div class="form-divider">
            Alamat Rumah
          </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Alamat</label>
                    <input id="address" type="text" class="form-control" placeholder="Desa blabla dusun blabla RT 01 RW 01" name="address">
                </div>
                <div class="form-group col-6">
                    <label>Kota/Kabupaten</label>
                    <input id="city" type="text" class="form-control" name="city">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Provinsi</label>
                    <input id="province" type="text" class="form-control" name="province">
                </div>
                <div class="form-group col-6">
                    <label>Kode Pos</label>
                    <input id="postalcode" type="text" class="form-control" name="postalcode">
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