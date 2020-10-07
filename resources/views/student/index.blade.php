<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加</title>
</head>
<body>
    <form action="{{url('/save')}}" method="post">
    @csrf
        <div class="form-group has-success">
                <div class="col-lg-6">
                    学生姓名：<input type="text" placeholder="" name="stu_name" onblur="check_account()"  class="form-control">
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    手机号：<input type="stu_tel" name="stu_tel">
                    
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    学生年龄：<input type="text" placeholder="" name="stu_age" onblur="check_account()"  class="form-control">
                </div>
        </div>
        <div class="form-group has-success">
                <div class="col-lg-6">
                    <input type="submit" value="添加">
                </div>
        </div>
    </form>
</body>
</html>