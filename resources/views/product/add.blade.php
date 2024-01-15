<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Product</title>
</head>
<body>
	<form method="POST" action="{{url('/product/add')}}">
		@csrf
		<div>
			<label>Product Code</label>
			<input type="text" name="product_code" id="product_code">
			@error('product_code')
			<small style="color: red;">{{$message}}</small>
			@enderror
		</div>

		<div>
			<label>Product Name</label>
			<input type="text" name="product_name" id="product_name">
		</div>

		<div>
			<label>Category</label>
			<select name="category_id" id="category_id">
				@foreach($category as $cat)
				<option value="{{$cat->id}}">{{$cat->name}}</option>
				@endforeach
			</select>
		</div>

		<div>
			<label>Price</label>
			<input type="number" name="price" id="price">
		</div>

		<div>
			<label>Description</label>
			<textarea name="description" id="description"></textarea>
		</div>

		<div>
			<label>Status</label>
			<select name="status" id="status">
				<option value="1">Active</option>
				<option value="0">Not Active</option>
			</select>
		</div>
		<button type="submit">Submit</button>
	</form>
</body>
</html>