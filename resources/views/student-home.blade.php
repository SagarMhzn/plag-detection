@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card" style="margin-bottom:10px">
                        <div class="card-body">
                            <h5 class="card-title">Subject: </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Teacher name: </h6>
                        </div>
                    </div>


                    <div class="view-show" style="display:flex; gap:1rem;">
                        <div class="assignment-class card-body card view" style="margin-bottom: 5px; flex:1">

                            <a href="{{ route('pending_assignments') }}"
                                style="text-decoration:none;  cursor:pointer ;color:green; font-size: 1.2rem; margin:auto; margin-bottom:1.5rem;">View
                                pending Assignments</a>
                        </div>
                        <div class="show assignment-class card-body card" style="margin-bottom: 5px; flex:1; ">
                            <a
                                href="{{ route('student.file') }}"style="text-decoration:none;  cursor:pointer ;color:green; font-size: 1.2rem; margin:auto; 
                                margin-bottom:1.5rem;">Show Previously Submitted Files </a>
                        </div>
                    </div>

                    <div class="assignment-history card">
                        {{-- assignment posts shown here --}}
                        @foreach ($recents as $recent)
                            <div class="card-body">
                                <h3>Recently added assignment</h3>
                                <h5 class="card-title">{{ $recent->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $recent->submission_date }}</h6>
                                <p class="card-text">{{ $recent->desc }}</p>
                            </div>
                        @endforeach
                    </div>





                </div>


            </div>
        </div>
    </div>
@endsection
