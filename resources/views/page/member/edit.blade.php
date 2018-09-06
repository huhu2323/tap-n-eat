@extends ('layouts.master')

@section ('contents')

	<div class="row">
		@include ('page.member.form', [
			'title' => 'Edit Member',
			'member' => $member,
			'button' => 'Save',
			'color' => 'btn-warning',
			'icon' => 'fa-edit',
		])
	</div>

@endsection

@include ('layouts.notification')

