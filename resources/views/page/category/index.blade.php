@extends ('layouts.master')

@section ('contents')
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title"><b>Categories</b></h3>
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
							<li><a href="{{ route('category.create') }}" class="action-list"><span class="fa fa-check"></span>
							 Create</a></li>
							<li><a href="#" class="action-list action-edit"><span class="fa fa-edit"></span> Edit</a></li>
							<li><a href="#" class="action-list action-delete"><span class="fa fa-trash"></span> Delete</a></li>
						</ul>
					</div>
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
							<input type="hidden" class="selected-input" data-module="category" data-id="" data-name="" data-link="{{ route('home') }}">
							<thead>
								<tr>
									<th width="30%">Name</th>
									<th width="20%">Date Created</th>
								</tr>
							</thead>
							<div class="panel-body no-padding bg-primary text-center">
								<tbody>
									@if ( count($categories) )
										@foreach ($categories as $category)
											<tr class="row-data" data-id="{{$category->id}}" data-name="{{$category->name}}">
												<td>
													{{$category->name}} &nbsp;&nbsp;&nbsp;&nbsp;
													<span class="hidden-menu hide">
														<a href="{{ route('category.edit', $category->id) }}">
															<i class="fa fa-edit"></i> Edit
														</a>
															&nbsp;
														<a href="{{ route('category.destroy', $category->id) }}" class="swal-confirm trashed-link" data-title="Do you really want to delete this item? You won't be able to recover this anymore." data-message="{{$category->name}}" data-type="error">
															<i class="fa fa-trash"></i> Delete
														</a>
													</span>
												</td>
												<td>{{ $category->created_at->toFormattedDateString() }}</td>
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
			{!! $categories->links() !!}
		</div>
	</div>
	
@endsection

@include ('layouts.notification')
