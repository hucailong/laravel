<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>

<form action="{{url('user/store')}}" class="form-horizontal" role="form" method="post" >
    @csrf
    <div class="form-group">
        <h3><a href="{{url('user/index')}}" class="col-sm-2 control-label">查看管理员</a></h3>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">账号</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="请输入账号" name="user_account"><span style="color:red;">@php echo $errors->first('user_account');@endphp</span>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control"  placeholder="请输入密码" name="user_pwd"><span style="color:red;">@php echo $errors->first('user_pwd');@endphp</span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>

</body>
</html>