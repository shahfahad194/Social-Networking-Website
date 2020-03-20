
<script>
$(document).ready(function(){
	
$('.btn.btn-primary').click(function(){
var coment= $('#c').val();
var post_coment= $('.postid_comt');
var post_comment_id=post_coment.attr('id');
//alert(post_comment_id);
$.ajax({
	
	url:'comment.php',
	data:{	comment:1,
			comment_msj:coment,
			post_comment_id_sub:post_comment_id
			
			},
	type:'POST',
	success:function(data){
	$('#c').val("");
	
	}
	
});
});

});

	
	
	
//Dlete for ajax


$(function(){
	
	$(".delete").click(function() {
		var element=$(this);
		var userid=element.attr("id");
		$.ajax({
				
				url:'comment.php',
				type:'POST',
				data:{
					save:1,
					a:userid
				},
				
				success: function (){
					
				}
				
			});
		$(this).parent().parent().fadeOut(300,function (){
			$(this).remove();
		});
		
		return false;
	});
		

	
	
});	




//for refresh
//setInterval(function(){
		
	//	$("#show_comment").load("comment_load.php");	

		//},1000);

</script>