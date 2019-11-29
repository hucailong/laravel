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
<form action="{{url('student_do')}}/{{$res->stu_id}}" method="post">
    @csrf
    <table>
        <tr>
            <td>学生姓名</td>
            <td><input type="text" name="stu_name" value="{{$res->stu_name}}"></td>
        </tr>
        <tr>
            <td>新闻班级</td>
            <td>
                <select name="class_id" id="">
                    @foreach($data as $v)
                    <option value="{{$v->class_id}}">{{$v->class_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>学生简历</td>
            <td><textarea name="stu_desc" id="" cols="30" rows="10">{{$res->stu_name}}</textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="修改"></td>
            <td></td>
        </tr>
    </table>
</form>
</body>
</html>