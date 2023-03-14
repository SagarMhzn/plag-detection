<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h1>file show</h1>
        
            @foreach($docs as $doc)
                <div>
                    <a href="{{$doc->upload_file}}" download="{{$doc->file_name}}">Filename : {{$doc->file_name}}</a>

                </div>
            @endforeach   
</body>
</html>