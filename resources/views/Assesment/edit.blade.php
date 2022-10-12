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
                        <h4>Ubah penilaian santri {{$assesment[0]->student->name}}</h4>
                      </div>
                      <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                          Data tidak boleh kosong!
                        </div>
                        @endif
                        <form action="{{route('update.assesment', $assesment[0]->student_id)}}" method="post">
                          @method('put')
                            @csrf 
                            @foreach ($criterias as $key => $criteria)
                            <div class="form-group">
                                <label>{{$criteria->name}}</label>
                                <select class="form-control select2 @error('harga') is-invalid @enderror" name="{{$criteria->id}}">
                                    <option value="">--Pilih {{$criteria->name}} --</option>
                                    @foreach ($criteria->parameters as $parameter)
                                        <option value="{{$parameter->id}}" {{ ($parameter->id) == $assesment[$key]->parameter_id ? 'selected' : '' }}>{{$parameter->description}}</option>
                                    @endforeach
                                </select>
                                @error('harga')
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