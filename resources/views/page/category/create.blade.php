@extends ('layouts.master')


@section ('contents')

	<div class="row">
		@include ('page.category.form', [
			'title' => 'Create Category',
			'category' => new App\Category,
			'button' => 'Create',
			'color' => 'btn-success',
			'icon' => 'fa-check-square',
		])
	</div>
	
@endsection

@include ('layouts.notification')

