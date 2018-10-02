<div id="sidebar-nav" class="sidebar">
	<div class="overlay-sidebar"></div>
	<div class="sidebar-scroll">
		<nav class="">
			<ul class="nav">
				<li>
					<a href="{{ route('home') }}" {{ session('module') == 'home' ? 'class=active' : '' }} ><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
				</li>
				@can ('view-pos')
				<li>
					<a href="{{ route('pos.index') }}" {{ session('module') == 'pos' ? 'class=active' : '' }} ><i class="fa fa-line-chart"></i> <span>POS</span></a>
				</li>
				@endcan

				<li>
					<a href="#subPages3" data-toggle="collapse" class="collapsed {{ session('module') == 'report' ? 'active' : '' }}"><i class="fa fa-line-chart"></i> <span>Reports</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages3" class="collapse {{ session('module') == 'report' ? 'in' : '' }}">
						<ul class="nav">
							<li><a href="{{ route('sales.index') }}" class=""><i class="fa fa-area-chart"></i> Sales History</a></li>
						</ul>
					</div>
				</li>
				
				@can ('view-product', 'view-pcategory')
				<li>
					<a href="#subPages1" data-toggle="collapse" class="collapsed {{ session('module') == 'product' ? 'active' : 'collapsed' }}"><i class="lnr lnr-dinner"></i> <span>Products</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages1" class="collapse {{ session('module') == 'product' ? 'in' : '' }}">
						<ul class="nav">
							@can ('view-pcategory')
							<li><a href="{{ route('category.index') }}"><i class=" fa fa-th-large"></i> Categories</a></li>
							@endcan
							@can ('view-product')
							<li><a href="{{ route('product.index') }}"><i class="icon-submenu lnr lnr-dinner"></i> Products</a></li>
							@endcan
						</ul>
					</div>
				</li>
				@endcan
				
				@can ('view-member')
				<li>
					<a href="{{ route('member.index') }}" {{ session('module') == 'member' ? 'class=active' : '' }} ><i class="fa fa-user"></i> <span>Members</span></a>
				</li>
				@endcan


				<li>
					<a href="{{ route('reservation.index') }}" {{ session('module') == 'reservation' ? 'class=active' : '' }} ><i class="fa fa-ticket"></i> <span>Reservation</span></a>
				</li>
				
				@can ('cashier')
				<li>
					<a href="{{ route('cashier.index') }}" {{ session('module') == 'cashier' ? 'class=active' : '' }} ><i class="fa fa-money"></i> <span>Cashier</span></a>
				</li>
				@endcan
				
				
				@can ('view-user', 'view-role')
				<li>
					<a href="#subPages2" data-toggle="collapse" class="collapsed {{ session('module') == 'role' ? 'active' : '' }}"><i class="fa fa-users"></i> <span>Staff</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages2" class="collapse {{ session('module') == 'role' ? 'in' : '' }}">
						<ul class="nav">
							@can ('view-user')
							<li><a href="{{ route('user.index') }}" class=""><i class="fa fa-user-circle"></i> Admins</a></li>
							@endcan
							@can ('view-role')
							<li><a href="{{ route('role.index') }}" class=""><i class="fa fa-cogs"></i> Roles</a></li>
							@endcan
						</ul>
					</div>
				</li>
				@endcan

				<li>
					<a href="{{ route('logout') }}" class=""><i class="lnr lnr-exit"></i> <span>Logout</span></a>
				</li>
			</ul>
		</nav>
	</div>
</div>