@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.survey.form', [
			'title' => 'Create Survey',
			'product' => new App\Survey,
			'button' => 'Create',
			'color' => 'btn-success',
			'icon' => 'fa-check-square',
		])
	</div>
	
@endsection

@include ('layouts.notification')