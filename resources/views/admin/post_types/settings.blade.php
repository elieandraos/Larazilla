@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

<div class="row">
	
	<div class="col s12 m6">
		<!-- Validation Rules Card -->
		<div class="card">
			<div class="title">
				<h5><i class="fa fa-plug"></i> Validation Rules</h5>
				<a class="btn-floating btn-small light-blue card-right-btn" href="javascript:void(0)" id="add-rule">
					<i class="mdi-content-add"></i>
				</a>
			</div>
			<div class="content">
				<blockquote> 
					<p> 
						See full list of Laravel validation rules. <br> 
						<small><a href="https://laravel.com/docs/5.2/validation#available-validation-rules" target="_blank">
						https://laravel.com/docs/5.2/validation#available-validation-rules</a></small> 
					</p> 
				</blockquote> 
				{!! Form::open(['route' => ['admin.post-types.settings.store', $postType->slug]]) !!}
					<div id="rules">
						@if(count($validator))
							@foreach($validator as $key => $rule)
								@include('admin.post_types.partials.validator', ['key' => $key, 'rule' => $rule ])
							@endforeach
						@endif
					</div>
					<div class="row">
						<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>


		<!-- Hidden Fields Card -->
		<div class="card">
			<div class="title">
				<h5><i class="fa fa-plug"></i> Hidden Fields</h5>
			</div>
			<div class="content">
				<blockquote> 
					<p> 
						Select the fields you want to be hidden. 
					</p> 
				</blockquote> 
				{!! Form::open(['route' => ['admin.post-types.hidden-fields.store', $postType->slug]]) !!}
					<div>
						<input type="checkbox" id="categories" name="fields[]" value="categories" @if( isset($hiddenFields) && in_array('categories',$hiddenFields)) checked @endif /> 
						<label for="categories">Categories</label>
					</div>
					<div>
						<input type="checkbox" id="excerpt" name="fields[]" value="excerpt" @if( isset($hiddenFields) && in_array('excerpt',$hiddenFields)) checked @endif /> 
						<label for="excerpt">Excerpt</label>
					</div>
					<div>
						<input type="checkbox" id="body" name="fields[]" value="body" @if( isset($hiddenFields) && in_array('body',$hiddenFields)) checked @endif /> 
						<label for="body">Body</label>
					</div>

					<div class="row">
						<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	
	<div class="col s12 m6">
		<!-- Media Conversions Card -->
		<div class="card">
			<div class="title">
				<h5><i class="fa fa-recycle"></i> Media Conversion</h5>
				<a class="btn-floating btn-small light-blue card-right-btn" href="javascript:void(0)" id="add-conversion">
					<i class="mdi-content-add"></i>
				</a>
			</div>
			<div class="content">
			{!! Form::open(['route' => ['admin.post-types.conversions.store', $postType->slug]]) !!}
					<div id="conversions">
						@if(count($conversions))
							@foreach($conversions as $key => $conversion)
								@include('admin.post_types.partials.conversions', 
									['name' => $conversion['name'], 
									 'width' => $conversion['manipulations']['w'],  
									 'height' => $conversion['manipulations']['h'],  
									 'collection' => $conversion['collection'] 
								])
							@endforeach
						@endif
					</div>
					<div class="row">
						<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
					</div>
				{!! Form::close() !!}
			</div>

		</div>
	</div>	
</div>


@include('admin.post_types.partials.validator', ['hidden' => true, 'id' => 'rule-skeleton', 'key' => '', 'rule' => '' ])
@include('admin.post_types.partials.conversions', ['hidden' => true, 'id' => 'conversion-skeleton', 'name' => '', 'width' => '', 'height' => '', 'collection' => '' ])


@stop