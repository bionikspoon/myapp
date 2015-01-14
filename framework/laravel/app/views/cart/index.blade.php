<div class="cart">
	@if($cart_items)
	<?php $price = 0 ?>
	<ul>
		@foreach($cart_items as $cart_item_key => $cart_item_value)
			<?php $price += $cart_item_value['price'] ?>
			<li>
				{{$cart_item_value['name']}}
				{{$cart_item_value['price']}} (<a href="{{URL::route('cart.remove', $cart_item_key)}}">remove</a>)
			</li>
		@endforeach
	</ul>
	<p><strong>Total: </strong> {{$price}}</p>
	@endif
</div>