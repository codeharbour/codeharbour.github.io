<div class="profile organiser">
	<h4 class="profile__name">{{$organiser['name']}} | 
		@if($organiser['twitter'] != "") 
			<a href="https://twitter.com/{{$organiser['twitter']}}" class="newWindow">{{$organiser['twitter']}}</a>
		@elseif($organiser['linkedin'] != "") 
			<a href="https://linkedin.com/in/{{$organiser['linkedin']}}" class="newWindow">{{$organiser['linkedin']}}</a>
		@endif		
	</h4>
  <img class="profile__img" src="{{ url('')}}/img/{{$organiser['img-url']}}" alt="{{$organiser['name']}}">
</div>