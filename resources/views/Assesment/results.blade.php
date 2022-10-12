@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Penilaian SPK')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Hasil Penilaian</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Penilaian SPK</h2>
        <div class="row">
          @if ($results == null)
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h4>List Penilaian</h4>
                </div>
                <div class="card-body">
                  <div class="list-group">
                    @foreach ($names as $name)
                    <a href="{{route('show.results', $name->name)}}" class="list-group-item list-group-item-action">{{$name->name}}</a>                  
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          @else
          <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h4>Pilih Penilaian</h4>
                </div>
                <div class="card-body">
                  <div class="list-group">
                    @foreach ($names as $name)
                    <a href="{{route('show.results', $name->name)}}" class="list-group-item list-group-item-action {{last(request()->segments()) == $name->name ? 'active' : ''}}">{{$name->name}}</a>                  
                    @endforeach
                  </div>
                </div>
              </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Hasil Penilaian Untuk {{$results[0]->name}}</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tr>
                      <th scope="col">Rank</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Nilai</th>
                    </tr>
                    @foreach ($results as $key => $result)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$result->student->name}}</td>
                        <td>{{$result->result}}</td>
                      </tr>   
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
          @endif
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
@if (session()->has('success'))
@push('flashmessage')
    <script>
      swal("Berhasil!", "Data Penilain Tersimpan", "success");
      </script>
@endpush
@endif