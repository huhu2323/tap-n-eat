@extends('layouts.master');


@section ('contents')
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title"><b>Receipt</b></h3>
			<p class="panel-subtitle">Date: {{ \Carbon\Carbon::today()->toFormattedDateString() }}</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<div class="panel panel-body" style="border: 5px dashed black;">
						<h4> Customer: &nbsp;&nbsp;&nbsp; {{ $orders->member ? $orders->member->username : 'Guest'}}  
						</h4>

						<h4>Orders:</h4>
						<ul>
							@foreach($orders->orderItems as $items)
							<li>
								{{ $items->product->name }} &times; {{ $items->quantity }} (&#8369; {{$items->quantity * $items->product->price}})
							</li>
							@endforeach
						</ul>

						<h4> Total Price: &#8369; {{ $orders->total_price }} </h4>
						<input type="hidden" id="total-value" value="{{ $orders->total_price }}">
						<h4>Cash: </h4>
						<input class="form-control inpt" style="width: 300px" placeholder="Please input payment here.." type="text" name="Cash" id="cash">
						<h4>Change : <label id="change">  </label> </h4>

						<a href="{{ route('cashier.receipt', $orders) }}" type="submit" class="btn btn-primary"> Print </a>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.notification')
@endsection

