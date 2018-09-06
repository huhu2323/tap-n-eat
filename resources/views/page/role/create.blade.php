@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.role.form', [
			'title' => 'Create Role',
			'role' => new Spatie\Permission\Models\Role,
			'button' => 'Create',
			'color' => 'btn-success',
			'icon' => 'fa-check-square',
		])
	</div>
	
@endsection

@include ('layouts.notification')
