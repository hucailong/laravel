<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<caption><h3><a href="{{url('brand/create')}}">返回添加</a></h3></caption>
<table class="table table-hover" >
    <thead>
    <tr>
        <th>ID</th>
        <th>账号</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>

    @foreach($res as $v)
    <tr>
        <td>{{$v->user_id}}</td>
        <td>{{$v->user_account}}</td>
        <td>
            <a class="btn btn-warning" href="{{url('user/edit/'.$v->user_id)}}">编辑</a>

            <a class="btn btn-success" href="{{url('user/destroy/'.$v->user_id)}}">删除</a>
        </td>
    </tr>
    @endforeach


    </tbody>
</table>
</body>
</html>