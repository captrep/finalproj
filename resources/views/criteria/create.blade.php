@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Tambah Kriteria')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Kriteria</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Tambah Data Kriteria</h2>
        <p class="section-lead">Isi data dengan benar</p>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Input Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.criteria')}}" method="post">
                            @csrf 
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Sifat Kriteria</label>
                                    <select class="form-control select2 @error('type') is-invalid @enderror" name="type">
                                    <option value="">--Pilih Sifat Kriteria--</option>
                                    <option value="Benefit">Benefit</option>
                                    <option value="Cost">Cost</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Bobot Kriteria</label>
                                <input type="text" name="weighted" class="form-control @error('weighted') is-invalid @enderror" value="{{old('weighted')}}">
                                @error('weighted')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
      </div>
    </section>
  </div>
@endsection
@if (session()->has('success'))
@push('flashmessage')
    <script>
      swal("Berhasil!", "Data telah ditambahkan kedalam database", "success");
      </script>
@endpush
@endif