<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product</title>
</head>
<body>
	<a href="{{ url('/logout') }}">Logout</a>
	
	<form method="GET" action="{{url('/product')}}">
		<div>
			<label>Search</label>
			<input type="text" name="search" id="search">
		</div>
		<button type="submit">Submit</button>
	</form>

	<a href="{{url('/product/add')}}">Tambah Data</a>
	<table border="1">
		<thead>
			<th>Code</th>
			<th>Name</th>
			<th>Category</th>
			<th>Price</th>
			<th>Desc.</th>
			<th>Status</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($data as $dt)
			<tr>
				<td>{{ $dt->product_code }}</td>
				<td>{{ $dt->product_name }}</td>
				<td>{{ $dt->Category->name }}</td>
				<td>{{ $dt->price }}</td>
				<td>{{ $dt->description }}</td>
				<td>
					@if ($dt->status == 1)
					Aktif
					@else
					Tidak Aktif
					@endif
				</td>
				<td>
					<a href="{{url('/product/edit') . '/' . $dt->id}}">Edit</a>
					<a href="{{url('/product/delete') . '/' . $dt->id}}">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{$data->links()}}
</body>
</html>