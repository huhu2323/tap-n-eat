@section ('after-script')
	@if ( session()->has('success') )
		@section ('after-script')
			<script type="text/javascript">
				toastr.success( '{{ session('success')['msg'] }}', '{{ session('success')['title'] }}', {timeOut: 3000, closeDuration: 300});
			</script>
		@endsection
	@endif

	@if ( count($errors) )
		<script type="text/javascript">
			toastr.error( 'Please check the input fields', 'Error!', {timeOut: 3000, closeDuration: 300});
		</script>
	@endif

	@if ( session()->has('warning') )
		@section ('after-script')
			<script type="text/javascript">
				toastr.warning( '{{ session('warning')['msg'] }}', '{{ session('warning')['title'] }}', {timeOut: 3000, closeDuration: 300});
			</script>
		@endsection
	@endif
@endsection