@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>File Show</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Submitted By</th>
                    <th scope="col">Assignments</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($docs as $doc)
                    <tr class="table-success">

                        @php
                            $i++;
                        @endphp
                        <td>{{ $i }}</td>
                        <td>{{ $doc->student->name }}</td>
                        <td><a href="{{ $doc->upload_file }}" download="file">Filename : {{ $doc->file_name }}</a></td>
                        <td><button class="btn btn-primary">Compare</button></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- @foreach ($docs as $doc)
            <div>
                {{ $doc->student->name }}
                <a href="{{ $doc->upload_file }}" download="file">Filename : {{ $doc->file_name }}</a>
                <button class="btn btn-primary">Compare</button>
            </div>
        @endforeach --}}
    </div>
@endsection
