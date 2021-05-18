<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        @livewireStyles
        <!-- Scripts -->
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{asset('js/listeners.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = false;

            var pusher = new Pusher('379f895ccc0afd1bd95b', {
                cluster: 'mt1'
            });

            var channel = pusher.subscribe('chat-channel');
            channel.bind('chat-event', function() {
                window.livewire.emit('mensajeRecibido')
            });

            var channel2 = pusher.subscribe('users-channel');
            channel2.bind('users-event', function() {
                window.livewire.emit('usuarioConectado')
            });

            var channel3 = pusher.subscribe('disconnect-channel');
            channel3.bind('disconnect-event', function(){
                window.livewire.emit('usuarioDesconectado')
            })


            function scrollBottom () {
                var myDiv = document.getElementById("divChat");
                myDiv.scrollTop = myDiv.scrollHeight;
            }
        </script>
    </body>
</html>
