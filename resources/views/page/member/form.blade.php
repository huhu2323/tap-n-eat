{!! Form::model($member, [ 'method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row' ]) !!}

<div class="col-md-9">
	<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa {{ $icon }}"></i> {{ $title }}</h3>
	</div>
		<div class="panel-body">
			<div class="col-md-9">
				<input type="hidden" name="id" value="{{ $member->id }}">
				<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
					<div class="input-group">
						<label for="user" class="input-group-addon input-lg">Username: </label>
						{!! Form::text('username', null, ['class' => 'form-control input-lg', 'placeholder' => 'Input Username here...', 'id' => 'user']) !!}
					</div>
				{!! $errors->has('username') ? '<span class="label label-danger">'.$errors->first('username').'</span>' : '' !!}
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							<label for="pass">Password: </label>
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
							<label for="pass">Confirm Password: </label>
							<div class="input-group">
								<label for="pass" class="input-group-addon"><i class="fa fa-lock"></i></label>
								{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Input Password here...', 'id' => 'passc']) !!}
							</div>
							{!! $errors->has('password') ? '<span class="label label-danger">'.$errors->first('password').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('rfid') ? 'has-error' : '' }}">
							<label for="rfid">RFID: </label>
							<div class="input-group">
								<label for="rfid" class="input-group-addon"><i class="fa fa-rss"></i></label>
								{!! Form::text('rfid', null, ['class' => 'form-control', 'placeholder' => 'Input RFID here...', 'id' => 'rfid']) !!}
							</div>
							{!! $errors->has('rfid') ? '<span class="label label-danger">'.$errors->first('rfid').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
							<label for="memberimage">Image: </label>
							<br>
							<img src="{{ $member->image ? asset('assets/img/member_img').'/'.$member->image : asset('assets/img/logo.jpg') }}" class="preview" style="width: 100%;">
							<div class="input-group">
								<label for="memberimage" class="input-group-addon"><i class="fa fa-image"></i></label>
								{!! Form::file('image', ['class' => 'form-control image', 'id' => 'memberimage']) !!}
							</div>
							{!! $errors->has('image') ? '<span class="label label-danger">'.$errors->first('image').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
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
						<div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
							<label for="mname">Middle Name: </label>
							<div class="input-group">
								<label for="mname" class="input-group-addon"><i class="fa fa-user"></i></label>
								{!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'Input Middle Name here...', 'id' => 'mname']) !!}
							</div>
							{!! $errors->has('middle_name') ? '<span class="label label-danger">'.$errors->first('middle_name').'</span>' : '' !!}
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
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
							<label for="cont">Contact: </label>
							<div class="input-group">
								<label for="cont" class="input-group-addon"><i class="fa fa-phone-square"></i></label>
								{!! Form::text('contact', null, ['class' => 'form-control', 'placeholder' => 'Input Contact Number here...', 'id' => 'cont']) !!}
							</div>
						</div>
					{!! $errors->has('contact') ? '<span class="label label-danger">'.$errors->first('contact').'</span>' : '' !!}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('credit') ? 'has-error' : '' }}">
							<label for="cred">Credit: </label>
								<div class="input-group">
								<label for="cred" class="input-group-addon"><i class="fa fa-credit-card-alt"></i></label>
								{!! Form::text('credit', null, ['class' => 'form-control', 'placeholder' => 'Input credit Number here...', 'id' => 'cred']) !!}
								</div>
						</div>
					{!! $errors->has('credit') ? '<span class="label label-danger">'.$errors->first('credit').'</span>' : '' !!}
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
			<a href="{{ route('member.index') }}" class="btn btn-block btn-danger text-center"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;Cancel</a>
		</div>
	</div>
</div>
{!! Form::close() !!}

@section('after-script')
	<script type="text/javascript">
	console.log('hhhh');
		function readURL(input) {
			console.log('zzzzz');
			if (input.files && input.files[0]) 
			{
				var reader = new FileReader();
				console.log('azsa');
				reader.onload = function(e) {
				$('.preview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$(".image").change( function() {
			console.log('aa');
			readURL(this);
		});
	</script>
@endsection