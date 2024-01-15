<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Add Transaction</title>
	<script type="text/javascript" src="{{asset('jquery-3.7.1.min.js')}}"></script>
</head>
<body>

	<form method="POST" action="{{url('/transactions/add')}}">
		@csrf
		<div id="header">
			<div>
				<label>Invoice</label>
				<input type="text" name="invoice" id="invoice">
			</div>
			<div>
				<label>Date</label>
				<input type="date" name="date" id="date">
			</div>
		</div>
		<div id="product-list">
			<button type="button" id="btn-add">Add Product</button>
			<table>
				<thead>
					<tr>
						<th>Product</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="product-list-detail">
					
				</tbody>
			</table>
		</div>
		<button type="submit">Submit</button>
	</form>

</body>

<script type="text/javascript">
	$("#btn-add").click(function(e) {
		$.ajax({
			url: "{{url('/product/get-row')}}",
			type: "GET",
			success: function(result) {
				$("#product-list-detail").append(result);
			},
			error: function(result) {
				alert(result.resultText);
			}
		});
	});

	$("#product-list-detail").on('click', '.btn-remove', function(e) {
		$(this).closest('tr').remove();
	});

	$("#product-list-detail").on('change', '.product_id', function(e) {
		var temp = $(this).find('option:selected').data('price');
		$(this).closest('td').find('input').val(temp);
		calculatePrice($(this));
	});


	$("#product-list-detail").on('change', '.qty', function(e) {
		calculatePrice($(this));
	});

	function calculatePrice(element) {
		var price = $(element).closest('tr').find('.price_product').val();
		var qty = $(element).closest('tr').find('.qty').val();

		var total = parseInt(price) * parseInt(qty);

		$(element).closest('tr').find('.price').text(total);
	}

</script>
</html>