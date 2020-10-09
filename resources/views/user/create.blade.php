<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
{{session('msg')}}
<form action="{{url('/user/save')}}" method="post">
    @csrf
        <div class="form-group has-success">
                <div class="col-lg-6">
                    用户名：<input type="text" name="name" >
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    Email：<input type="email" name="email">
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    手机号：<input type="tel" name="tel">
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    密码：<input type="password" name="pwd">
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    确认密码：<input type="password" name="pwd1">
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