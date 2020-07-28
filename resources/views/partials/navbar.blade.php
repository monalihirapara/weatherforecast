<!-- ASIDE -->
<div id="sidebar"
  class="w-48 md:w-64 border border-r text-sm min-h-screen h-auto bg-white shadow -mt-4 fixed md:relative"
  x-transition:enter="transition-transform transition-opacity ease-out duration-300"
  x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="opacity-0 transform -translate-x-2"
  x-transition:enter-end="opacity-100 transform translate-x-0"
  x-transition:leave="transition ease-in duration-300"
  x-transition:leave-end="opacity-0 transform -translate-x-3"
  x-show="sidebar"
>
  <!-- First Aside Menu -->
  <div class="mt-8 pl-1">
    <div>
      <a class="block py-3 px-5 text-gray-800 hover:text-indigo-600 hover:font-semibold" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-home mr-2 text-gray-600 inline-block"></i> Dashboard
      </a>
    </div>
    
   
  </div>
  <!-- Second Aside Menu -->
  
  <!-- Third Aside Menu -->
 
</div>
<!-- END ASIDE -->
