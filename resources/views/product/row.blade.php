<tr>
	<td>
		<select class="product_id" name="product_id[]">
			@foreach($product as $p)
			<option value="{{$p->id}}" data-price="{{$p->price}}">{{$p->product_name}}</option>
			@endforeach
		</select>

		<input type="hidden" class="price_product" name="price[]" value="{{$product[0]->price}}">
	</td>


	<td>
		<input type="number" class="qty" name="qty[]" min="1" value="1">
	</td>
	<td class="price">
		{{$product[0]->price}}
	</td>
	<td>
		<button type="button" class="btn-remove">Remove</button>
	</td>
</tr>