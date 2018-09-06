@extends ('ordering.layouts.master')

@section ('content')

<div class="kitch-main product">
	<div class="orders">
		@if (count($products))
			@foreach ($products as $product)
				<div class="card card-orders">
					<img class="card-img-top pic-height" src="{{ asset('assets/img/login-bg.jpg') }}" alt="image">
					<div class="card-body">
						<strong> <h2 class="card-title">{{$product->name}}</h2></strong>
						<h4 class="card-title">{{ strlen($product->description) > 15 ? substr($product->description, 0, 15).'...' : $product->description }}</h4>
						<p class="card-text">&#8369; {{$product->price}}</p>
						
						<a href="#" data-product-id="{{ $product->id}}" data-product-name="{{ $product->name}}" data-product-price="{{ $product->price}}" class="btn btn-primary btn-shape btnclick" ><i class="fa fa-cart-plus iconsize"></i></a>
					</div>
				</div>			
			@endforeach
		@endif
	</div>
</div>

@endsection

@section ('menu')
	@include('ordering.layouts.menu')
@endsection

@section ('cart')
	@include('ordering.layouts.cart')
@endsection

@section ('after-script')
	<script type="text/javascript">
	var cart = [];
	var product_id='', product_name = '',product_price='';
	$('.btnclick').on('click',function(){		
		let cartObject = {productid : $(this).attr('data-product-id'), product_name: $(this).attr('data-product-name'), quantity: 1, price: $(this).attr('data-product-price') ,total: 0};

		//cartObject.total_price = cartObject.quantity *
		var found = false;
		for (var i = cart.length - 1; i >= 0; i--) {
			if (cart[i].productid == cartObject.productid) {
				cart[i].quantity++;
				found = true;
			}
		}


		var total = 0;
		var totalPrice=0;

		for (var i = 0; i < cart.length; i++) {			
			totalPrice += parseInt(cart[i].price);		
		}				
		console.log(totalPrice);

		if (!found)
		{
			cart.push(cartObject);
			displayCart();
			$('#myModal').modal('toggle');
		}

		pillValue();		
	});
	

	$('.float').on('click', function() {
		if(cart.length == 0 )
		{
			swal ({
				title: 'Order Information',
				text: 'You have no order yet',				
				confirmButtonText : '<i class="fa fa-check"> </i> &nbsp; OK',				
				type: 'info'
			});
		}
		else
		{
			displayCart();
			$('#myModal').modal('toggle');
		}
	});	

	$('.place-order').on('click',function(){
		
		swal ({
			title: 'Confirmation',
			text: 'Do you want to place your order ?',
			showCancelButton:true,
			cancelButtonClass: 'bg-danger',
			confirmButtonText : '<i class="fa fa-check ok-order"> </i> &nbsp; OK',
			cancelButtonText : '<i class="fa fa-times"> </i> &nbsp; Cancel',
			type: 'question'
		}).then((result) => {
			if(result.value)
			{
				$.ajax({
					url: '{{ route("ordering.orderProduct") }}',
					method: 'post',
					data: { product_id: product_id, name:product_name,total_price: product_price},
					success: function(e) {
						console.log(e);
					}
				});
				cart=[];
				clearPill();

				swal({					
					text: 'Your order has successfully placed ',					
					confirmButtonText : '<i class="fa fa-check ok-order"> </i> &nbsp; OK',					
					type: 'info'
				});
			}
			else
			{}			
		});
	});


	//quantity event
	$('.items').on('click', '.up1',function(){	
	
		for (var i = cart.length - 1; i >= 0; i--) {
				if (cart[i].productid == $(this).attr('data-id'))
				{
					cart[i].quantity++;					
					break;
				}
			}
		displayCart();
		pillValue();
	});	

	$('.items').on('click', '.down1',function(){
		var selectedItem = 0;	
		for (var i = cart.length - 1; i >= 0; i--) {
				if (cart[i].productid == $(this).attr('data-id'))
				{
					cart[i].quantity--;
					selectedItem = i;
					break;
				}
			}
		if (cart[selectedItem].quantity == 0)
		{
			cart.splice(selectedItem, 1);			
		}

		displayCart();		
		pillValue();		
	});

	$('.items').on('click', '.trashOrder1',function(){
		var subtract; 		
		for (var i = cart.length - 1; i >= 0; i--) 
		{
			if (cart[i].productid == $(this).attr('data-id'))
			{						
				cart.splice(i, 1);				
				break;
			}			
		}
		pillValue();
		displayCart();
	});

	function displayCart()
	{
		
			console.log(cart);
			$('.items').html("");
			var htmlItems = "";
			for (var x = cart.length - 1; x >= 0; x--) {
			 	htmlItems += '<tr style="border-bottom: 1px solid rgba(0,0,0, 0.1)"><td class="product-name text-left">' + cart[x].product_name + '</td><td class="text-right">' + cart[x].price*cart[x].quantity + '</td><td><label class="label labelValue1" id="labelValue1">' + cart[x].quantity + '</label>&nbsp;&nbsp;<a href="#" class="text-primary up1" data-id="' + cart[x].productid + '"><i class="fa fa-plus"></i></a>&nbsp;&nbsp;<a href="#" class="text-danger down1" data-id="'+cart[x].productid+'"><i class="fa fa-minus"></i></a></td></tr>';
		 	} 		
		
		 $('.items').html(htmlItems);
	}	
	
	function pillValue ()
	{
		var pill = 0;
		for(var i = 0; i < cart.length; i++)
		{
			pill += parseInt(cart[i].quantity);
		}		

		if(pill == 0)
		{
			pill ="";
			$('#myModal').modal('toggle');
		}
		$('.pill-value').text(pill);


	}

	function clearPill()
	{
		$('.pill-value').text("");
	}
	</script>
@endsection
