@include ('ordering.layouts.head')

<body>
<div class="overlay">
  &nbsp;
</div>
	
	@yield ('content')

	@yield ('menu')

	@yield ('cart')

	@include ('ordering.layouts.script')

	@yield ('after-script')

</body>
</html>