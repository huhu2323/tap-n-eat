@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.product.form', [
			'title' => 'Create Product',
			'product' => new App\Product,
			'button' => 'Create',
			'color' => 'btn-success',
			'icon' => 'fa-check-square',
		])
	</div>
	
@endsection

@include ('layouts.notification')

