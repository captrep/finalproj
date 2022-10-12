@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Santri')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Data Santri</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">List Data Santri</h2>
        <p class="section-lead">
          Berikut adalah data calon santri</p>
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Data Santri</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Asal Sekolah</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th style="width:20%">Alamat</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($students as $key => $student)
                    <tr>
                      <td>{{$students->firstItem()+$key}}</td>
                      <td>{{$student->name}}</td> 
                      <td>{{$student->schoolorigin}}</td> 
                      <td>{{$student->birthplace}}</td>
                      <td>{{$student->birthdate}}</td>
                      <td>{{$student->address . " " . $student->city . " " . $student->province . " " . $student->postalcode}}</td>
                      <td>
                        @if ($student->photo == null)
                          <img alt="image" src="{{asset("img/avatar/avatar-1.png")}}" class="rounded-circle" width="35">
                        @else
                          <img alt="image" src="{{asset("storage/".$student->photo)}}" class="rounded-circle" width="35">
                        @endif
                      </td>
                      <td>
                        <a href="{{route('edit.santri',$student->id)}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i></a>
                        <a href="#" data-id="{{ $student->id }}" class="btn btn-icon icon-left btn-danger alert-confirm"><i class="fas fa-times"></i>
                          <form action="{{route('delete.santri', $student->id)}}" id="delete{{ $student->id }}" method="POST">
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
              <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    {{$students->links()}}
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection    
@if (session()->has('successUpdate'))
@push('flashmessage')
    <script>
      swal("Berhasil!", "Data telah diubah", "success");
      </script>
@endpush
@endif
@if (session()->has('successDaftar'))
@push('flashmessage')
    <script>
      swal("Berhasil!", "Data telah ditambahkan kedalam database", "success");
      </script>
@endpush
@endif
@if (session()->has('successDelete'))
@push('flashmessage')
    <script>
      swal("Berhasil!", "Data telah dihapus dari database", "success");
      </script>
@endpush
@endif

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