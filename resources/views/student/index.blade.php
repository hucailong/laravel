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
        <td>学生姓名</td>
        <td>班级</td>
        <td>简介</td>
        <td>编辑</td>
    </tr>
    @foreach($data as $v)
    <tr>
        <td>{{$v->stu_name}}</td>
        <td>{{$v->class_name}}</td>
        <td>{{$v->stu_desc}}</td>
        <td><a href="{{url('/update/')}}/{{$v->stu_id}}">修改</a></td>
    </tr>
        @endforeach
</table>
</body>
</html>