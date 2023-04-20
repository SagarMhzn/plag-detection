<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Plagairism Checker') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                @auth
                    
                
                <a class="navbar-brand" href="{{ url('/checkrole') }}">
                    {{ config('app.name', 'Plagairism Checker') }}
                </a>


                
                @endauth

                @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Plagairism Checker') }}
                </a>
                @endguest

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">


                    </ul>

                @auth
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('checkrole') }}">Dashboard </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('studentlist') }}">Members</a>
                    </li>

                </ul>
                @endauth
                    


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>


<script>
    const userAction = async () => {
        const response = await fetch('http://localhost:8080/upload_training-file%27');
        const myJson = await response.json();
        console.log(myJson);



        //extract JSON from the http response
        // do something with myJson
    }
</script>
{{-- <script>
    async function handleFileSelect(evt) {
        let files = evt.target.files; // FileList object

        // use the 1st file from the list
        let f = files[0];

        let formData = new FormData();
        formData.append('file', f);

        try {
            let response = await fetch('http://localhost:8080/upload_training-file', {
                method: 'post',
                body: formData
            });
            let data = await response.json();
            // localStorage.setItem('plagairism', data.Similarity);
            console.log(data);

        } catch (error) {
            console.log(error);
        }


        // await fetch('http://localhost:8080/upload_training-file', {
        //         method: 'post',
        //         body: formData

        //     }).then(res => {
        //         //handle response
        //         console.log(res.json());
        //     })

    }

    document.getElementById('upload').addEventListener('change', handleFileSelect);
</script> --}}


<script>
    async function handleFileSelect(evt) {
        let files = evt.target.files; // FileList object

        // use the 1st file from the list
        let f = files[0];

        let formData = new FormData();
        formData.append('file', f);

        try {
            let response = await fetch('http://localhost:8080/upload_testing-file', {
                method: 'post',
                body: formData
            });
            let data = await response.json();
            localStorage.setItem('plagairism', data.Similarity);
            console.log(data);



            if(data.Similarity >20 ){
                document.querySelector('#dis_button').disabled = true;

                let str1 = "Plagiarism detected at "+data.Similarity+"%. It must be less than 20%. Please review your Document and try again!"
                document.getElementById('error_msg').innerHTML=str1.fontcolor("red")
            }
            else{
                let str2 = "Plagiarism detected at "+data.Similarity+"%. You can submit your file!"
                document.getElementById('error_msg').innerHTML=str2.fontcolor("green")
            }

        } catch (error) {
            console.log(error);
        }


        // await fetch('http://localhost:8080/upload_training-file', {
        //         method: 'post',
        //         body: formData

        //     }).then(res => {
        //         //handle response
        //         console.log(res.json());
        //     })

    }

    document.getElementById('upload').addEventListener('change', handleFileSelect);
</script>

</html>
