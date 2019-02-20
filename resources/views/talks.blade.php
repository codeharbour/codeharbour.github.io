@extends('layouts.master')

@section('content')


<section class="section">
	<a name="talks"></a>
	<h1>Previous talks</h1>

	<div id="allTalks" class="row">
		<div class="row__colspaced">
			<?php 
				$talks = json_decode(file_get_contents(public_path('json/talks.json')), true); 
			?>
			 @for ($i = count($talks) - 1; $i >= 0; $i--) 
				<div class="span4-4 span6-3 span12-4">
					@include('sections.talkSummary')
				</div>
			@endfor
		</div>
	</div>
</section>



@endsection