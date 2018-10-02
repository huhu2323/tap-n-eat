{!! Form::model($role, [ 'method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row' ]) !!}

<div class="col-md-9">
	<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa {{ $icon }}"></i> {{ $title }}</h3>
	</div>
		<div class="panel-body">
			<div class="col-md-9">
				<input type="hidden" name="id" value="{{ $role->id }}">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<div class="input-group">
						<label for="rolename" class="input-group-addon input-lg">Role Name: </label>
						{!! Form::select('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Input Role Name here...', 'id' => 'rolename']) !!}
					</div>
				{!! $errors->has('name') ? '<span class="label label-danger">'.$errors->first('name').'</span>' : '' !!}
				</div>
				<h4><span class="text-danger">* Please select the permissions for the role.</h4>
				<div class="row">
					<div class="col-md-3">
						<label for="">Account Type:</label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('cashier', 'cashier', $role->hasPermissionTo('cashier') ? true : false) !!}
							<span>Cashier</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('chef', 'chef', $role->hasPermissionTo('chef') ? true : false) !!}
							<span>Chef</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="">POS:</label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('view-pos-record', 'view-pos-record', $role->hasPermissionTo('view-pos-record') ? true : false) !!}
							<span>View POS Records</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('delete-pos-record', 'delete-pos-record', $role->hasPermissionTo('delete-pos-record') ? true : false) !!}
							<span>Delete POS Record</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('update-pos-record', 'update-pos-record', $role->hasPermissionTo('update-pos-record') ? true : false) !!}
							<span>Delete POS Record</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="">Categories:</label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('view-pcategory', 'view-pcategory', $role->hasPermissionTo('view-pcategory') ? true : false) !!}
							<span>View Categories</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('create-pcategory', 'create-pcategory', $role->hasPermissionTo('create-pcategory') ? true : false) !!}
							<span>Create Category</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('update-pcategory', 'update-pcategory', $role->hasPermissionTo('update-pcategory') ? true : false) !!}
							<span>Update Category</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('delete-pcategory', 'delete-pcategory', $role->hasPermissionTo('delete-pcategory') ? true : false) !!}
							<span>Delete Category</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="">Products:</label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('view-product', 'view-product', $role->hasPermissionTo('view-product') ? true : false) !!}
							<span>View Products</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('create-product', 'create-product', $role->hasPermissionTo('create-product') ? true : false) !!}
							<span>Create Product</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('update-product', 'update-product', $role->hasPermissionTo('update-product') ? true : false) !!}
							<span>Update Product</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('delete-product', 'delete-product', $role->hasPermissionTo('delete-product') ? true : false) !!}
							<span>Delete Product</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="">Members:</label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('view-member', 'view-member', $role->hasPermissionTo('view-member') ? true : false) !!}
							<span>View Members</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('create-member', 'create-member', $role->hasPermissionTo('create-member') ? true : false) !!}
							<span>Create Member</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('update-member', 'update-member', $role->hasPermissionTo('update-member') ? true : false) !!}
							<span>Update Member</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('delete-member', 'delete-member', $role->hasPermissionTo('delete-member') ? true : false) !!}
							<span>Delete Member</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="">Roles:</label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('view-role', 'view-role', $role->hasPermissionTo('view-role') ? true : false) !!}
							<span>View Roles</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('create-role', 'create-role', $role->hasPermissionTo('create-role') ? true : false) !!}
							<span>Create Roles</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('update-role', 'update-role', $role->hasPermissionTo('update-role') ? true : false) !!}
							<span>Update Role</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('delete-role', 'delete-role', $role->hasPermissionTo('delete-role') ? true : false) !!}
							<span>Delete Role</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="">Users:</label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('view-user', 'view-user', $role->hasPermissionTo('view-user') ? true : false) !!}
							<span>View Users</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('create-user', 'create-user', $role->hasPermissionTo('create-user') ? true : false) !!}
							<span>Create User</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('update-user', 'update-user', $role->hasPermissionTo('update-user') ? true : false) !!}
							<span>Update User</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for=""></label>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="fancy-checkbox">
							{!! Form::checkbox('delete-user', 'delete-user', $role->hasPermissionTo('delete-user') ? true : false) !!}
							<span>Delete User</span>
							</label>
						</div>
					</div>
				</div>
				
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
			<a href="{{ route('role.index') }}" class="btn btn-block btn-danger text-center"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;Cancel</a>
		</div>
	</div>
</div>
{!! Form::close() !!}