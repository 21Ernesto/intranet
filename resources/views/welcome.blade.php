<x-students>
    <section class="bg-cover relative" style="background-image: url({{ asset('img/home.png') }});">
        <div class="absolute inset-0 bg-gray-300 opacity-70"></div> <!-- Capa de fondo gris claro -->
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-24 relative z-10">
            <div class="w-full">
                <h1 class="text-5xl font-semibold text-black mb-8">¡Bienvenidos a la Plataforma de Información de la
                    Carrera de Electromecánica de la ULEAM!</h1>
                <p class="text-base mb-4 text-black">
                    Nos complace darles la bienvenida a nuestra plataforma dedicada a proporcionar toda la información
                    relevante sobre la carrera de Electromecánica en la Universidad Laica Eloy Alfaro de Manabí. Aquí
                    encontrarán noticias, eventos, documentos, y materiales de curso que les serán de gran utilidad
                    durante su formación académica.
                    <br>
                    <br>
                    Nuestra carrera de Electromecánica está comprometida con la excelencia educativa y el desarrollo
                    integral de nuestros estudiantes. A través de esta plataforma, buscamos facilitar el acceso a la
                    información y recursos necesarios para apoyar su aprendizaje y crecimiento profesional.
                    <br>
                    <br>
                    Exploren las diferentes secciones y manténganse informados sobre las últimas novedades y actividades
                    relacionadas con nuestra carrera. Estamos aquí para apoyarlos en su camino hacia el éxito académico
                    y profesional.
                </p>
            </div>
        </div>
    </section>



    <section class="mt-12">
        <h1 class="text-3xl text-center text-blue-950 font-bold">Instalaciones y Laboratorios</h1>

        <div
            class="max-w-7xl mt-5 mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="h-40 w-full object-cover rounded-lg"
                        src="{{ asset('img/laboratorio.jpeg') }}" alt="">
                </figure>
                <header class="mt-3">
                    <h1 class="text-cente text-xl text-blue-950 font-bold">Laboratorio de Mecánica</h1>
                </header>
                <p class="text-sm text-blue-950">En este laboratorio, los estudiantes pueden realizar prácticas de mecánica aplicada, donde aprenden sobre el funcionamiento y mantenimiento de sistemas mecánicos. Está equipado con herramientas y maquinaria avanzada para el estudio de mecanismos, dinámica, y resistencia de materiales.                </p>
            </article>
            <article>
                <figure>
                    <img class="h-40 w-full object-cover rounded-lg" src="{{ asset('img/electronica.jpeg') }}"
                        alt="">
                </figure>
                <header class="mt-3">
                    <h1 class="text-cente text-xl text-blue-950 font-bold">Laboratorio de Electrónica</h1>
                </header>
                <p class="text-sm text-blue-950">
                    Este laboratorio está diseñado para que los estudiantes adquieran conocimientos prácticos en electrónica y electricidad. Cuenta con equipos para el análisis y diseño de circuitos eléctricos, mediciones de señales, y experimentación con componentes electrónicos.
                </p>
            </article>
            <article>
                <figure>
                    <img class="h-40 w-full object-cover rounded-lg" src="{{ asset('img/robotica.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-3">
                    <h1 class="text-cente text-xl text-blue-950 font-bold">Taller de Robótica</h1>
                </header>
                <p class="text-sm text-blue-950">
                    El taller de robótica proporciona un espacio donde los estudiantes pueden diseñar, construir y programar robots. Está equipado con kits de robótica, impresoras 3D, y plataformas de control que permiten a los estudiantes desarrollar proyectos de automatización y control.
                </p>
            </article>
            <article>
                <figure>
                    <img class="h-40 w-full object-cover rounded-lg" src="{{ asset('img/control.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-3">
                    <h1 class="text-cente text-xl text-blue-950 font-bold">Automatización y Control</h1>
                </header>
                <p class="text-sm text-blue-950">
                    La automatización y control consiste en usar tecnología para operar y regular sistemas y procesos automáticamente, mejorando eficiencia y precisión. Los estudiantes aprenden a diseñar y programar sistemas que controlan maquinaria y equipos mediante sensores y controladores.
                </p>
            </article>

        </div>

    </section>

</x-students>
