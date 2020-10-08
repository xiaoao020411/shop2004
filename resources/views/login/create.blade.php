<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{url('/login/save')}}" method="post">
    @csrf
        <div class="form-group has-success">
                <div class="col-lg-6">
                    用户名：<input type="text" name="user_name" >
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    邮箱：<input type="email" name="email">
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    密码：<input type="password" name="password">
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    <input type="submit" value="注册">
                </div>
        </div>
    </form>
</body>
</html>