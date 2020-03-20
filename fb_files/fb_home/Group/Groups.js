//descrption update
$(document).ready(function(){
	$('.btn.btn-add-save-desc').click(function(){
	
	var g_desc= $("#group_desc").val();
	var g_id= $("#group_id").val();
	
	if(g_desc !=""){
	
		$.ajax({
			
			url:'Groups.php',
			data:{	update:1,
					
					group_desc:g_desc,
					group_id:g_id,
					
					},
			type:'POST',
			success:function (){
				//location.reload();
			}
		});
	}

	});

	});


//join
$(document).ready(function(){
	$('.btn.btn-join-request').click(function(){
	var g_id= $("#group_join-leave").val();
	
	
		$.ajax({
			
			url:'Groups.php',
			data:{	join:1,
					group_id:g_id
					
					},
			type:'POST',
			success:function (){
				
			}
		});
	});

	});
	
//leavegroup	
$(document).ready(function(){
	$('.btn.btn-leavegroup').click(function(){
	var g_id= $("#group_join-leave").val();
	
	
		$.ajax({
			
			url:'Groups.php',
			data:{	leave:1,
					group_id:g_id
					
					},
			type:'POST',
			success:function (){
				//location.reload();
				
			}
		});
	});

	});


//add Member
function addmember(){
		
		$.ajax({

			url:'Add_member.php',
			type:'GET',
			success: function (data){
				$('#addmember').html(data);
				
				$("#Discussion").slideUp();
				$("#member").slideUp();
				$("#Group_Photo").slideUp();
				//$("#vedio").slideUp();
				//$("").fadeIn('slow');
				//$("").fadeIn('slow');
				$("#group_details,#addmember,#upload_mobile_h").slideDown('slow');
			}
		});
	}


//post disscuss
function Discussion(){
	
		$.ajax({

			url:'Group_Post.php',
			type:'GET',
			success: function (data){
				$('#Discussion').html(data);
				
				$("#addmember,#member,#Group_Photo").slideUp('slow');
				$("#group_details,#Discussion,#upload_mobile_h").slideDown('slow');
			}

		});

	}

//Member
function member(){
	
		$.ajax({

			url:'Member.php',
			type:'GET',
			success: function (data){
				$('#member').html(data);
				
				$("#addmember,#Discussion,#Group_Photo").slideUp('slow');
				$("#group_details,#member,#upload_mobile_h").slideDown('slow');
			}

		});

	}
	
//Group_Photo	
function Group_Photo(){
	
		$.ajax({

			url:'Group_Photo.php',
			type:'GET',
			success: function (data){
				$('#Group_Photo').html(data);
				
				$("#Discussion,#addmember,#upload_mobile_h,#group_details,#member").slideUp('slow');
				$("#Group_Photo").slideDown('slow');
			}

		});

	}
//for descrpition add and hide
$(document).ready(function(){
	$('.btn.btn-add-desc').click(function (){
	$('#descptn').slideDown("slow");

	});
	});
$(document).ready(function(){
	$('.btn.btn-cancel').click(function (){
	$('#descptn').slideUp("slow");

	});
	});	

//for search


