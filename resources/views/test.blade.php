<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tích hợp TinyMCE trong PHP & MySQL bằng Ajax</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
   
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<body>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Email</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
    {{Auth::user()->id}}
        <br>
    
        <br>
        
    @foreach($post5 as $p)
        @foreach($p as $p1)
            {{$p1->id_user}}
        @endforeach
    @endforeach
    </tbody>
</table>
    
</body>
</html>