<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all, index, follow">
  <meta name="googlebot" content="all, index, follow">
  <meta name="description" content="Something wrong!">
  <title>@yield('title', 'Something wrong!')</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-red-800 h-screen font-sans leading-none">
  <div class="flex flex-col">
    @yield('content')
    <div class="absolute w-screen bottom-0 mb-6 text-white text-center font-sans sm:text-sm md:text-md lg:text-lg">
      <span class="opacity-50 mr-1">Take me to</span>
      <a class="border-b" href="{{ url('/') }}">home page</a>
    </div>
  </div>
</body>
</html>
