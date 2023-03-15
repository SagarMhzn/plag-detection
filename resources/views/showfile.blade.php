@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>File Show</h1>

        @foreach ($docs as $doc)
            <div>
                {{ $doc->student->name }}
                <a href="{{ $doc->upload_file }}" download="file">Filename : {{ $doc->file_name }}</a>
                <button class="btn btn-primary">Compare</button>
            </div>
        @endforeach
    </div>
@endsection



