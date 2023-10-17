<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('frontend/css/mdb.min.css') }}" />
    {{-- EXZOOM --}}
    <link rel="stylesheet" href="{{ asset('extra_assets/exzoom/jquery.exzoom.css') }}">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/style.css') }}">


    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />



    @yield('style')

    @livewireStyles

    @stack('styleSheet')

    <style>
        a {
            text-decoration: none;
        }

        .microphone {
            cursor: pointer;
        }

        .microphone .recording-icon {
            display: none;
            width: 10px;
            height: 10px;
            background-color: brown;
            border-radius: 50%;
            animation: pulse 50s infinite linear;
        }

        .microphone .recording .recording-icon {
            display: none;
        }

        .microphone .recording .fa-microphone {
            display: none;
        }
    </style>

</head>

<body class="antialiased">

    <div id="app">

        <!-- Navbar -->
        @include('user.layouts.navbar')
        <!-- Navbar -->

        <main class="">
            {{-- Main --}}
            @yield('content')
            {{-- Main --}}
        </main>
    </div>

    <div>
        <!-- Footer -->
        @include('user.layouts.footer')
        <!-- Footer -->
    </div>





    <!-- script -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/jquery-3.7.0.js') }}"></script>

    <script>
        window.addEventListener('message', event => {
            alertify.set('notifier', 'position', 'top-center');
            // alertify.success(event.detail.text);
            alertify.notify(event.detail.text, event.detail.type, event.detail.status);
        });
    </script>
    {{-- Exzoom --}}
    <script src="{{ asset('/extra_assets/exzoom/jquery.exzoom.js') }}"></script>


    {{-- SCRIPT start --}}

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('frontend/js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>

    <script type="text/javascript">
        var message = document.querySelector('#message');

        var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
        var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;

        var grammar = '#JSGF V1.0;'

        var recognition = new SpeechRecognition();
        var speechRecognitionList = new SpeechGrammarList();
        speechRecognitionList.addFromString(grammar, 1);
        recognition.grammars = speechRecognitionList;
        recognition.lang = 'vi-VN';
        recognition.interimResult = false;

        recognition.onresult = function(event) {
            var lastResult = event.results.length - 1;
            var content = event.results[lastResult][0].transcript
            // console.log(content);
            document.getElementById('search-input').value = content;
            document.getElementById('search-form').submit();
        }

        recognition.onspeeched = function() {
            recognition.stop();
        }

        recognition.onerror = function() {
            console.log(event.error);
            const microphone = document.querySelector('.microphone');
            microphone.classList.remove('recording')
        }

        document.querySelector('.microphone').addEventListener('click', function() {
            recognition.start();
            const microphone = document.querySelector('.microphone');
            microphone.classList.add('recording');
        })
    </script>

    {{-- 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

    {{-- SCRIPT end --}}
    @yield('script')
    @livewireScripts
    @stack('scripts')
    <!-- script -->

</body>

</html>
