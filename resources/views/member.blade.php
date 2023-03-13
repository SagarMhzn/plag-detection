

<h1>Members list</h1>
 
<table>
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