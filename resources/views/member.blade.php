@extends('layouts.app')

@section('content')
    <h1>Members list</h1>

    {{-- <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($teacherlists as $key => $teacherlist)
                <tr class="table-success">

                    <td>{{ $key + 1 }}</td>
                    <td>{{ $teacherlist['name'] }}</td>

                </tr>
            @endforeach
        </tbody>
    </table> --}}

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($studentlists as $key => $studentlist)
        <tr>

            <td>{{ $key + 1 }}</td>
            <td>{{ $studentlist['name'] }}</td>

        </tr>
    @endforeach
        </tbody>
    </table>


    {{-- <table border="2">
        <tr>
            <td>Id</td>
            <td>Name</td>
        </tr>
        @foreach ($studentlists as $key => $studentlist)
            <tr>

                <td>{{ $key + 1 }}</td>
                <td>{{ $studentlist['name'] }}</td>

            </tr>
        @endforeach

    </table> --}}
@endsection
