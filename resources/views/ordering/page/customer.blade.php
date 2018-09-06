@extends ('ordering.layouts.master')

@section ('content')

<div class="kitch-main">
	<div class="orders">
		@if (count($customerOrders))
			@foreach ($customerOrders as $customerOrder)
				<div>
					<div class="card card-orders">
						<img class="card-img-top pic-height" src="{{ asset('assets/img/login-bg.jpg') }}" alt="image">
						<div class="card-body">
							<h4 class="card-title">Order: #{{$customerOrder->id}}</h4>
							<h4 class="card-title">{{ $customerOrder->member->first_name.' '.$customerOrder->member->last_name }}</h4>
							<p class="card-text">&#8369; {{$customerOrder->total}}</p>
							<a href="javascript:void(0)" class="btn btn-primary btn-shape"><p>ORDER</p></a>
						</div>
					</div>
				</div>				
			@endforeach
		@endif
	</div>
</div>

@endsection


