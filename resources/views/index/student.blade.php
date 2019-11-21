<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
    <tr>
        <td>ID</td>
        <td>姓名</td>
        <td>年龄</td>
        <td>班级</td>
    </tr>
    @foreach($data as $v)
    <tr>
        <td>{{$v->student_id}}</td>
        <td>{{$v->student_name}}</td>
        <td>{{$v->student_age}}</td>
        <td>{{$v->student_class}}</td>
    </tr>
    @endforeach
    {{$data->links()}}
</table>
</body>
</html>