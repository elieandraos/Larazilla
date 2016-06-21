<div class='row @if(isset($hidden)) hidden @endif' id='@if(isset($id)){!! $id !!}@endif'>
	<div class='col s3'>
		<div class="input-field"> 
			{!! Form::text('key[]', $key, ['class' => 'validate', 'placeholder' => 'Key', 'id' => 'key[]']) !!}
			{!! Form::label('key', 'Key') !!}
		</div>
	</div>
	<div class='col s8'>
		<div class="input-field"> 
			{!! Form::text('rule[]', $rule, ['class' => 'validate', 'placeholder' => 'Rule']) !!}
			{!! Form::label('rule', 'Rule') !!}
		</div>
	</div>
	<div class='col s1'>
		<i class="fa fa-trash-o link-icon delete-rule"></i> &nbsp;
	</div>
</div>