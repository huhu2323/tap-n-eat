@extends('layouts.master');


@section ('contents')
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title"><b>Cashier</b></h3>
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
									<th>Table No.:</th>
									<th class="text-center">Customer</th>
									<th>Action :</th>
								</tr>
							</thead>
							<div class="panel-body no-padding bg-primary text-center">
								<tbody>
									@if ( count($orders) )
										@foreach ($orders as $order)
											<tr class="row-data" data-id="{{$order->id}}" data-name="{{$order->name}}">
												<td><span class="column-name">{{ $order->table_number }}</span> 
												</td>
												<td class="text-center"> {{ $order->member ? $order->member->username : "Guest" }} </td>
												<td><a href="{{ route('cashier.pay', $order->id) }}">
														<i class="fa fa-credit-card" style="color:green">&nbsp;</i> Pay
													</a></td>
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="5" class="text-center" style="font-size: 30px"> Oops! There's nothing here. </td>
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