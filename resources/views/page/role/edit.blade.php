@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.role.form', [
			'title' => 'Edit Role',
			'role' => $role,
			'button' => 'Save',
			'color' => 'btn-warning',
			'icon' => 'fa-edit',
		])
	</div>

@endsection

@include ('layouts.notification')

