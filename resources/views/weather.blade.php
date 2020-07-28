<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="h-screen antialiased leading-none bg-cover bg-no-repeat" style="background-image: url(../images/background.jpg)">
  <div class="flex flex-col">
      @if(Route::has('login'))
          <div class="absolute top-0 right-0 mt-4 mr-4">
              @auth
                  <a href="{{ route('dashboard') }}" class="no-underline hover:underline text-sm font-semibold text-teal-800 uppercase">{{ __('Home') }}</a>
              @else
                  <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-semibold text-teal-800 uppercase pr-6">{{ __('Login') }}</a>
                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-semibold text-teal-800 uppercase">{{ __('Register') }}</a>
                  @endif
              @endauth
          </div>
      @endif
      <div class="container mx-auto">
      <div class="min-h-screen flex">
        <div class="w-full p-6">
            <div id="weather"></div>
        </div>
      </div>
      </div>
      
  </div>
  {{-- Load scripts --}}
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
