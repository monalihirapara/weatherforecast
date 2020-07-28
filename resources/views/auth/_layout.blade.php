<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="all, index, follow">
    <meta name="googlebot" content="all, index, follow">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-indigo-600 h-screen font-sans leading-none">
  <div id="app" class="flex flex-col">
    @yield('content')
    <div class="absolute w-screen bottom-0 mb-6 text-white text-center font-sans text-xs md:text-md">
      <span class="opacity-60">Copyright &copy; {{ date('Y') }} -</span>
      <a class="opacity-80 hover:text-indigo-300" href="{{ url('/') }}">
        {{ config('app.name') }}
      </a>
    </div>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
