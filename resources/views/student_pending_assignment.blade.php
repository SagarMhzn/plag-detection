@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" >
        @foreach ($pending_assignments as $assignment)
        <div class="assignment-history card" style="margin-bottom: 5px ; padding-bottom: 5px;">
            {{-- assignment posts shown here --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $assignment->title }}</h5>
                    <p>Due date:{{ $assignment->submission_date }}</p>
                    <p class="card-text">{{ $assignment->desc }}</p>
                </div>

                <a href="{{ route('get.fileupload', ['id'=>$assignment->id]) }}" class="btn btn-info btn-outline-success">Upload Assignment</a>
        </div>
        @endforeach

    </div>
</div>
@endsection
