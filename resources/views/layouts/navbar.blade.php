<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="{{ route('home') }}"><img style="height: 40px" src="{{ asset('assets/img/logo-png-dark.png') }}" alt="Mireio" class="logo"></a>
	</div>
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth"><i class="fa fa-chevron-left"></i></button>
		</div>
		<div id="navbar-menu">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown"> <i class="fa fa-user-o"></i>  &nbsp; &nbsp;{{ Auth::user()->first_name }}<i class="icon-submenu lnr lnr-chevron-down"></i></a>
					<ul class="dropdown-menu notifications">
						<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
						<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
						<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
						<li><a href="{{ route('logout') }}"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

	<script type="text/javascript">
	 setInterval(function fetchOrders()
	{
	 	$.ajax({
		url: '{{ route("ordering.orders") }}',
		method: 'get',
		data: { sample: 'asdas' },
		success: function(e) {
			var orders = JSON.parse(e);
			var contents = "";
			$('.noti-count').html(orders.length);

			$.each(orders, function( index, value ) {
					let user = "";

					if (value.member_id == 0)
					{
						user = "Guest";
					}
	 				contents += '<li><a href="#" class="notification-item"><span class="dot bg-success"></span>' + user + ' placed an order.</a></li>';
				});
				contents += '<li><a href="#" class="more">See all notifications</a></li>';
				$('.notifications').html(contents);
			}
		});
	}, 1000);

	</script>