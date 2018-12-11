{!! Form::model($product, [ 'method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row' ]) !!}

<div class="col-md-9">
	<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa {{ $icon }}"></i> {{ $title }}</h3>
	</div>
		<div class="panel-body">
			<div class="col-md-9">
				<input type="hidden" name="id" value="{{ $product->id }}">
				<div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
					<div class="input-group">
						<label for="productname" class="input-group-addon input-lg">Question: </label>
						{!! Form::text('question', null, ['class' => 'form-control input-lg', 'placeholder' => 'Input Product Question here...', 'id' => 'productname']) !!}
					</div>
				{!! $errors->has('question') ? '<span class="label label-danger">'.$errors->first('question').'</span>' : '' !!}
				</div>
			</div>
			<div class="col-md-3"></div>
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
			<a href="{{ route('survey.index') }}" class="btn btn-block btn-danger text-center"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;Cancel</a>
		</div>
	</div>
</div>
{!! Form::close() !!}
