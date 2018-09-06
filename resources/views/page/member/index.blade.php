@extends ('layouts.master')

@section ('contents')
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title"><b>Members</b></h3>
			<p class="panel-subtitle">Date: {{ \Carbon\Carbon::today()->toFormattedDateString() }}</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-primary pull-right mr-auto dropdown-toggle" data-toggle="dropdown">
						Action <span class="fa fa-chevron-down"></span>
						</button>
						<ul class="dropdown-menu action-menu">
							@if (!isset($_GET['trashed']))
								<li><a href="{{ route('member.create') }}" class="action-list"><span class="fa fa-check"></span>
								 Create</a></li>
							@endif
							@if (!isset($_GET['trashed']))
								<li><a href="#" class="action-list action-edit"><span class="fa fa-edit"></span> Edit</a></li>
								<li><a href="#" class="action-list action-delete"><span class="fa fa-trash"></span> Delete</a></li>
							@else
								<li><a href="#" class="action-list action-recover"><span class="fa fa-refresh"></span> Recover</a></li>
								<li><a href="#" class="action-list action-permanent-delete"><span class="fa fa-trash"></span> Permanent Delete</a></li>
							@endif
						</ul>
					</div>
					@if (!isset($_GET['trashed']))
						<div class="form-group">
							<a href="{{ route('member.index').'?trashed=1' }}" class="trashed"><span class="badge">{{ $deletedMembers }}</span> <i class="fa fa-trash"></i> Trashed </a>
						</div>
					@else
						<div class="form-group">
							<a href="{{ route('member.index') }}" class="trashed"><i class="lnr lnr-chevron-left"></i> Back </a>
						</div>
					@endif
					<div class="form form-inline">
					{!! Form::open(['method' => 'get', 'style' => 'display: inline;']) !!}
						@if (isset($_GET['trashed']))
							{!! Form::hidden('trashed', $_GET['trashed']) !!}
						@endif
						<div class="form-group">
							<label style="display: block;">Search:</label>
							<div class="input-group"">
								{!! Form::text('search', isset($_GET['search']) ? $_GET['search'] : '', ['class' => 'form-control', 'placeholder' => 'Search']) !!}
							</div>
						</div>
						<div class="form-group">
							<label style="display: block;">Per page:</label>
							<div class="input-group">
								{!! Form::select('per_page', ['15' => 'Display 15', '50' => 'Display 50', '100' => 'Display 100', '300' => 'Display 300'], isset($_GET['per_page']) ? $_GET['per_page'] : null,['class' => 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							<label style="display: block;">&nbsp;</label>
							<div class="input-group">
								{!! Form::button("Filter", ['name' => 'filter', 'value' => '1', 'class' => 'btn btn-primary', 'type' => 'submit']) !!}
							</div>
						</div>
					{!! Form::close() !!}
					</div>
					<div class="panel panel-inside">
						<table class="table table-hover table-bordered table-striped">
							<input type="hidden" class="selected-input" data-module="member" data-id="" data-name="" data-link="{{ route('home') }}">
							<thead>
								<tr>
									<th width="30%">Name</th>
									<th width="20%">Date Created</th>
								</tr>
							</thead>
							<div class="panel-body no-padding bg-primary text-center">
								<tbody>
									@if ( count($members) )
										@foreach ($members as $member)
											<tr class="row-data" data-id="{{$member->id}}" data-name="{{$member->fullName()}}">
												<td>
													{{$member->fullname()}} &nbsp;&nbsp;&nbsp;&nbsp;
													@if (!isset($_GET['trashed']))
														<span class="hidden-menu hide">
															<a href="{{ route('member.edit', $member->id) }}">
																<i class="fa fa-edit"></i> Edit
															</a>
															&nbsp;
															<a href="{{ route('member.destroy', $member->id) }}" class="swal-confirm trashed-link" data-title="Do you really want to delete this item?" data-message="{{$member->name}}" data-type="warning">
																<i class="fa fa-trash"></i> Delete
															</a>
														</span>
													@else
														<span class="hidden-menu hide">
														<a href="{{ route('member.restore', $member->id) }}" data-title="Do you want to restore this item?" data-message="{{$member->name}}" data-type="info" class="swal-confirm">
															<i class="fa fa-refresh"></i> Recover
														</a>
														&nbsp;
														<a href="{{ route('member.forceDestroy', $member->id) }}" class="swal-confirm trashed-link" data-title="Do you really want to delete this item? You wont be able to recover this anymore." data-message="{{$member->name}}" data-type="error">
															<i class="fa fa-trash"></i> Permanent Delete
														</a>
														</span>
													@endif
												</td>
												<td>{{ $member->created_at->toFormattedDateString() }}</td>
											</tr>
											
										@endforeach
									@else
										<tr>
											<td colspan="5" class="text-center" style="font-size: 30px"> Oops! There's nothing here. </td>
										</tr>
									@endif
								</tbody>
							</div>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="pagination-container">
		<div class="pagination">
			{!! $members->links() !!}
		</div>
	</div>
	
@endsection

@include ('layouts.notification')
