@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.member.form', [
			'title' => 'Create Member',
			'member' => new App\Product,
			'button' => 'Create',
			'color' => 'btn-success',
			'icon' => 'fa-check-square',
		])
	</div>
	@include ('layouts.notification')
@endsection


