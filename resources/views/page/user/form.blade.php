{!! Form::model($user, [ 'method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row' ]) !!}

<div class="col-md-9">
	<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa {{ $icon }}"></i> {{ $title }}</h3>
	</div>
		<div class="panel-body">
			<div class="col-md-9">
				<input type="hidden" name="id" value="{{ $user->id }}">
				<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
					<div class="input-group">
						<label for="rfidname" class="input-group-addon input-lg">Username: </label>
						{!! Form::text('username', null, ['class' => 'form-control input-lg', 'placeholder' => 'Input Username here...', 'id' => 'rfidname']) !!}
					</div>
				{!! $errors->has('username') ? '<span class="label label-danger">'.$errors->first('username').'</span>' : '' !!}
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
							<label for="fname">First Name: </label>
							<div class="input-group">
								<label for="fname" class="input-group-addon"><i class="fa fa-user"></i></label>
								{!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Input First Name here...', 'id' => 'fname']) !!}
							</div>
							{!! $errors->has('first_name') ? '<span class="label label-danger">'.$errors->first('first_name').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
							<label for="lname">Last Name: </label>
							<div class="input-group">
								<label for="lname" class="input-group-addon"><i class="fa fa-user"></i></label>
								{!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Input Last Name here...', 'id' => 'lname']) !!}
							</div>	
							{!! $errors->has('last_name') ? '<span class="label label-danger">'.$errors->first('last_name').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							<label for="pass">Pasword: </label>
							<div class="input-group">
								<label for="pass" class="input-group-addon"><i class="fa fa-lock"></i></label>
								{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Input Password here...', 'id' => 'pass']) !!}
							</div>
							{!! $errors->has('password') ? '<span class="label label-danger">'.$errors->first('password').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							<label for="repass">Confirm Pasword: </label>
							<div class="input-group">
								<label for="repass" class="input-group-addon"><i class="fa fa-lock"></i></label>
								{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Input Password here...', 'id' => 'repass']) !!}
							</div>
							{!! $errors->has('password') ? '<span class="label label-danger">'.$errors->first('password').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
							<label for="category" >Roles: </label>
							<div class="input-group">
								<label for="category" class="input-group-addon"><i class="fa fa-cog"></i></label>
								{!! Form::select('role', $roles, $user->getRoleNames()->first(), ['class' => 'form-control', 'placeholder' => 'Select Role', 'id' => 'category']) !!}
							</div>
							{!! $errors->has('role') ? '<span class="label label-danger">'.$errors->first('role').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
							<label for="addre">Address: </label>
							{!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Input Address here...', 'id' => 'addre', 'rows' => '4']) !!}
							{!! $errors->has('address') ? '<span class="label label-danger">'.$errors->first('address').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="ema">Email: </label>
							<div class="input-group">
								<label for="pass" class="input-group-addon"><i class="fa fa-envelope"></i></label>
								{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Input Email here...', 'id' => 'ema']) !!}
							</div>
							{!! $errors->has('email') ? '<span class="label label-danger">'.$errors->first('email').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
							<label for="cont">Contact: </label>
							<div class="input-group">
								<label for="cont" class="input-group-addon"><i class="fa fa-phone"></i></label>
								{!! Form::text('contact', null, ['class' => 'form-control', 'placeholder' => 'Input Contact Number here...', 'id' => 'cont']) !!}
							</div>
						</div>
					{!! $errors->has('contact') ? '<span class="label label-danger">'.$errors->first('contact').'</span>' : '' !!}
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel">
		<div class="panel-heading action-panel">
			<h3 class="panel-title">Actions</h3>
		</div>
		<div class="panel-body">
			<button type="submit" class="btn btn-block {{ $color }} text-center"><i class="fa {{ $icon }}" aria-hidden="true"></i>&nbsp;{{ $button }}</button>
			<a href="{{ route('user.index') }}" class="btn btn-block btn-danger text-center"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;Cancel</a>
		</div>
	</div>
</div>
{!! Form::close() !!}