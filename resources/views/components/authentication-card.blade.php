<div class="flex flex-col sm:justify-center items-center py-16 bg-gray-100">

    {{-- <div>
        {{ $logo }}
    </div> --}}

    <div class="sm:flex justify-around items-center w-full h-auto sm:max-w-5xl bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="sm:w-1/2 sm:block hidden">
            <img src="{{ asset('img/login.jpg') }}" class="w-full" style="height: 450px;" alt="">
        </div>
        <div class="sm:w-1/2 w-full px-6">
            <h1 class="font-bold text-3xl mb-4">Iniciar sesión</h1>
            {{ $slot }}
        </div>
    </div>

</div>
