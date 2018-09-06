@extends ('ordering.layouts.master')

@section ('content')

<div class="kitch-main customer">
	<div class="orders">
		@if (count($orders))
			@foreach ($orders as $order)
				<div class="card card-orders kitch-order">
					<div class="card-body">
						<h4 class="card-title">Order: #{{ $order->id }}</h4>
						<h3 class="card-title"><i class="fa fa-user"></i> {{$order->member_id == 0 ? "Guest" : $order->member->name }}</h3>
						<h5 class="card-title text-bold">Table #1</h5>
						<h4 class="card-title">{{ $order->name }}</h4>
						<p class="card-text">Total: {{  $order->total_price }}</p>

						<ul class="list-group list-group-item-action hover">
							@foreach ($order->orderItems as $orderItem)
								<li class="list-group-item list-group-item-dark">
									<div class="text-left">{{$orderItem->product->name}}</div>
									<hr>
									<span class="float-left font-weight-bold">Quantity: </span>
									<span class="float-right"> x {{$orderItem->quantity}} </span>
								</li>
							@endforeach
							{{-- 
							<li class="list-group-item list-group-item-success">
								<div class="text-left">Criss-cross Fries</div>
								<hr class="jumbotron-hr">
								<span class="float-left font-weight-bold">Quantity: </span>
								<span class="float-right"> x 2 </span>
							</li>
							<li class="list-group-item list-group-item-dark">
								<div class="text-left">Drinks</div>
								<hr>
								<span class="float-left font-weight-bold">Quantity: </span>
								<span class="float-right"> x 30 </span>
							</li> --}}
						</ul>
					</div>

					<div class="card-footer text-muted">
						<h6 class="">Order Progress</h6>
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="3" style="width: 66%">
							2 / 3
							</div>
						</div>
						<button class="btn btn-success my-3" disabled>Fulfill</button>
					</div>
				</div>
			@endforeach

		@endif

	<div class="clearfix"></div>		
	</div>
</div>

@endsection

@section ('after-script')
	<script type="text/javascript">
	
	$('.asdas').on('click', function() {

	});

	// setInterval(function fetchOrders()
	// {
	// 	$.ajax({
	// 		url: '{{ route("ordering.orders") }}',
	// 		method: 'post',
	// 		data: { sample: 'asdas' },
	// 		success: function(e) {
	// 			var orders = JSON.parse(e);
	// 			var contents = "";

	// 			$.each(orders, function( index, value ) {
	// 				contents += '<div class="card card-orders kitch-order"><img class="card-img-top card-img-top-kitchen" src="http://127.0.0.1/tap_n_eat/public/assets/img/kitchen.jpg" alt="image"><div class="card-body"><h4 class="card-title">Order: #' + value.id + '</h4><h4 class="card-title">'+ value.name + '</h4><p class="card-text">'+ value.total_price + '</p><a href="#" onclick="#" class="btn btn-primary">See Profile</a></div></div>';
	// 			});
	// 			$('.orders').html(contents);
	// 		}
	// 	});
	// }, 1000);

	/*$('.btn').on('click',function(){
		alert ("On process");
	});*/
	</script>
@endsection