@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>File Show</h1>

    
        @foreach ($showfile as $show)
                @if ($show->student_id == Auth::user()->id)
                    <h4>{{Auth::user()->name}}</h4>
                    <h4>{{$show->assignment_id}}
                    {{-- <h4>{{ $show->file_name }}</h4> --}}
                    <a href="{{ $show->upload_file }}" download="{{Auth::user()->name}} + {{$show->assignment_id}}">Filename : {{ $show->file_name }}</a>
                @else
                    <h4>No files submitted</h4>
                 @endif
        @endforeach
        
    </div>
@endsection
