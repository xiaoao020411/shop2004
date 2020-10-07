<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table" border="1">
	<thead>
		<tr>
			<th>id</th>
			<th>用户名</th>
			<th>邮箱</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr>
			<td>{{$v->u_id}}</td>
			<td>{{$v->user_name}}</td>
            <td>{{$v->email}}</td>
			<td><a href="{{url('/login/edit/'.$v->u_id)}}" class="btn btn-info">编辑</a>|
				<a href="{{url('/login/destroy/'.$v->u_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</body>
</html>