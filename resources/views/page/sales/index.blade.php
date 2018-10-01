@extends('layouts.master');

`
@section ('contents')
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title"><b>Sales History</b></h3>
			<p class="panel-subtitle">Date: {{ \Carbon\Carbon::today()->toFormattedDateString() }}</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<div class="form form-inline">
					{!! Form::open(['method' => 'get', 'style' => 'display: inline;']) !!}
						@if (isset($_GET['trashed']))
							{!! Form::hidden('trashed', $_GET['trashed']) !!}
						@endif
						<div class="form-group">
							<label style="display: block;">Search:</label>
							<div class="input-group"">
								{!! Form::text('search', isset($_GET['search']) ? $_GET['search'] : '', ['class' => 'form-control', 'placeholder' => 'Search']) !!}
							</div>
						</div>
						<div class="form-group">
							<label style="display: block;">Per page:</label>
							<div class="input-group">
								{!! Form::select('per_page', ['15' => 'Display 15', '50' => 'Display 50', '100' => 'Display 100', '300' => 'Display 300'], isset($_GET['per_page']) ? $_GET['per_page'] : null,['class' => 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							<label style="display: block;">&nbsp;</label>
							<div class="input-group">
								{!! Form::button("Filter", ['name' => 'filter', 'value' => '1', 'class' => 'btn btn-primary', 'type' => 'submit']) !!}
							</div>
						</div>
					{!! Form::close() !!}
					</div>
					<div class="panel panel-inside">
						<table class="table table-hover table-bordered table-striped">
							<input type="hidden" class="selected-input" data-module="category" data-id="" data-name="" data-link="{{ route('home') }}">
							<thead>
								<tr>
									<th width="20%">Name:</th>
									<th class="text-center" width="6%">Member Id:</th>
									<th  class="text-center" width="40%">Products :</th>
									<th class="text-center" width="9%">Quantity :</th>
									<th class="text-center" width="8%">Product Price :</th>
									<th class="text-center" width="6%">Total Price :</th>
								</tr>
							</thead>
							<div class="panel-body no-padding bg-primary text-center">
								<tbody>
									@if ( count($orders) )
										@foreach ($orders as $order)
											<tr  data-id="{{$order->id}}" data-name="{{$order->name}}">
												<td><span class="column-name">{{ $order->name }}</span> 
												</td>
												<td class="text-center"> {{ $order->member_id }} </td>

												<td <a href="#prod1{{$order->id}}" data-toggle="collapse" class="collapsed"><span>Products</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
													<div id="prod1{{$order->id}}" class="collapse">
														<table>
															@foreach ($order->orderItems as $item)
															<tr>
																<td> &nbsp;&nbsp; {{ $item->product->name }} </td> 
																<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ( {{ $item->quantity }} ) </td> 
																<td> &nbsp;&nbsp; Price:&nbsp; &#8369; {{ $item->product->price }}</td>
															</tr>
															@endforeach
														</table>
												</div>
												</td>
												<td> &#8369;{{ $order->total_price }}.00 </td>
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="6" class="text-center" style="font-size: 30px"> Oops! There's nothing here. </td>
										</tr>
									@endif
								</tbody>
							</div>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="pagination-container">
		<div class="pagination">
			{!! $orders->links() !!}
		</div>
</div>
@endsection

@include ('layouts.notification')