@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.user.form', [
			'title' => 'Create User',
			'user' => new App\User,
			'button' => 'Create',
			'color' => 'btn-success',
			'icon' => 'fa-check-square',
		])
	</div>
	
@endsection

@include ('layouts.notification')
