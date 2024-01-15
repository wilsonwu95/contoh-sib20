<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	@error("error")
	<h3 style="color:red">{{$message}}</h3>
	@enderror

	<form method="POST" action="{{url('/login')}}">
		@csrf
		<div>
			<label>Email</label>
			<input type="email" name="email" id="email">
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password" id="password">
		</div>
		<button type="submit">Submit</button>
	</form>
</body>
</html>