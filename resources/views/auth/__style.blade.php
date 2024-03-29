<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') &mdash; CAPT</title>

  <link href="{{asset('img/logodampasan.png')}}" rel="icon">
  <link href="{{asset('img/logodampasan.png')}}" rel="apple-touch-icon">


  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('node_modules/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('node_modules/selectric/public/selectric.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/components.css')}}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          @yield('content')
            <div class="simple-footer">
              Copyright &copy; Capt. Made with 💙 by Stisla
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{asset('node_modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{asset('node_modules/selectric/public/jquery.selectric.min.js')}}"></script>
  <script src="{{asset('node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('node_modules/select2/dist/js/select2.full.min.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{asset('js/scripts.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('js/page/auth-register.js')}}"></script>
  <script src="{{asset('js/page/forms-advanced-forms.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @stack('flashmessage')
</body>

</html>
