@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Tambah Nilai Fuzzy')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Tambah Fuzzy Kriteria</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Tambah Nilai Fuzzy</h2>
        <p class="section-lead">Isi data dengan benar</p>
        <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4>Input Data</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('store.fuzzy')}}" method="post">
                            @csrf 
                        <div class="form-group">
                          <label>Untuk Kriteria :</label>
                          <select class="form-control select2 @error('criteria') is-invalid @enderror" name="criteria">
                            <option value="">--Pilih Kriteria--</option>
                              @foreach($criterias as $criteria)
                              <option value="{{$criteria->id}}">{{$criteria->name}}</option>
                              @endforeach
                          </select>
                            @error('criteria')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label>Nilai Fuzzy</label>
                          <input type="number" name="fuzzy" class="form-control @error('fuzzy') is-invalid @enderror" value="{{old('fuzzy')}}" step=".01">
                          @error('fuzzy')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">
                          @error('description')
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