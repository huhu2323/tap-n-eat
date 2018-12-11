@extends('layouts.master');


@section ('contents')
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title"><b>Survey Questionnaires</b></h3>
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
							<li><a href="{{ route('survey.create') }}" class="action-list"><span class="fa fa-check"></span>
							 Create</a></li>
							<li><a href="#" class="action-list action-edit"><span class="fa fa-edit"></span> Edit</a></li>
							<li><a href="#" class="action-list action-delete"><span class="fa fa-trash"></span> Delete</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="panel panel-inside">
						<table class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th width="5%">#</th>
									<th width="85%">Question</th>
									<th width="10%">Feedbacks</th>
								</tr>
							</thead>
							<tbody>
								@php
									$ctr = 1; 
								@endphp
								@forelse ($surveys as $survey)
									<tr class="row-data">
										<td>{{ $survey->id }}</td>
										<td>{{ $survey->question }}
											<span class="hidden-menu hide">
												<a href="{{ route('survey.edit', $survey->id) }}">
													<i class="fa fa-edit"></i> Edit
												</a>
												&nbsp;
												<a href="{{ route('survey.destroy', $survey->id) }}" class="swal-confirm trashed-link" data-title="Do you really want to delete this question?" data-message="{{$survey->question}}" data-type="warning">
													<i class="fa fa-trash"></i> Delete
												</a>
											</span>
											<div class="collapse" id="ans{{$ctr}}">
												@if ($survey->surveyRate->count())
												<table class="table">
													<thead>
														<tr>
															<th width="15%">Name</th>
															<th width="15%">Rate</th>
															<th width="70%">Feedback</th>
														</tr>
													</thead>
													<tbody>
													@forelse ($survey->surveyRate as $rate)
														<tr>
															<td>{{$rate->name}}</td>
															<td>
																@php
																$data = "";
																for ($i = 1; $i <= $rate->rate; $i++)
																{
																	$data .= '<span class="fa fa-star"></span>';
																}
																@endphp
																{!! $data !!}
															</td>
															<td>{{$rate->comment}}</td>
														</tr>
													@empty

													@endforelse
													</tbody>
												</table>
												@endif
											</div>
										</td>
										<td>
											<button class="comment-btn btn btn-success" data-toggle="collapse" data-target="#ans{{$ctr}}" {{ $survey->surveyRate->count() ? "" : "disabled" }}> <span class="fa fa-comment" ></span> </button>
										</td>
									</tr>
									@php
										$ctr++;
									@endphp
								@empty
									<tr>
										<td colspan="2" class="text-center" style="font-size: 30px"> Oops! There's nothing here. </td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	
@endsection

@include ('layouts.notification')