<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{url('/student')}}">添加</a>
    <table class="table" border="1">
	<thead>
		<tr>
			<th>id</th>
			<th>学生名称</th>
			<th>手机号</th>
			<th>学生年龄</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($StudentInfo as $k=>$v)
		<tr>
			<td>{{$v->stu_id}}</td>
			<td>{{$v->stu_name}}</td>
            <td>{{$v->stu_tel}}</td>
            <td>{{$v->stu_age}}</td>
			<td><a href="{{url('/edit/'.$v->stu_id)}}" class="btn btn-info">编辑</a>|
				<a href="{{url('/destroy/'.$v->stu_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach
	</tbody>

</table>
</body>
</html>