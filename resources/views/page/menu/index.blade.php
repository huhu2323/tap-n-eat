@extends ('layouts.master')

@section ('contents')
<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title"><b>Menu for Today ({{ \Carbon\Carbon::today()->format('l') }})</b></h3>
		<p class="panel-subtitle">Date: {{ \Carbon\Carbon::today()->toFormattedDateString() }}</p>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel-body">
				<div class="form form-inline">
					{!! Form::open(['method' => 'get', 'style' => 'display: inline;']) !!}
					<div class="form-group">
						<label for="week" style="display: block;">Menu for:</label>
						<div class="input-group">
							{!! Form::select('week', ['everyday' => 'Everyday', 'sunday' => 'Sunday', 'monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday', 'saturday' => 'Saturday'], $week, ['class' => 'form-control', 'id' => 'week']) !!}
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
							<input type="hidden" class="selected-input" data-message="Do your really want to delete this item?" data-module="menu" data-id="" data-name="" data-link="{{ route('home') }}">
							<thead>
								<tr>
									<th width="10%">Image</th>
									<th width="70%">Product Name</th>
									<th width="20%">Available</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($menus as $menu)
									<tr style="background: {{ $menu->setBgColor() }}"> 
										<td> <img src="{{ asset('assets/img/product_img').'/'.$menu->product->image }}" width="50"> </td>
										<td> {{ $menu->product->name }}  </td>
										<td> {!! $menu->getButton() !!} </td>
									</tr>
								@empty
									<tr>
										<td colspan="3" class="text-center" style="font-size: 30px"> Oops! There's nothing here. </td>
									</tr>
								@endforelse
							</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@include ('layouts.notification')
