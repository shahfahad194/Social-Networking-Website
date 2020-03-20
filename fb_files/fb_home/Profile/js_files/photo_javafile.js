		//profile photos			
				$(document).ready(function(){
					$("#profile").click(function(){
						$("#cover_p").delay(500).slideUp("slow");
						$("#timeline").delay(100).slideUp("slow");
						$("#profile").delay(800).slideUp("slow",function(){
							$("#hide_profile").delay(500).slideDown("slow");	
						});
					
					}) ;
					 
				});
//Cover photos
				
				$(document).ready(function(){
					$("#cover_show").click(function(){
						$("#profile").delay(800).slideUp("slow");
						$("#timeline").delay(100).slideUp("slow");
						$("#cover_p").delay(500).slideUp("slow",function(){
							
							$("#hide_cover").delay(500).slideDown("slow");	
						});
					
					}) ;
					 
				});
				
	//Timeline photos
				
				$(document).ready(function(){
					$("#timeline_show").click(function(){
							$("#profile").delay(800).slideUp("slow");
							$("#cover_p").delay(500).slideUp("slow");
						$("#timeline").delay(100).slideUp("slow",function(){
							
							$("#hide_timeline").delay(500).slideDown("slow");	
							
						});
					
					}) ;
					 
				});
							
		//back work		
					$(document).ready(function(){
					$("#back_timeline").click(function(){
							
						$("#hide_timeline").slideUp("slow",function(){
							$("#profile").delay(100).slideDown("slow");
							$("#cover_p").delay(500).slideDown("slow");
							$("#timeline").delay(800).slideDown("slow");	
						});
					
					}) ;
					 
				});
				
		
	/////
	
				$(document).ready(function(){
					$("#back_cover").click(function(){
							
						$("#hide_cover").slideUp("slow",function(){
							$("#profile").delay(100).slideDown("slow");
							$("#cover_p").delay(500).slideDown("slow");
							$("#timeline").delay(800).slideDown("slow");	
						});
					
					}) ;
					 
				});
	/////
	
				$(document).ready(function(){
					$("#back").click(function(){
							
						$("#hide_profile").slideUp("slow",function(){
							$("#profile").delay(100).slideDown("slow");
							$("#cover_p").delay(500).slideDown("slow");
							$("#timeline").delay(800).slideDown("slow");	
						});
					
					}) ;
					 
				});			
				
		