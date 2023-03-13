@extends('layouts.app')

@section('content')
<h1>Members list</h1>
 
<table border="2">
    <tr>
        <td>Id</td>
        <td>Name</td>
    </tr>
    @foreach($studentlists as $key => $studentlist)
    <tr>
        
            <td>{{$key+1}}</td>
            <td>{{$studentlist['name']}}</td>
       
    </tr>
    @endforeach
    
</table>
@endsection