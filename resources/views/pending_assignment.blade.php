@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($pending_assignments as $assignment)
        <div class="assignment-history card">
            {{-- assignment posts shown here --}}
            <div class="card-body">
                <h5 class="card-title">{{ $assignment->title }}</h5>
                <p>Due date:{{ $assignment->submission_date }}</p>
                <p class="card-text">{{ $assignment->desc }}</p>
            </div>
            <a href="{{ route('show.file', ['id'=>$assignment->id]) }}" class="btn btn-success">Show Assignments</a>
        </div>
        @endforeach

    </div>
</div>
@endsection
