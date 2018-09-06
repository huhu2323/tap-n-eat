@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.product.form', [
			'title' => 'Edit Product',
			'product' => $product,
			'button' => 'Save',
			'color' => 'btn-warning',
			'icon' => 'fa-edit',
		])
	</div>

@endsection

@include ('layouts.notification')

