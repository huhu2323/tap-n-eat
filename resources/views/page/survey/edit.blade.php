@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.survey.form', [
			'title' => 'Edit Survey',
			'product' => $survey,
			'button' => 'Save',
			'color' => 'btn-warning',
			'icon' => 'fa-edit',
		])
	</div>
	
@endsection

@include ('layouts.notification')