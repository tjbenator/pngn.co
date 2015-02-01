@extends('app')

@section('content')

<img id='normal' class='logo center-block' type="image/svg+xml" src="imgs/penguin-link.svg" />

{!! Form::open(['action' => 'LinkController@create']) !!}
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group input-group-lg">
				{!! Form::text('url', null, ['autofocus', 'class' => 'form-control']) !!}
				<span class="input-group-btn">
					{!! Form::submit('Shorten!', ['class' => 'btn btn-primary']) !!}
				</span>
			</div>
		</div>
	</div>
{!! Form::close() !!}

<!---
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group input-group-lg">
				<input type="text" class='form-control' value='somelink'>
				<span class="input-group-btn">
					<input type='button' class='btn btn-default' value='copy'>
				</span>
			</div>
		</div>
	</div>


@endsection