@extends ('layouts.master')


@section ('contents')

	<div class="row">
		@include ('page.category.form', [
			'title' => 'Edit Category',
			'category' => $category,
			'button' => 'Save',
			'color' => 'btn-warning',
			'icon' => 'fa-edit',
		])
	</div>
	
@endsection

@include ('layouts.notification')

