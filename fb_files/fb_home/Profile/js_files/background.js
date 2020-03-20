	//setInterval(function(){abc()},20000);
		$(document).ready(function(){
					$("#edit_cover").click(function (){
						$("#dialouge").fadeIn("fast",function (){
							$("#cover_add").slideDown("slow");	
						});
					
					}) ;
					 
				});
				
				
				$(document).ready(function(){
					$("#uplod_back").click(function(){
							$("#dialouge").fadeOut("slow");	
							$("#cover_add").fadeOut("slow");	
						
					
					}) ;
					 
				});
	//For Profile
	
	
	$(document).ready(function(){
					$("#edit_profile").click(function (){
						$("#dialouge_2").fadeIn("fast",function (){
							$("#cover_add_2").slideDown("slow");	
						});
					
					}) ;
					 
				});
				
				
				$(document).ready(function(){
					$("#uplod_back_2").click(function(){
							$("#dialouge_2").fadeOut("slow");	
							$("#cover_add_2").fadeOut("slow");	
						
					
					}) ;
					 
				});
				
				
	//for chat work
			
			$(document).ready(function(){
				$("#chatbox").click(function(){
				$("#chat").fadeToggle("slow");
				$("#status").fadeIn("slow");
				
				});
			});
						