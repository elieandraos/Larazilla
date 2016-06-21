<div class='row @if(isset($hidden)) hidden @endif' id='@if(isset($id)){!! $id !!}@endif'>
	<div class='col s3'>
		<div class="input-field"> 
			{!! Form::text('name[]', $name, ['class' => 'validate', 'placeholder' => 'Name']) !!}
			{!! Form::label('name', 'Name') !!}
		</div>
	</div>
	<div class='col s2'>
		<div class="input-field"> 
			{!! Form::text('width[]', $width, ['class' => 'validate', 'placeholder' => 'Width']) !!}
			{!! Form::label('width', 'Width') !!}
		</div>
	</div>
	<div class='col s2'>
		<div class="input-field"> 
			{!! Form::text('height[]', $height, ['class' => 'validate', 'placeholder' => 'Height']) !!}
			{!! Form::label('height', 'Height') !!}
		</div>
	</div>
	<div class='col s3'>
		<div class="input-field"> 
			{!! Form::text('collection[]', $collection, ['class' => 'validate', 'placeholder' => 'Collection']) !!}
			{!! Form::label('collection', 'Collection') !!}
		</div>
	</div>
	<div class='col s1'>
		<i class="fa fa-trash-o link-icon delete-conversion"></i> &nbsp;
	</div>
</div>