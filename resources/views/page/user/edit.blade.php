@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.user.form', [
			'title' => 'Edit User',
			'user' => $user,
			'button' => 'Save',
			'color' => 'btn-warning',
			'icon' => 'fa-edit',
		])
	</div>

@endsection

@include ('layouts.notification')

