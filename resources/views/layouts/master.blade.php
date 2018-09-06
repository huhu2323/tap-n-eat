<!doctype html>
<html lang="en" 
@guest 
	class="fullscreen-bg"
@endguest
>

@include ('layouts.head')

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@auth
			@include ('layouts.navbar')
		@endauth
		<!-- END NAVBAR -->

		<!-- LEFT SIDEBAR -->
		@auth
			@include ('layouts.sidebar')
		@endauth
		<!-- END LEFT SIDEBAR -->

		<!-- MAIN -->
		@auth
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					@endauth
						<!-- MAIN CONTENT -->
						@yield ('contents')
						<!-- END MAIN CONTENT -->
					@auth
				</div>
			</div>
		</div>
		@endauth
		<!-- END MAIN -->

		
		<!-- FOOTER -->
	
		@include ('layouts.footer')
		
		<!-- END FOOTER -->

	</div>

	<!-- END WRAPPER -->

	<!-- Javascript -->
	@yield ('before-script')

		<script src="{{ asset('assets/js/app.js') }}"></script>
		
	@yield ('after-script')
</body>

</html>
