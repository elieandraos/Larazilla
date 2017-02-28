<div class="bio-content">
	<table>
		<tr>
			<td style="padding: 20px;">
				<div class="bio-image">
					<img src="{!! $bio->getFirstMediaUrl( $bio->getMetaValue('image') , 'featured') !!}" />
				</div>
			</td>
			<td style="vertical-align: top;padding: 20px" class="text">
				<div class="bio-content">
					<h4><strong>{!! $bio->title !!}</strong></h4>
					<p>{!! $bio->body!!}</p>
				</div>
			</td>
			<td style="vertical-align: middle;width:165px;color:#555" class='pdf' >
				<a class="button-link active" href="{!! $bio->getFirstMediaUrl( $bio->getMetaValue('pdf_file')) !!}">
					{!! trans('messages.download') !!}
				</a>
			</td>
		</tr>
	</table>
</div>