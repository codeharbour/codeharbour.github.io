
@extends('layouts.master')

@section('content')

<section class="section">
	<div class="row">
		<p class="description">
			 codeHarbour is a technology meetup group in Kent. Every month we meet to share ideas, stories and techniques around design, development, process, community and much more, covering all aspects of technology.
		</p>
	</div>
</section>

<section class="section section--primary">
	<a name="next"></a>
	<?php
		$meetup = json_decode(file_get_contents(public_path('json/meetup.json')), true); 
	?>
	@if($meetup['location'] == "") 
		@include('sections.nomeetup')
	@else
		@include('sections.meetup')
	@endif
</section>

<section class="section">
	<a name="sponsors"></a>
	<h1>Sponsors</h1>
	@include('sections.sponsors')
</section>

<section class="section section--primary">
	<a name="talks"></a>
	<h1>Previous talks</h1>

	<div class="row">
		<div class="row__colspaced">
			<?php 
				$talks = json_decode(file_get_contents(public_path('json/talks.json')), true); 

				$newestTalk = count($talks) - 1;
				if (count($talks) < 3){
					$lastTalk = 0;
				}else{
					$lastTalk = count($talks) - 3; 
				}
			?>
			 @for ($i = $newestTalk; $i >= $lastTalk; $i--) 
				<div class="span4-4 span6-3 span12-4">
					@include('sections.talkSummary')
				</div>
			@endfor
		</div>
	</div>
	<div class="centeredRow">
		<div class="centered">
			<a class="btn btn--cta centered" href="{{ url('/talks') }}">View the archive</a>
		</div>
	</div>
</section>

<section class="section section--tertiary">
	<h1>Organised by</h1>
	<div class="organiserRow">
		<?php $organisers = json_decode(file_get_contents(public_path('json/organisers.json')), true); ?>
		@foreach($organisers as $organiser)
			@include('sections.organiser')
		@endforeach		
		</div>
</section>

<section id="contactSection" class="section section--primary">
	<a name="contact"></a>
	<h1>Contact Us</h1>
	<div class="row">
	<p>If you would like to submit a talk or find out more information then fill out the form below</p>
	<form id="form1" action="sendEmail.php" method="post" >
		<div class="contactRow">
			<input id="name" type="text" name="name" value="" placeholder="Name"/>
		</div>	
		<div class="contactRow">
			<input id="email" type="email" name="email" value="" placeholder="Email"/>
		</div>	
		<div class="contactRow">
			<textarea id = "message" rows="3" placeholder="Message"></textarea>	
		</div>	
		<div class="contactRow">
			<input type="submit" id = "submitButton" class="btn" value="Submit">      							
		</div>				
	</form>	
	<div id="responseDiv"></div>
	</div>
</section>

@endsection