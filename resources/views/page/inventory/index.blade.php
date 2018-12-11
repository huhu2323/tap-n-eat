@extends ('layouts.master')

@section ('contents')
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title"><b>{{ isset($_GET['trashed']) ? 'Trashed ' : '' }}Inventory</b></h3>
			<p class="panel-subtitle">Date: {{ \Carbon\Carbon::today()->toFormattedDateString() }}</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-primary pull-right mr-auto dropdown-toggle" data-toggle="dropdown">
						Set Stock 
						</button>
					</div>
					
					<div class="form form-inline">
					{!! Form::open(['method' => 'get', 'style' => 'display: inline;']) !!}
						@if (isset($_GET['trashed']))
							{!! Form::hidden('trashed', $_GET['trashed']) !!}
						@endif
						<div class="form-group">
							<label style="display: block;">Search:</label>
							<div class="input-group"">
								{!! Form::text('search', isset($_GET['search']) ? $_GET['search'] : '', ['class' => 'form-control search-txt', 'placeholder' => 'Search', 'autocomplete' => 'off']) !!}
							</div>
						</div>
						<div class="form-group">
							<label style="display: block;">Per page:</label>
							<div class="input-group">
								{!! Form::select('per_page', ['15' => 'Display 15', '50' => 'Display 50', '100' => 'Display 100', '300' => 'Display 300'], isset($_GET['per_page']) ? $_GET['per_page'] : null,['class' => 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							<label style="display: block;">Categories:</label>
							<div class="input-group">
								{!! Form::select('category', $categories, isset($_GET['category']) ? $_GET['category'] : null,['class' => 'form-control', 'placeholder' => 'All']) !!}
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
							<input type="hidden" class="selected-input" data-message="Do your really want to delete this item?" data-module="product" data-id="" data-name="" data-link="{{ route('home') }}">
							<thead>
								<tr>
									<th width="45%">Product</th>
									<th width="10%">Current Stock</th>
									<th width="25%">Cycle</th>
									<th width="25%">Stock per Cycle</th>
								</tr>
							</thead>
							<div class="panel-body no-padding bg-primary text-center">
								<tbody>
									@if ( count($products) )
										@foreach ($products as $product)
											<tr class="row-data" data-id="{{$product->id}}" data-name="{{$product->name}}">
												<td><span class="column-name">{{ $product->name }}</span> &nbsp;&nbsp;&nbsp;&nbsp;
													<span class="hidden-menu hide">
															<a href="{{ route('inventory.edit', $product->id) }}">
																<i class="fa fa-edit"></i> Set Stock
															</a>
															&nbsp;
														</span>
												</td>
												<td class="text-right">{{ $product->inventory->stock }} </td>
												<td>{{ $product->inventory->cycle }}</td>
												<td>{{ $product->inventory->stock_per_cycle }}</td>
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
			{!! $products->links() !!}
		</div>
	</div>
	
@endsection

@include ('layouts.notification')
inven