<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="all, index, follow">
    <meta name="googlebot" content="all, index, follow">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Asap:400,600,700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app" class="mx-auto" x-data="{ sidebar: true }">
      {{-- Topbar --}}
      <nav class="flex w-full items-center justify-between fixed z-20 top-0 h-16 px-4 bg-indigo-600 shadow-lg">
        <div>
          <button @click="sidebar = !sidebar" :class="{'block': sidebar, 'md:block': sidebar}" type="button" class="block text-gray-200 hover:text-white focus:text-white focus:outline-none">
            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
            </svg>
          </button>
        </div>
        <div>
          <span class="text-lg font-semibold text-gray-100 no-underline ml-4">
            {{ config('app.name') }}
            {{-- <img class="h-8" src="/img/logo-inverted.svg" alt="Workcation"> --}}
          </span>
        </div>
        {{-- User Menu --}}
        <div class="flex-1">
          <div class="text-gray-300 text-sm pr-4 float-right" x-data="{ usermenu: false }">
            <div class="flex items-center justify-between">
              <span class="font-semibold mr-2">{{ Auth::user()->name }}</span>
              <button @click="usermenu = true" class="h-8 w-8 rounded-full overflow-hidden border-2 border-gray-200 focus:outline-none focus:border-white">
                <img class="h-full w-full object-cover" src="{{ Gravatar::src(Auth::user()->email, 80) }}" alt="User Avatar">
              </button>
            </div>
            <div
              class="mt-2 py-2 w-42 bg-white rounded shadow fixed -ml-10"
              x-show="usermenu" @click.away="usermenu = false"
              x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 transform scale-90"
              x-transition:enter-end="opacity-100 transform scale-100"
              x-transition:leave="transition ease-in duration-300"
              x-transition:leave-start="opacity-100 transform scale-100"
              x-transition:leave-end="opacity-0 transform scale-90">
              <a href="javascript:;" class="block px-4 py-3 text-gray-800 hover:bg-indigo-500 hover:text-white">
                <i class="far fa-user-circle mr-2"></i> Account settings
              </a>
              <a href="{{ route('logout') }}" class="block px-4 py-3 text-gray-800 hover:bg-indigo-500 hover:text-white">
                <i class="far fa-arrow-alt-circle-right mr-2"></i> Sign out
              </a>
            </div>
          </div>
        </div>
      </nav>

      {{-- Container --}}
      <div class="flex flex-col md:flex-row mt-16">
        <div class="flex w-full min-w-full mt-4">
          {{-- Navbar --}}
          @include('partials.navbar')

          {{-- Content --}}
          <div class="w-full">
            <div class="flex items-center justify-left bg-indigo-800 h-12 w-full -mt-4 px-6">
                <i class="fas fa-fw fa-home mr-2 text-gray-300 inline-block"></i>
                <span class="font-semibold text-gray-300">
                   Home &rarr; Dashboard
                </span>
            </div>
            <div class="px-0 pt-8 md:p-8 lg:p-8">
              @include('partials.alert')
              @yield('content')
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- Load scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
