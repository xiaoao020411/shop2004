<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{url('/user/update/'.$res->u_id)}}" method="post">
    @csrf
        <div class="form-group has-success">
                <div class="col-lg-6">
                    用户名：<input type="text" name="u_name" value="{{$res->u_name}}" >
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    年龄：<input type="text" name="u_age" value="{{$res->u_age}}" >
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    手机号：<input type="tel" name="u_tel" value="{{$res->u_tel}}" >
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    <input type="submit" value="修改">
                </div>
        </div>
    </form>
</body>
</html>