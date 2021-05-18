{{--<!DOCTYPE html>--}}
{{--<html class=''>--}}
{{--<head>--}}
{{--    @livewireStyles--}}
{{--    <meta charset="UTF-8"/>--}}
{{--    <link href="http://fonts.cdnfonts.com/css/itim" rel="stylesheet">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0" />--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <link rel = "preconnect" href = "https://fonts.gstatic.com/%22%3E">--}}
{{--    <link href = "https://fonts.googleapis.com/css2? family = Roboto & display = swap" rel = "hoja de estilo ">--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>--}}
{{--    <style class="cp-pen-styles">--}}
{{--        @import url('http://fonts.cdnfonts.com/css/itim%27');--}}

{{--        * {--}}
{{--            margin: 0;--}}
{{--            padding: 0;--}}
{{--            box-sizing: border-box;--}}
{{--            font-family: 'Itim', sans-serif;--}}
{{--        }--}}

{{--        html, body {--}}
{{--            background: #1a164a;  /* fallback for old browsers */--}}
{{--            background: -webkit-linear-gradient(to left, #313154, #353164, #1a1547);  /* Chrome 10-25, Safari 5.1-6 */--}}
{{--            background: linear-gradient(to left, #2f2f51, #373166, #161340); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */--}}

{{--            overflow: hidden;--}}
{{--        }--}}

{{--        .container {--}}
{{--            display: -webkit-box;--}}
{{--            display: -ms-flexbox;--}}
{{--            display: flex;--}}
{{--            -webkit-box-pack: center;--}}
{{--            -ms-flex-pack: center;--}}
{{--            justify-content: center;--}}
{{--            -webkit-box-align: center;--}}
{{--            -ms-flex-align: center;--}}
{{--            align-items: center;--}}
{{--            -webkit-box-orient: vertical;--}}
{{--            -webkit-box-direction: normal;--}}
{{--            -ms-flex-direction: column;--}}
{{--            flex-direction: column;--}}
{{--            height: 78vh;--}}
{{--            width: 100vw;--}}
{{--        }--}}

{{--        .container h1 {--}}
{{--            margin: 0.5em auto;--}}
{{--            color: #FFF;--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .chatbox {--}}
{{--            background: rgba(255, 255, 255, 0.05);--}}
{{--            width: 600px;--}}
{{--            height: 75%;--}}
{{--            border-radius: 0.2em;--}}
{{--            position: relative;--}}
{{--            box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.1);--}}
{{--        }--}}

{{--        ::-webkit-input-placeholder {--}}
{{--            color: rgba(255, 255, 255, 0.9);--}}
{{--        }--}}

{{--        :-moz-placeholder {--}}
{{--            color: rgba(255, 255, 255, 0.9);--}}
{{--        }--}}

{{--        ::-moz-placeholder {--}}
{{--            color: rgba(255, 255, 255, 0.9);--}}
{{--        }--}}

{{--        :-ms-input-placeholder {--}}
{{--            color: rgba(255, 255, 255, 0.9);--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}

{{--    <div class='container'>--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <img src="{{asset('img/DaniChat.svg')}}" alt="" width="100" height="100">--}}
{{--            </div>--}}
{{--            <div class="col mt-4">--}}
{{--                <h1 class="text-center"><span class="font-bold">Chat</span>niloev</h1>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class='chatbox'>--}}
{{--            <div class="d-flex justify-content-center mt-5">--}}

{{--                @livewire('join-section')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--        @livewireScripts--}}
{{--        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
{{--        <script src="{{asset('js/listeners.js')}}"></script>--}}
{{--        <script src="{{asset('js/scripts.js')}}"></script>--}}
{{--    </body>--}}
{{--</html>--}}

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        @livewire('join-section')

    </x-jet-authentication-card>
</x-guest-layout>

