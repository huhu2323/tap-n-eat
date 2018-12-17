 

@extends ('layouts.master')

@section ('contents')
	{!! Form::open(['method' => 'post']) !!}
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Set Inventory</b></h3>
					<p class="panel-subtitle">Date: {{ \Carbon\Carbon::today()->toFormattedDateString() }}</p>
				</div>
				
				<div class="panel-body">
						<input type="hidden" name="id" value="{{ $product->id }}">
						<div class="form-group ">
							<h1>{{ $product->name }}</h1>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label for="productprice">Set stock: </label>
									<div class="input-group">
										<label for="stock" class="input-group-addon"><i class="fa fa-square"></i></label>
										{!! Form::text('stock', $product->inventory->stock, ['class' => 'form-control', 'placeholder' => 'Stock', 'id' => 'stock']) !!}
									</div>
									
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label for="category">Cycle: </label>
									<div class="input-group">
										<label for="cycle" class="input-group-addon"><i class="fa fa-calendar"></i></label>
										{!! Form::select('cycle', ['manual' => 'Manual', 'daily' => 'Daily', 'weekly' => 'Weekly', 'monthly' => 'Monthly'], $product->inventory->cycle, ['class' => 'form-control', 'placeholder' => 'Select Cycle', 'id' => 'cycle']) !!}
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group ">
									<label for="stock_per_cycle">Stock per cycle: </label>
									{!! Form::number('stock_per_cycle', $product->inventory->stock_per_cycle, ['class' => 'form-control', 'placeholder' => 'Stock per cycle', 'id' => 'stock_per_cycle', 'min' => 0, 'disabled' => $product->inventory->cycle == 'manual' ? true : false]) !!}
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="col-md-3">
			<div class="panel">
				<div class="panel-heading action-panel">
					<h3 class="panel-title">Actions</h3>
				</div>
				<div class="panel-body">
					<button type="submit" class="btn btn-block btn-warning text-center"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;Set stock</button>
					<a href="{{ route('inventory.index') }}" class="btn btn-block btn-danger text-center"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;Cancel</a>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
	
@endsection

@include ('layouts.notification')