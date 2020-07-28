@if (session('status'))
  <div class="text-sm border border-t-8 rounded text-blue-600 border-blue-500 bg-blue-100 px-3 py-4 mb-5" role="alert">
    {{ session('status') }}
  </div>
@endif

@if (session('info'))
  <div class="text-sm border border-t-8 rounded text-blue-600 border-blue-500 bg-blue-100 px-3 py-4 mb-5" role="alert">
    {{ session('info') }}
  </div>
@endif

@if (session('success'))
  <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-5" role="alert">
    {{ session('success') }}
  </div>
@endif

@if (session('warning'))
  <div class="text-sm border border-t-8 rounded text-yellow-700 border-yellow-600 bg-yellow-100 px-3 py-4 mb-5" role="alert">
    {{ session('warning') }}
  </div>
@endif

@if (session('error'))
  <div class="text-sm border border-t-8 rounded text-red-700 border-red-600 bg-yellow-100 px-3 py-4 mb-5" role="alert">
    {{ session('error') }}
  </div>
@endif
