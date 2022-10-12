@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Tambah Kriteria')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Ubah Kriteria</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Ubah Data Kriteria</h2>
        <p class="section-lead">Isi data dengan benar</p>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Data saat ini</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.criteria', $criteria->id)}}" method="post">
                            @method('put')
                            @csrf 
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $criteria->name}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Sifat Kriteria</label>
                                    <select class="form-control select2 @error('type') is-invalid @enderror" name="type">
                                    <option value="Benefit" {{ ($criteria->type) == 'Benefit' ? 'selected' : '' }} >Benefit</option>
                                    <option value="Cost" {{ ($criteria->type) == 'Cost' ? 'selected' : '' }} >Cost</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Bobot Kriteria</label>
                                <input type="text" name="weighted" class="form-control @error('weighted') is-invalid @enderror" value="{{old('weighted') ?? $criteria->weighted}}">
                                @error('weighted')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Data fuzzy saat ini</h4>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label>Nilai Fuzzy</label>
                                <table class="table table-borderless table-sm">
                                    @foreach ($criteria->parameters as $item)
                                        <tr>
                                            <td>{{$item->fuzzy}} - {{$item->description}}</td>
                                            <td>
                                                <a href="{{route('edit.fuzzy', $item->id)}}" class="btn btn-info">Ubah</a>
                                                <a href="#" data-id="{{ $item->id }}" class="btn btn-danger alert-confirm"> Hapus
                                                    <form action="{{route('delete.fuzzy', $item->id)}}" id="delete{{ $item->id }}" method="POST">
                                                      @csrf
                                                      @method('delete')
                                                    </form>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      </div>
    </section>
  </div>
@endsection
@push('after-script')
  <script>
    $(".alert-confirm").click(function(e) {
      id = e.target.dataset.id;
  swal({
      title: 'Yakin mau di hapus?',
      text: 'Nanti datanya gak balik lagi loh',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      $(`#delete${id}`).submit();
      } else {
      swal('Oke datanya gajadi ilang!');
      }
    });
});
    </script>
@endpush
