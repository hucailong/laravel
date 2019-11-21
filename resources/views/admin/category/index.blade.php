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
<form action="">
    <input type="text" style="width:11% ;height: 33px" value="{{$post['brand_name']??''}}" name="brand_name" placeholder="请输入品牌名称">
    <input type="text" style="width:11% ;height: 33px" value="{{$post['brand_desc']??''}}" name="brand_desc" placeholder="请输入描述">
    <button class="btn btn-default" >搜索</button>
</form>
<table class="table" >

    <thead>
    <tr>
        <th>ID</th>
        <th>品牌名称</th>
        <th>品牌LOGO</th>
        <th>URL网址</th>
        <th>描述</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>

    @foreach($res as $v)
    <tr>
        <td>{{$v->brand_id}}</td>
        <td>{{$v->brand_name}}</td>
        <td><img src="{{env('UPLODE_URL')}}{{$v->brand_logo}}" alt="" width="100"></td>
        <td>{{$v->brand_url}}</td>
        <td>{{$v->brand_desc}}</td>
        <td>
            <a class="btn btn-warning" href="{{url('brand/edit/'.$v->brand_id)}}">编辑</a>

            <a class="btn btn-success" href="{{url('brand/destroy/'.$v->brand_id)}}">删除</a>
        </td>
    </tr>
    @endforeach

    @php  @endphp

    </tbody>
</table>
{{$res->appends($post)->links()}}
</body>
</html>