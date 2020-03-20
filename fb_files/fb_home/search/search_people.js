$(document).ready(function(){
	
	$("#search").keyup(function (){
		var x=$("#search").val();
		
		if(x==""){
			$("#here").slideUp("fast");
			
		}
		else
		{
		
			$("#here").slideDown("fast");
			var x=$("#search").val();
			
			$.ajax({
				url:'../search/Search.php',
				data:'q='+x,
				type:'GET',
				success:function (data){
					$("#here").html(data);
				}
				
			});
		}
	});
	
	
}); 

