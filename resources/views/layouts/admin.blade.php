{{-- Takes the parameters of dashboard --}}
@props([
    'title' => config('app.name', ''),
    'breadcrumbs' => []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" contenpt="{{ csrf_token() }}">

        <title>{{ $title}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!--Sweetalert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/04e39bb3b3.js" crossorigin="anonymous"></script>

        <wireui:scripts />

        <!-- Styles -->
     Styles
    </head>
    <body class="font-sans antialiased bg-gray-50">

    @include('layouts.includes.admin.navigation')

    @include('layouts.includes.admin.sidebar')

    <div class="p-4 sm:ml-64">
<!--Añadir margen superior -->
    <div class="mt-14 flex items-center justify-between w-full">
        @include('layouts.includes.admin.breadcrumb')
        
        @isset($action)
            <div>
                {{ $action }}
            </div>
        @endisset
    </div>
    {{ $slot }}
    </div>

        @stack('modals')

        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        {{-- Show sweet alert --}}
        @if (@session('swal'))
            <script>
                Swal.fire(@json(session('swal')));
            </script>
        @endif
        
       <script>
        //Search all the elements in an specific class
        forms = document.querySelectorAll('.delete-form');
        forms.forEach(form => {
            //Pays atention to any submit action
            form.addEventListener('submit', function(e){
                //Avoid sending
                e.preventDefault();
                Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete",
  cancelButtonText: "Cancel"
}).then((result) => {
    
  if (result.isConfirmed){
    form.submit();
  }
    //Delete Log
  
});
            }) 
            
        });
       </script>
    </body>
</html>
