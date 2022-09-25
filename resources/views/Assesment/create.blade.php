@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Penilaian SPK')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Penilaian Calon Santri</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Penilaian SPK</h2>
        <p class="section-lead">Isi data dengan benar</p>
        <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4>Input Data</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('store.assesment')}}" method="post">
                            @csrf 
                            <div class="form-group">
                                <label>Nama Santri</label>
                                  <select class="form-control select2 @error('student') is-invalid @enderror" name="student">
                                    <option value="">-- Pilih Santri --</option>
                                    @foreach ($students as $student)
                                    
                                      <option value="{{$student->id}}">{{$student->name}}</option>
                                    @endforeach
                                  </select>
                                @error('student')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                 @enderror
                            </div>
                            @foreach ($criterias as $criteria)
                            <div class="form-group">
                                <label>{{$criteria->name}}</label>
                                <select class="form-control select2 @error('criteria') is-invalid @enderror" name="{{$criteria->id}}">
                                    <option value="">--Pilih {{$criteria->name}} --</option>
                                    @foreach ($criteria->parameters as $parameter)
                                        <option value="{{$parameter->id}}">{{$parameter->fuzzy}}</option>
                                    @endforeach
                                </select>
                                @error('criteria')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @endforeach

                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                    </form>
                      </div>
                  </div>
      </div>
    </section>
  </div>
@endsection
@if (session()->has('successDaftar'))
@push('flashmessage')
    <script>
      swal("Berhasil!", "Data telah ditambahkan kedalam database", "success");
      </script>
@endpush
@endif