$( document ).ready(function() {
	/* Talks */
	function resizeWindow(){
		$('.talk').height("auto");
		$('.talk h1').height("auto");

		var width = $(window).width() / parseFloat($("body").css("font-size"));
		if (width >= 42.5 && width < 68.75){
			setTalkHeight(2);
		}else if (width >= 68.75){
		  setTalkHeight(3);
		}
		
		if ($(window).width() >= 500){
			$("#mobileWrapperOuter").show();
		}else{
			$("#mobileWrapperOuter").hide();
		}
	}
	
	function setTalkHeight(cols){
		var maxHeightDiv = 0;
		var maxHeightText = 0;
		var firstIndex = 0;
		
		for (var i = 0; i < $('.talk h1').length; i++) {
			if (maxHeightText == 0){
				 firstIndex = i;
			}
			var divElem 	= $('.talk').eq(i);
			console.log(divElem);
			var textElem 	= $('.talk h1').eq(i);
			maxHeightText 	= maxHeightText > textElem.height() ? maxHeightText : textElem.height();
			maxHeightDiv 	= maxHeightDiv > divElem.height() ? maxHeightDiv : divElem.height();
			
			if ((i+1) % cols === 0  ){
				for (var j = firstIndex; j <= i; j++) {
					$('.talk').eq(j).height(maxHeightDiv + 10);
					$('.talk h1').eq(j).height(maxHeightText);
				}
				maxHeightDiv = 0;
				maxHeightText = 0;
			}
		}
		if (maxHeightText != 0){
			for (var j = firstIndex; j <= i; j++) {
				$('.talk').eq(j).height(maxHeightDiv);
				$('.talk h1').eq(j).height(maxHeightText);
			}
		}
	}
	
	resizeWindow();

	$(window).on('resize', function(){
		resizeWindow();
	});
	
	/* Contact Us */
	$( document ).on( "click", "#submitButton", function(event) {
		event.preventDefault();
		 var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 var phoneRegex = /^(0[1-9](([0-9]\s?[0-9]{8})|([0-9]{2}\s?[0-9]{7})|([0-9]{3}\s?[0-9]{6})))$/;
		 
		var valid = true;
		$("input").removeClass("errorClass");
		$("textarea").removeClass("errorClass");

		if (($.trim($("#name").val())=='') || ($.trim($("#name").val())==$("#name").attr('placeholder')) ){
			valid = false;
			$("#name").addClass("errorClass");
		}
		
		if (($.trim($("#email").val())=='')|| ($.trim($("#email").val())==$("#email").attr('placeholder')) ){
			valid = false;
			$("#email").addClass("errorClass");
		}
		else if (emailRegex.test($("#email").val()) == false){
			valid = false;
			$("#email").addClass("errorClass");
		}
		
		if (($.trim($("#message").val())=='')  || ($.trim($("#message").val())==$("#message").attr('placeholder')) ) {
			valid = false;
			$("#message").addClass("errorClass");
		}
		
		if (valid == true)
		{
			$("#responseDiv").html('<img src="img/spinner.gif" id = "spinner" alt="Please wait..." />');	
			var data ={
				name : $("#name").val(),
				email : $("#email").val(),
				message :  $("#message").val()
			};
			
			$.ajax({
				type: "POST",
				url: "sendEmail.php",
				data: data,
				success: function(){
					$.each(  $("[placeholder]"), function() {
						var input = $(this);	
						if (input.hasClass("placeholder")){
							input.val(input.attr('placeholder'));
						}
						else{
							input.val("");
						}
					});
					$("#responseDiv").html("<div class='successful'>Message sent successfully</div>"); 
				},
				error: function (ajaxContext) {
				   $("#responseDiv").html(ajaxContext.responseText);
				}
			});                   
		}
		else{
			$("#responseDiv").html("Please ensure all fields are filled out correctly before submitting");	
		}
		
	});
	
	$( document ).on( "keypress", "input", function() {
		$(this).removeClass("errorClass");		
	});
	
	$( document ).on( "keypress", "textarea", function() {
		$(this).removeClass("errorClass");		
	});
	
	
	/* Mobile menu */
	$(document).on('click','.internal-header nav li a',function() {
		if ($("#closeIcon").is(":visible")){
			$("#mobileWrapperOuter").hide();
		}
	});
	
	$(document).on('click','#mobileIcon',function() {
		$("#mobileWrapperOuter").show();
	});
	
	$(document).on('click','#closeIcon',function() {
		$("#mobileWrapperOuter").hide();
	});
	
	
	/* Misc */
	$(document).on('click','.newWindow',function(e) {
		e.preventDefault();
		window.open($(this).attr('href'));
	});
});