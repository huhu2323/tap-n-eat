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
				<div class="panel panel-body">
					<h4> Member Id: &nbsp;&nbsp;&nbsp; {{ $orders->member_id }}  </h4>
					<h4> Name: &nbsp;&nbsp;&nbsp; {{ $orders->name }} </h4>
					

						<table>
							@foreach($orders->orderItems as $items)
							<tr style="font-size: 18px" >
								<td>{{ $items->product->name }}</td>
								<td> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;{{ $items->quantity }}</td>
								<td> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;{{ $items->product->price }}</td>
							</tr>
							@endforeach
						</table>

					<h4> Total Price: &nbsp;&nbsp;&nbsp; &#8369; {{ $orders->total_price }} </h4>

					<h4>Cash: &nbsp;&nbsp;<input type="text" name="Cash" id="cash"></h4>
					<h4>Change : <label>  </label> </h4>
				</div>
				<button type="submit"> Print </button>
				</div>
			</div>
		</div>
	</div>

	
	
@endsection

@include ('layouts.notification')