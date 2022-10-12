@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.header')
@extends('layouts.sidebar')
@section('title','Dashboard')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero text-white hero-bg-image" data-background="{{asset('img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg')}}">
            <div class="hero-inner">
              <h2>Selamat Datang, {{Auth::user()->name}}</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer cursus porta odio venenatis laoreet. Sed sollicitudin dapibus rutrum. Suspendisse condimentum semper nisi, sed luctus felis ullamcorper in. Aliquam mattis metus nisl, sit amet mattis mauris finibus eget.</p>
              {{-- <div class="mt-4">
                <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
              </div> --}}
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
  @endsection