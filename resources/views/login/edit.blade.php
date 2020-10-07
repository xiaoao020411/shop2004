<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{url('/login/update/'.$data->u_id)}}" method="post">
    @csrf
        <div class="form-group has-success">
                <div class="col-lg-6">
                    用户名：<input type="text" name="user_name" value="{{$data->user_name}}" >
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    邮箱：<input type="email" name="email" value="{{$data->email}}">
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