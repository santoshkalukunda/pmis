  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('lightgallery/css/lightgallery-bundle.css') }}">
  <link rel="stylesheet" href="{{ asset('nepali-datepicker/css/nepali.datepicker.v4.0.1.min.css') }}">
  <link href="{{ asset('font/Kalimati.ttf') }}" rel="stylesheet">
  <style>
      @font-face {
          font-family: 'Kalimati';
          font-display: fallback;
          src: url("{{ asset('font/Kalimati.ttf') }}") format('truetype');
      }

      @font-face {
          font-family: 'Preeti';
          font-display: fallback;
          src: url("{{ asset('font/Preeti.otf') }}") format('openType');
      }

      .font-kalimati {
          font-family: 'Kalimati';
      }

      .font-preeti {
          font-family: 'Preeti';
      }

      .text-right {
          text-align: right;
      }

      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
          text-align: right;
      }
  </style>

  @livewireStyles
  @stack('styles')
