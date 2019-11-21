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

<form action="{{url('brand/update/'.$find['brand_id'])}}" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <h3><a href="{{url('brand/index')}}" class="col-sm-2 control-label">返回品牌</a></h3>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$find['brand_id']}}" placeholder="请输入品牌名称" name="brand_name"><span style="color:red;">@php echo $errors->first('brand_name');@endphp</span>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
        <div class="col-sm-10">
            <input type="file" class="btn btn-default" name="brand_logo" value="{{$find['brand_logo']}}">
            <img src="{{env('UPLODE_URL')}}{{$find['brand_logo']}}" alt="" width="279">
            <span style="color:red;">@php echo $errors->first('brand_logo');@endphp</span>
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">URL网址</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$find['brand_url']}}"  placeholder="请输入网址" name="brand_url"><span style="color:red;">@php echo $errors->first('brand_url');@endphp</span>
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">描述</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" name="brand_desc">{{$find['brand_id']}}</textarea><span style="color:red;">@php echo $errors->first('brand_desc');@endphp</span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>
</form>

</body>
</html>