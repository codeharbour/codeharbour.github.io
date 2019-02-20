<article class="talk">
  <h1>{{ $talks[$i]['title'] }}</h1>
  <div class="speaker profile">
	@if($talks[$i]['twitter'] != "") 
		<a href="https://twitter.com/{{ $talks[$i]['twitter'] }}">
			<img class="profile__img" src="{{url('')}}/img/{{ $talks[$i]['speaker-img'] }}" alt="{{ $talks[$i]['speaker'] }}">
		</a>
	@else
		<img class="profile__img" src="{{url('')}}/img/{{ $talks[$i]['speaker-img'] }}" alt="{{ $talks[$i]['speaker'] }}">	
	@endif		
    <h2 class="profile__name">with {{ $talks[$i]['speaker'] }}</h2>
  </div>
  <div class="talk__entry">
   {{ $talks[$i]['desc'] }}
  </div>
</article>


