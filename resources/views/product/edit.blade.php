<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Product</title>
</head>
<body>
	<form method="POST" action="{{url('/product/edit')}}">
		@csrf
		<input type="hidden" name="id" id="id" value="{{$data->id}}">
		<div>
			<label>Product Code</label>
			<input type="text" name="product_code" id="product_code" value="{{$data->product_code}}">
		</div>

		<div>
			<label>Product Name</label>
			<input type="text" name="product_name" id="product_name" value="{{$data->product_name}}">
		</div>

		<div>
			<label>Category</label>
			<select name="category_id" id="category_id">
				@foreach($category as $cat)
				<option value="{{$cat->id}}" @if ($cat->id == $data->category_id) selected @endif>{{$cat->name}}</option>
				@endforeach
			</select>
		</div>

		<div>
			<label>Price</label>
			<input type="number" name="price" id="price" value="{{$data->price}}">
		</div>

		<div>
			<label>Description</label>
			<textarea name="description" id="description">
				{{$data->description}}
			</textarea>
		</div>

		<div>
			<label>Status</label>
			<select name="status" id="status">
				<option value="1" @if ($data->status == 1) selected @endif>Active</option>
				<option value="0" @if ($data->status == 0) selected @endif>Not Active</option>
			</select>
		</div>
		<button type="submit">Submit</button>
	</form>
</body>
</html>