@extends('_layout')

@section('content')
<div class="flex items-center">
  <div class="w-full px-6 md:px-0 mx-auto">
    <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
      <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0 rounded-t">
        Dashboard
      </div>
      <div class="w-full p-6">
        <div id="weather"></div>
      </div>
    </div>
  </div>
</div>
@endsection
