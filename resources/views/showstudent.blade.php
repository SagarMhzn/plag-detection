@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Showing Submitted Assignments by {{ Auth::user()->name }}:</h1>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Submitted By</th>
                    <th scope="col">Assignments</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($showfile as $show)
                    <tr class="table-success">

                        @php
                            $i++;
                        @endphp
                        <td>{{ $i }}</td>

                        @if ($show->student_id == Auth::user()->id)
                            <td>{{ Auth::user()->name }}</td>
                            {{-- <h4>{{ $show->assignment->title }} --}}
                            {{-- <h4>{{ $show->file_name }}</h4> --}}
                            <td>{{ $show->assignment->title }}</td>
                            <td><button class="btn btn-outline-primary">
                                <a href="{{ $show->upload_file }}"download="{{ Auth::user()->name . $show->assignment->title }}"
                                    style="text-decoration:none;">Download</a>
                                </button></td>
                        @else
                            <h4>No files submitted</h4>
                        @endif



                    </tr>
                @endforeach
            </tbody>
        </table>


        {{--  
        @foreach ($showfile as $show)
            @if ($show->student_id == Auth::user()->id)
                <h4>{{ Auth::user()->name }}</h4>
                {{-- <h4>{{ $show->assignment->title }} --}}
        {{-- <h4>{{ $show->file_name }}</h4> --}}
        {{-- <a href="{{ $show->upload_file }}"
                        download="{{ Auth::user()->name.$show->assignment->title }}">Filename :
                        {{ Auth::user()->name.$show->assignment->title }}</a>
                @else
                    <h4>No files submitted</h4>
            @endif
        @endforeach --}}

    </div>
@endsection
