@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Penilaian')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Halaman Penilaian</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Blm tau mau judul apa</h2>
        <p class="section-lead">
          Pastikan nilai yang diinputkan sudah sesuai sebelum melakukan perhitungan SPK.</p>
        <div class="row">
          <div class="col-12">
            @if ($dataForUi)
            <div class="card card-primary">
              <div class="card-header">
                <h4>Data Awal</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <tr>
                      <th>Nama Siswa</th>
                      @foreach ($dataForUi[0]['criteria'] as $criteria)
                      <th class="text-center">{{$criteria}}</th>
                      @endforeach
                      <th>Action</th>
                    </tr>
                       @foreach ($dataForUi as $data)
                        <tr>
                            <td>{{$data['student']}}</td>
                            @foreach ($data['score'] as $score)
                                <td class="text-center">{{$score}}</td>
                            @endforeach
                            <td>
                              <a href="#" data-id="{{ $data['student_id'] }}" class="btn btn-icon icon-left btn-danger alert-confirm"><i class="fas fa-times"></i>
                                  <form action="{{route('delete.assesment', $data['student_id'])}}" id="delete{{ $data['student_id'] }}" method="POST">
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
            </div>
            @else
            <div class="card card-primary">
              <div class="card-header">
                <h4>Penilaian</h4>
                <div class="card-header-action">
                  <a href="{{route('create.assesment')}}" class="btn btn-primary">
                    Buat Penilaian Baru
                  </a>
                </div>
              </div>
              <div class="card-body">
                <p>Data kosong ..</p>
              </div>
            </div>
            @endif
          </div>

          {{-- <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Normalisasi</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <tr>
                      <th>Nama Siswa</th>
                      @foreach ($criterias as $criteria)
                      <th class="text-center">{{$criteria->nama}}</th>
                      @endforeach
                    </tr>
                    @foreach ($normalisasi as $dt)
                      <tr>
                        <td>{{$dt['student']}}</td>
                        @foreach ($dt['hasil'] as $item)
                          <td class="text-center">{{$item}}</td>
                        @endforeach
                      </tr>    
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Matriks V</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                      <th>Nama Siswa</th>
                      @foreach ($criterias as $criteria)
                      <th class="text-center">{{$criteria->nama}}</th>
                      @endforeach
                      <th>Total</th>
                    </tr>
                    @foreach ($matriksv as $data)
                      <tr>
                        <td>{{$data['student']}}</td>
                        @foreach ($data['hasil'] as $item)
                          <td class="text-center">{{$item}}</td>
                        @endforeach
                        <td>{{$data['total']}}</td>
                      </tr>    
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div> --}}
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