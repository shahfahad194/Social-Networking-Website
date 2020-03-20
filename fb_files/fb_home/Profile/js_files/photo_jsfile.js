//profile photos			
				$(document).ready(function(){
					$("#profile").click(function(){
						$("#cover_p").fadeOut("fast");
						$("#timeline").fadeOut("fast");
						$("#profile").fadeOut("fast",function(){
							$("#hide_profile").fadeIn("slow");	
						});
					
					}) ;
					 
				});
//Cover photos
				
				$(document).ready(function(){
					$("#cover_p").click(function(){
						$("#profile").fadeOut("slow");
						$("#timeline").fadeOut("slow");
						$("#cover_p").fadeOut("fast",function(){
							
							$("#hide_cover").fadeIn("slow");	
						});
					
					}) ;
					 
				});
				
	//Timeline photos
				
				$(document).ready(function(){
					$("#timeline").click(function(){
							$("#profile").fadeOut("slow");
							$("#cover_p").fadeOut("slow");
						$("#timeline").fadeOut("fast",function(){
							
							$("#hide_timeline").fadeIn("slow");	
						});
					
					}) ;
					 
				});
							
		//back work		
					$(document).ready(function(){
					$("#back_timeline").click(function(){
							
						$("#hide_timeline").fadeOut("fast",function(){
							$("#profile").fadeIn("slow");
							$("#cover_p").fadeIn("slow");
							$("#timeline").fadeIn("slow");	
						});
					
					}) ;
					 
				});
				
	/////
	
				$(document).ready(function(){
					$("#back_cover").click(function(){
							
						$("#hide_cover").fadeOut("fast",function(){
							$("#profile").fadeIn("slow");
							$("#cover_p").fadeIn("slow");
							$("#timeline").fadeIn("slow");	
						});
					
					}) ;
					 
				});
	/////
	
				$(document).ready(function(){
					$("#back").click(function(){
							
						$("#hide_profile").fadeOut("fast",function(){
							$("#profile").fadeIn("slow");
							$("#cover_p").fadeIn("slow");
							$("#timeline").fadeIn("slow");	
						});
					
					}) ;
					 
				});			
				