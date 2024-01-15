<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
</head>
<body>



	<form method="POST" action="{{url('/register')}}">
		@csrf
		<div>
			<label>Name</label>
			<input type="text" name="name" id="name">
		</div>
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