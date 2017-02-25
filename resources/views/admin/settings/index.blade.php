@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::model($settings, ['route' => ['admin.settings.update', $settings->id], 'enctype' => 'multipart/form-data']) !!}
	
<div class="row">
	<div class="col m7 s12">
		<div class="card-panel">
			<div class="title"><h5><i class="fa fa-database"></i> Settings</h5></div>
			<p class="label"> Site Mulilanguage</p>
			{!! Form::select(
				'multilang', 
				[ 0 => 'No', 1 => 'Yes'], 
				$settings->multilang
			)!!}

			<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
		</div>
	</div>
</div>

@stop