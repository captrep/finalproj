@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Kriteria')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Kriteria</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">List Data Kriteria</h2>
        <p class="section-lead">
          This page is just an example for you to create your own page.</p>
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Simple Table</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <tr>
                      <th>#</th>
                      <th>Nama Kriteria</th>
                      <th>Sifat Kriteria</th>
                      <th>Nilai Fuzzy</th>
                      <th>Keterangan</th>
                      <th>Bobot</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($criterias as $key => $criteria)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$criteria['name']}}</td> 
                      <td>{{$criteria['type']}}</td> 
                      <td>
                        @foreach ($criteria['fuzzy'] as $fuzzy)
                        @if ($fuzzy == 50)
                        {{$fuzzy}} = Sangat Baik<br>
                        @elseif ($fuzzy == 40)
                        {{$fuzzy}} = Cukup Baik<br>
                        @elseif ($fuzzy == 30)
                        {{$fuzzy}} = Baik<br>
                        @elseif ($fuzzy == 20)
                        {{$fuzzy}} = Cukup<br>
                        @elseif ($fuzzy == 10)
                        {{$fuzzy}} = Buruk<br>
                        @endif
                        @endforeach
                      </td>
                      <td>
                        @foreach ($criteria['description'] as $description)
                            {{$description}}<br>
                        @endforeach
                      </td>
                      <td>{{$criteria['weighted']}}</td>
                      <td>
                        <a href="{{route('edit.criteria', $criteria['id'])}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i></a>
                        <a href="#" data-id="{{ $criteria['id'] }}" class="btn btn-icon icon-left btn-danger alert-confirm"><i class="fas fa-times"></i>
                            <form action="{{route('delete.criteria', $criteria['id'])}}" id="delete{{ $criteria['id'] }}" method="POST">
                              @method('delete')
                              @csrf
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
                    {{-- {{$criterias->links()}} --}}
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