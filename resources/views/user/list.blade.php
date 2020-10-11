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
            <th>用户名称</th>
            <th>邮箱</th>
			<th>手机号</th>
			<th>ip</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach($res as $k=>$v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
            <td>{{$v->email}}</td>
            <td>{{$v->tel}}</td>
			<td>{{$v->login_ip}}</td>
			
		</tr>
		@endforeach
		<a href="{{url('user/loginout')}}">退出</a>	</tbody>

</body>
</html>