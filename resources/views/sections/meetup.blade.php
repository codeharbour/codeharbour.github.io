<?php
	$locations = json_decode(file_get_contents(public_path('json/locations.json')), true); 
	$meetupTalks = json_decode(file_get_contents(public_path('json/meetupTalks.json')), true); 
	foreach ($locations as $location) { // This will search in the 2 jsons
		if ($location['name'] == $meetup['location']){
			$lat = $location['lat'];
			$lng = $location['lng'];
		}
	}
?>
<script>
      function initMap() {
        var uluru = {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>}; 
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
</script>
	
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjePFsl77nTNvEJQFGstuZqtnVyn--thM&callback=initMap">
</script>
<div class="row">
	<div class="row__colspaced">
		<div class="span4-4 span6-2 span8-3 span12-4">
			<header class="section__header">
			
				<h1 class="section__title">Next meetup</h1>
				<p class="meetup-meta"> 
					<span class="meetup-meta__item">Date: </span>{{date('d-m-Y', strtotime($meetup['event-start-date']))}} <br/>
					<span class="meetup-meta__item">Time: </span>{{date('g:i A', strtotime($meetup['event-start-date']))}}  -  {{date('g:i A', strtotime($meetup['event-end-date']))}} <br>
					<span class="meetup-meta__item">Location:</span> {{$meetup['location']}}
				</p>
				<a id="rsvp" class="btn" href="https://www.meetup.com/codeharbour/events/{{$meetup['event-id']}}">RSVP</a> 
				<!--<div class="box">
					<h3 class="box__title">What to expect</h3>
					<p>The meetup starts with a bit of socialising along with food and drink so don't worry about eating first (unless you don't like pizza!).</p>
				</div>-->
			</header>
		</div>
		<div class="span4-4 span6-4 span8-5 span12-7 push12-1">
			<article class="talk">
			  <div class="speaker profile">
				<h2 class="profile__name">Schedule for the night:</h2>
			  </div>
			  <div class="talk__entry">
					<p></p>
					<ul>
						<li>
							7:00 - 7:30 - Pizza, drinks and mingling
						</li>
						<li>
							7:30 - 8:00 - {{$meetupTalks[0]['title']}} by
							@if($meetupTalks[0]['twitter'] != "") 
							<a href="https://twitter.com/{{ $meetupTalks[0]['twitter'] }}">
								{{$meetupTalks[0]['speaker']}}
							</a>
							@else
								{{$meetupTalks[0]['speaker']}}	
							@endif	
						</li>
						<li>
							8:00 - 8:15 - Intermission
						<li>
							8:15 - 8:45 - {{$meetupTalks[1]['title']}} by
							@if($meetupTalks[1]['twitter'] != "") 
							<a href="https://twitter.com/{{ $meetupTalks[1]['twitter'] }}">
								{{$meetupTalks[1]['speaker']}}
							</a>
							@else
								{{$meetupTalks[1]['speaker']}}	
							@endif
						</li>
						<li>
							8:45 - 9:00 - Discussion and socialising
						</li>
					</ul>
			  </div>
			</article>
		</div>
	</div>
</div>
<div id="howToFindUs" class="row">
	<h2 class="profile__name">How To Find Us:</h2>
	@if($meetup['location'] == "Folkestone Quarterhouse") 
		@include('directions.quarterhouse')
	@else
		@include('directions.gulbenkian')
	@endif
</div>

<div id="map_canvas"></div>