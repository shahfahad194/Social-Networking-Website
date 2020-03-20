<?php
include("../../../connection/conect.php");
//error_reporting(0);

?>
<?php
if(isset($_GET['id']))
		$id=$_GET['id'];

//session_start();
		if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];
	$row_user=$mysqli->query("select * from users where Email='$user'");
		$fetch_user=$row_user->fetch_array();
			$uid_user=$fetch_user['user_id'];
			$name_user=$fetch_user['Name'];
			$gender_user=$fetch_user['Gender'];
			
			//fcth 2nd for pic
		$row2user=$mysqli->query("select * from  user_profile_pic where user_id='$uid_user'");
		$fetch2user=$row2user->fetch_array();
			$image_user=$fetch2user['image'];
			
	///for profile pic user 		
		$row1=$mysqli->query("select * from users where user_id='$id'");
		$fetch1=$row1->fetch_array();
			$uid_fbs=$fetch1['user_id'];
			$name_fbs=$fetch1['Name'];
			$email_fbs=$fetch1['Email'];
			$gender_fbs=$fetch1['Gender'];
			
			//fcth 2nd for pic
		$row2=$mysqli->query("select * from  user_profile_pic where user_id='$id'");
		$fetch2=$row2->fetch_array();
			$imagefbs=$fetch2['image'];
		$row3=$mysqli->query("select * from  user_post where user_id='$uid_fbs'");
			$fetch3=$row3->fetch_array();
				$post_picf=$fetch3['post_pic'];

		
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
	<meta charset='utf-8'>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!--<link rel="stylesheet" href="css/background.css">-->
	  <script src="js_files/jquery.js"></script>
	  <script src="js_files/background.js"></script>
	  <script src="../bootstrap/js/bootstrap.js"></script>
	  <script src="../bootstrap/js/bootstrap.min.js"></script>

	</head>
<script>
$(document).ready(function(){
$('.glyphicon.glyphicon-globe').click(function(){
$('#notify').fadeToggle("slow");
});

});
//message_notification
$(document).ready(function(){
	$('#msj_click').click(function(){
		$('#message_notification').fadeToggle("slow");
	});

});
</script>	
	<style>
	
*{
	margin:0px;
	padding:0px;
	
}

#main{
	background:transparent;
	width:80%;
	float:left;
	height:auto;
	z-index:1000;
	padding:20px;
	margin:33px 0px 0px 0px;
}
#right_nav{
	width:18%;
	min-height:10000px;
	/*background:#f5f5f5;*/
	background:transparent;
	position:fixed;
	float:right;
	left:82%;
	top:;
	border-left-style:groove;
	max-height:auto;
	border-color:white;
	border-width:thin;
	
	

}
#cover_div{
	background:;
	width:100%;
	height:350px;
	float:left;
	margin:33px 0px 0px 0px;
	border-style:solid;
	border-width:thin;
	border-color:lightgray;
	float:left;
	z-index:1000;
	border-radius:4px;

}
#cover{
	background:lightgray;
	width:100%;
	height:250px;
	float:left;
	margin:0px 0px 0px 0px;
	border-bottom-style:solid;
	border-width:thin;
	border-bottom-color:white;
	float:left;
	z-index:1000;
}

#cover_button{
		display:none;
	}
	
#cover_div:hover #cover_button{
		display:block;
		cursor:pointer;
		padding:5px;
		
	}

#Profile_pic{
	width:13%;
	height:170px;
	background:;
	position:absolute;
	z-index:1000;
	margin:160px 0px 0px 10px;
	border-style:solid;
	border-width:thin;
	border-color:white;
	box-shadow:0px 0px 25px black;
	float:left;
	overflow:hidden;
	
	
}
#add_profile_pic{
	width:100%;
	height:170px;
	-webkit-transition: transform 1s linear; 
	-webkit-transition-timing-function:linear;
	position:relative;
	z-index:1000;
	background:black;
	margin:170px 0px 0px 0px;
	float:left;
	position:absolute;
	opacity:0.7;
}
#edit_profile_cover{
	z-index:1000;
	width:100%;
	height:70px;
	background:#00300a;
	position:absolute;
	margin:90px 0px 0px 0px;
	color:white;
	text-transform:capitalize;
	font-family:Lucida Calligraphy;
	font-weight:bolder;
	text-align:center;
	line-height:30px;
	font-size:19px;
	box-shadow:0px 0px 25px white;
	
	
}
#Profile_pic:hover #add_profile_pic{
	display:block;
	-webkit-transform:translateY(-175px);
	
	}

#pro_name{
	width:auto;
	height:auto;
	max-width:40%;
	overflow:hidden;
	z-index:0;
	margin:0px 0px 0px 190px;
	float:left;
	background:;
	padding:10px;
	
	
}
#line{
	width:auto;
	height:97px;
	background:;
	
	z-index:1000;
	margin:0px 0px 0px 5px;
	float:left;
	
}
#line_mob{ display:none;}
#main #line table tr td{
	border-left-style:groove;
	border-right-style:groove;
	border-color:white;
	border-width:thin;	
	padding:15px;
	}

#main #line table tr td a{
		
	text-decoration:none;
	
	}
#dialouge{
	width:100%;
	height:500%;
	background:black;
	opacity:0.9;
	position:absolute;
	z-index:1000;
	display:none;
}
#cover_add{
	width:50%;
	height:200px;
	background:;
	margin:20% 0px 0px 27%;
	background-image:url(image/dragon.jpg);
	border:groove;
	display:none;
	box-shadow:0px 0px 25px white;
}

#dialouge_2{
	width:100%;
	height:500%;
	background:black;
	opacity:0.9;
	position:absolute;
	z-index:1000;
	display:none;
}
#cover_add_2{
	width:50%;
	height:200px;
	background:;
	margin:20% 0px 0px 27%;
	background-image:url(image/dragon.jpg);
	border:groove;
	display:none;
	box-shadow:0px 0px 25px white;
}


#chat{
	width:100%;
	height:auto;
	background:transparent;
	float:left;
	border:;
	border-color:lightgray;
	border-width:thin;
	display:;
	overflow:auto;
	z-index:1000;

	
}
#chatbox{
	width:100%;
	height:40px;
	background:;
	
	float:left;
	border:groove;
	border-color:;
	border-width:thin;
	text-align:center;
	padding:10px;
	font-weight:bolder;
	font-size:17px;
	font-family:serif;
	z-index:1000;

}
input[type=search] {
    width: 150px;
	height:40px;
	margin:5px 0px 0px 30px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url(../image/srh.PNG);
	background-size:30px;
    background-position: 10px 2px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 50px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=search]:focus {
    width: 35%;
	
}	
	/* Scrollbar styles */
	::-webkit-scrollbar {
	width: 10px;
	height: 12px;
	}

	::-webkit-scrollbar-track {
	box-shadow: inset 0 0 10px gray;
	border-radius: 10px;
	}

	::-webkit-scrollbar-thumb {
	border-radius: 10px;
	background: white; 
	box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
	}

	::-webkit-scrollbar-thumb:hover {
	background: #3b5998;
	}
	
#notify{
		width:34%; min-height:auto;
		max-height:400px;
		display:none;
		overflow:auto;
		border:1px white solid; 
		background:white;
		top:80%; 
		border-radius:5px 5px 5px 5px; 
		position:absolute; left:60%;
		z-index:1000; color:red; 
		float:left;		
		fixed:top; 
		margin:10px 20px 0px 0px;
	}
#message_notification{
		width:34%; height:100px;
		display:none;
		overflow:auto;
		border:1px white solid; 
		background:lightgray;
		top:80%;  left:65%;
		border-radius:5px 5px 5px 5px; 
		position:absolute;
		z-index:1000; color:red; 
		float:left;		
		fixed:top; 
		margin:10px 20px 0px 0px;
	}

#here_srch
{
	width:34%;
	height:auto;
	max-height:300px;
	overflow:auto;
	position:absolute;
	left:18%;
	top:85%;
	display:none;
	z-index:1000;	
	background:white;
	border: 2px solid #ccc;
	font-family:algerian;
	color:#3B5998;
	padding:10px;
	
}
#games{
	width:100%;
	background:gray;
	height:150px;
	float:left;
}	
 .navbar-header a{  font-size:2.0em;}
.container-fluid_2{display:none;}
	 li{font-family:serif;}
.container-fluid_2{display:none;}
li{font-family:serif;}




/* mobile size*/


@-ms-viewport {
		width: device-width;
	}

	body {
		-ms-overflow-style: scrollbar;
	}
	
@media screen and (max-width:2560px) 
	{
	body{margin:0px;padding:0px;background:; }

	}	
	
@media screen and (max-width: 1680px) 
	{
		body{margin:0px;padding:0px;background:;}	
		.navbar-header a{ margin-top:0px;  font-size:2.2em; }
		#pro_name{text-align:center; width:auto; max-width:40%; float:left; overflow:hidden;  margin:20px 0px 0px 210px; }
		#here_srch::-webkit-scrollbar {width:0px; height:0px;}
		#notify::-webkit-scrollbar {width:0px; height:0px;}
		#here_srch
			{
				width:34%;
				height:auto;
				max-height:300px;
				overflow:auto;
				position:absolute;
				left:16.1%;
				top:85%;
				display:none;
				z-index:1000;	
				background:white;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:10px;
				
			}
	
	}
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#pro_name{text-align:center; width:auto; max-width:40%; float:left; overflow:hidden;  margin:20px 0px 0px 190px; }
		
		#here_srch
			{
				width:34%;
				height:auto;
				max-height:300px;
				overflow:auto;
				position:absolute;
				left:19.1%;
				top:85%;
				display:none;
				z-index:1000;	
				background:white;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:10px;
				
			}
			#here_srch::-webkit-scrollbar {width:0px; height:0px;}
			
			#notify::-webkit-scrollbar {width:0px; height:0px;}

	}		

@media (max-width:1024px) 
	{
		body{margin:0px;padding:0px;background:;}	
		.navbar.navbar-default.navbar-fixed-top{float:left; width:100%; height:100px; font-size:20px;}
		.navbar.navbar-default.navbar-fixed-top ul{ diplay:block; width:auto; margin-top:;}
		.container-fluid{ width:100%; height:100px; float:left;font-size:20px;background:;}
		.container-fluid form{margin-top:10px; }
		.navbar-header{ width:auto; font-size:20px; float:left;background:;}
		.navbar-header a{ margin-top:0px;  font-size:1.1em; }
		.nav.navbar-nav{display:none;}
		.head_srch{display:; }
		#head_pic{display:none;}
		
		.container-fluid_2{display:block;margin-top:10px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:white;}
		.container-fluid_2 table tr td{text-align:center; padding-top:10px; }
		input[type=search]:focus{width:40%; height:10px;}
		input[type=search] {
		width: 20%;
		height:15px;
		margin:2px 0px 0px 10px;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		font-size: 18px;
		background-color: white;
		 background-image: url(../image/srh.PNG);
		background-size:18px;
		background-position: 10px 2px;
		background-repeat: no-repeat;
		padding: 12px 20px 12px 40px;
	   }
	   
	   
		
		#main{width:100%; padding:0px; margin-top:100px; background:;}
		
		#right_nav{display:none;}
		
		#cover_div{width:100%; float:left; margin:0px; background:;}
		
		#Profile_pic{width:25%; margin:160px 0px 0px 350px; float:left;}
		
		#add_profile_pic{font-size:20px;}
		
		#pro_name{text-align:center; width:auto; max-width:40%; float:right; overflow:hidden;  margin:20px 190px 0px 0px; }
		
		
		
		#line { display:none;}
		
		#line_mob{width:100%;font-size:21px; display:block; border:solid 1px white;}
		#line_mob a{text-decoration:none; }
		

		#cover_add{width:100%; margin:250px 0px 0px 0px;}
		#cover_add_2{width:100%; margin:250px 0px 0px 0px;}
		
		#here_srch
		{
			width:100%;
			height:auto;
			position:relative;
			margin:auto;
			top:0px;
			left:0px;
			display:none;
			z-index:1000;	
			background:white;
			border: 2px solid #ccc;
			font-family:algerian;
			color:#3B5998;
			padding:10px;
		
		}
	
		#notify{
			width:100%;
			height:auto;
			display:none;
			overflow:auto;
			border:1px white solid; 
			background:lightgray;
			position:relative;
			margin:0px;
			padding:0px;
			top:0px;
			left:0px;
			border-radius:5px 5px 5px 5px; 
			z-index:1000; 
			color:; 
			float:left;
			font-size:17px;			
		}  
		
		#edit_profile_cover{font-size:1.2em; font-family:Lucida Calligraphy;}
		#chatbox{display:none;}
		
		::-webkit-scrollbar {width: 0px;height: 0px;}
	}
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:;}	
		
		.navbar.navbar-default.navbar-fixed-top{float:left; width:100%; height:100px; font-size:20px;}
		.navbar.navbar-default.navbar-fixed-top ul{ diplay:block; width:auto; margin-top:;}
		.container-fluid{ width:100%; height:100px; float:left;font-size:20px;background:;}
		.container-fluid form{margin-top:10px; }
		.navbar-header{ width:auto; font-size:20px; float:left;background:;}
		.navbar-header a{ margin-top:0px;  font-size:1.1em; }
		.nav.navbar-nav{display:none;}
		.head_srch{display:; }
		#head_pic{display:none;}
		
		.container-fluid_2{display:block;margin-top:10px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:white;}
		.container-fluid_2 table tr td{text-align:center; padding-top:10px; }
		input[type=search]:focus{width:50%; height:10px;}
		input[type=search] {
		width: 20%;
		height:15px;
		margin:2px 0px 0px 10px;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		font-size: 18px;
		background-color: white;
		 background-image: url(../image/srh.PNG);
		background-size:18px;
		background-position: 10px 2px;
		background-repeat: no-repeat;
		padding: 12px 20px 12px 40px;
	   }
	   
	   
		
		#main{width:100%; padding:0px; margin-top:100px; background:;}
		
		#right_nav{display:none;}
		
		#cover_div{width:100%; float:left; margin:0px; background:;}
		
		#Profile_pic{width:25%; margin:160px 0px 0px 300px; float:left;}
		#add_profile_pic{font-size:20px;}
		#pro_name{text-align:center; width:auto; max-width:40%; float:left; overflow:hidden;  margin:20px 0px 0px 80px; }
		
		
		
		#line { display:none;}
		
		#line_mob{width:100%;font-size:20px; display:block; border:solid 1px white;}
		#line_mob a{text-decoration:none; }
		

		#cover_add{width:100%; margin:250px 0px 0px 0px;}
		#cover_add_2{width:100%; margin:250px 0px 0px 0px;}
		
		#here_srch
		{
			width:100%;
			height:auto;
			position:relative;
			margin:auto;
			top:0px;
			left:0px;
			display:none;
			z-index:1000;	
			background:white;
			border: 2px solid #ccc;
			font-family:algerian;
			color:#3B5998;
			padding:10px;
		
		}
	
		#notify{
			width:100%;
			height:auto;
			display:none;
			overflow:auto;
			border:1px white solid; 
			background:lightgray;
			position:relative;
			margin:0px;
			padding:0px;
			top:0px;
			left:0px;
			border-radius:5px 5px 5px 5px; 
			z-index:1000; 
			color:; 
			float:left;
			font-size:15px;			
		}  
		
		#edit_profile_cover{font-size:1.2em; font-family:Lucida Calligraphy;}
		#chatbox{display:none;}
		
		::-webkit-scrollbar {width: 0px;height: 0px;}
	}	
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:;}		
		
		.navbar.navbar-default.navbar-fixed-top{float:left; width:100%; height:100px; font-size:20px;}
		.navbar.navbar-default.navbar-fixed-top ul{ diplay:block; width:auto; margin-top:;}
		.container-fluid{ width:100%; height:100px; float:left;font-size:20px;background:;}
		.container-fluid form{margin-top:10px; }
		.navbar-header{ width:auto; font-size:20px; float:left;background:;}
		.navbar-header a{ margin-top:0px;  font-size:0.9em; }
		.nav.navbar-nav{display:none;}
		.head_srch{display:; }
		#head_pic{display:none;}
		
		.container-fluid_2{display:block;margin-top:10px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:white;}
		.container-fluid_2 table tr td{text-align:center; padding-top:10px; }
		input[type=search]:focus{width:65%; height:10px;}
		input[type=search] {
		width: 25%;
		height:10px;
		margin:2px 0px 0px 10px;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		font-size: 17px;
		background-color: white;
		 background-image: url(../image/srh.PNG);
		background-size:18px;
		background-position: 10px 2px;
		background-repeat: no-repeat;
		padding: 12px 20px 12px 40px;
	   }
	   
	   
		
		#main{width:100%; padding:0px; margin-top:100px; background:;}
		
		#right_nav{display:none;}
		
		#cover_div{width:100%; float:left; margin:0px; background:;}
		
		#add_profile_pic{font-size:20px;}

		#Profile_pic{width:34%; margin:160px 0px 0px 200px; float:left;}
		
		#pro_name{text-align:center; width:auto; max-width:40%; float:left; overflow:hidden;  margin:20px 0px 0px 10px; }
		
		
		
		#line { display:none;}
		
		#line_mob{width:100%;font-size:19px; display:block; border:solid 1px white;}
		#line_mob a{text-decoration:none; }
		

		#cover_add{width:100%; margin:250px 0px 0px 0px;}
		#cover_add_2{width:100%; margin:250px 0px 0px 0px;}
		
		#here_srch
		{
			width:100%;
			height:auto;
			position:relative;
			margin:auto;
			top:0px;
			left:0px;
			display:none;
			z-index:1000;	
			background:white;
			border: 2px solid #ccc;
			font-family:algerian;
			color:#3B5998;
			padding:10px;
		
		}
	
		#notify{
			width:100%;
			height:auto;
			display:none;
			overflow:auto;
			border:1px white solid; 
			background:lightgray;
			position:relative;
			margin:0px;
			padding:0px;
			top:0px;
			left:0px;
			border-radius:5px 5px 5px 5px; 
			z-index:1000; 
			color:; 
			float:left;
			font-size:15px;			
		}  
		
		#edit_profile_cover{font-size:1.2em; font-family:Lucida Calligraphy;}
		#chatbox{display:none;}
		
		::-webkit-scrollbar {width: 0px;height: 0px;}
	}
	
	
	
@media (max-width:480px) 
	{
		body{margin:0px;padding:0px;background:;}	
		.navbar.navbar-default.navbar-fixed-top{float:left; width:100%; height:100px; font-size:20px;}
		.navbar.navbar-default.navbar-fixed-top ul{ diplay:block; width:auto; margin-top:;}
		.container-fluid{ width:100%; height:100px; float:left;font-size:20px;background:;}
		.container-fluid form{margin-top:10px; }
		.navbar-header{ width:auto; font-size:20px; float:left;background:;}
		.navbar-header a{ margin-top:0px;  font-size:0.8em; }
		.nav.navbar-nav{display:none;}
		.head_srch{display:; }
		#head_pic{display:none;}
		
		.container-fluid_2{display:block;margin-top:10px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:white;}
		.container-fluid_2 table tr td{text-align:center; padding-top:10px; }
		input[type=search]:focus{width:60%; height:10px;}
		input[type=search] {
		width: 20%;
		height:10px;
		margin:2px 0px 0px 10px;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		font-size: 16px;
		background-color: white;
		 background-image: url(../image/srh.PNG);
		background-size:18px;
		background-position: 10px 2px;
		background-repeat: no-repeat;
		padding: 12px 20px 12px 40px;
	   }
	   
	   
		
		#main{width:100%; padding:0px; margin-top:100px; background:;}
		
		#right_nav{display:none;}
		
		#cover_div{width:100%; float:left; margin:0px; background:;}
		
		#add_profile_pic{font-size:15px;}

		#Profile_pic{width:40%; margin:160px 0px 0px 100px; float:left;}
		
		#pro_name{text-align:center; width:auto; max-width:40%; float:right; overflow:hidden;  margin:0px 0px 0px 0px; }
		
		
		
		#line { display:none;}
		
		#line_mob{width:100%;font-size:17px; display:block; border:solid 1px white;}
		#line_mob a{text-decoration:none; }
		

		#cover_add{width:100%; margin:250px 0px 0px 0px;}
		#cover_add_2{width:100%; margin:250px 0px 0px 0px;}
		
		#here_srch
		{
			width:100%;
			height:auto;
			position:relative;
			margin:auto;
			top:0px;
			left:0px;
			display:none;
			z-index:1000;	
			background:white;
			border: 2px solid #ccc;
			font-family:algerian;
			color:#3B5998;
			padding:10px;
		
		}
	
		#notify{
			width:100%;
			height:auto;
			display:none;
			overflow:auto;
			border:1px white solid; 
			background:lightgray;
			position:relative;
			margin:0px;
			padding:0px;
			top:0px;
			left:0px;
			border-radius:5px 5px 5px 5px; 
			z-index:1000; 
			color:; 
			float:left;
			font-size:15px;			
		}  
		
		#edit_profile_cover{font-size:1.2em; font-family:Lucida Calligraphy;}
		#chatbox{display:none;}
		
		::-webkit-scrollbar {width: 0px;height: 0px;}
	}
	
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:;}	
	.navbar.navbar-default.navbar-fixed-top{float:left; width:100%; height:100px; font-size:20px;}
	.navbar.navbar-default.navbar-fixed-top ul{ diplay:block; width:auto; margin-top:;}
	.container-fluid{ width:100%; height:100px; float:left;font-size:20px;background:;}
	.container-fluid form{margin-top:10px; }
	.navbar-header{ width:auto; font-size:20px; float:left;background:;}
	.navbar-header a{ margin-top:0px;  font-size:0.7em; }
	.nav.navbar-nav{display:none;}
	.head_srch{display:; }
	#head_pic{display:none;}
	
	.container-fluid_2{display:block;margin-top:10px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:white;}
	.container-fluid_2 table tr td{text-align:center; padding-top:10px; }
	input[type=search]:focus{width:60%; height:10px;}
	input[type=search] {
    width: 10%;
	height:10px;
	margin:2px 0px 0px 10px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
     background-image: url(../image/srh.PNG);
	background-size:18px;
    background-position: 10px 2px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
   }
   
   
	
	#main{width:100%; padding:0px; margin-top:100px; background:;}
	
	#right_nav{display:none;}
	
	#cover_div{width:100%; float:left; margin:0px; background:;}
	
			#add_profile_pic{font-size:13px;}

	#Profile_pic{width:40%; margin:160px 0px 0px 80px; float:left;}
	
	#pro_name{text-align:center; width:auto; max-width:40%; float:right; overflow:hidden;  margin:0px 0px 0px 0px; }
	
	
	
	#line { display:none;}
	
	#line_mob{width:100%;font-size:17px; display:block; border:solid 1px white;}
	#line_mob a{text-decoration:none; }
	

	#cover_add{width:100%; margin:250px 0px 0px 0px;}
	#cover_add_2{width:100%; margin:250px 0px 0px 0px;}
	
	#here_srch
	{
		width:100%;
		height:auto;
		position:relative;
		margin:auto;
		top:0px;
		left:0px;
		display:none;
		z-index:1000;	
		background:white;
		border: 2px solid #ccc;
		font-family:algerian;
		color:#3B5998;
		padding:10px;
	
	}
	
		#notify{
			width:100%;
			height:auto;
			display:none;
			overflow:auto;
			border:1px white solid; 
			background:lightgray;
			position:relative;
			margin:0px;
			padding:0px;
			top:0px;
			left:0px;
			border-radius:5px 5px 5px 5px; 
			z-index:1000; 
			color:; 
			float:left;		
			font-size:13px;
		}  
		
		#edit_profile_cover{font-size:1.2em; font-family:Lucida Calligraphy;}
		#chatbox{display:none;}
		
		::-webkit-scrollbar {width: 0px;height: 0px;}
	}


</style>
<body>
		<nav class="navbar navbar-default navbar-fixed-top" style="float:left;background:#3B5998;">
		  <div class="container-fluid" style='height:40px;'>
			<div class="navbar-header">
			  <a class="navbar-brand" href="#" style="text-shadow:0px 0px 25px black; font-family:Lucida Calligraphy; font-weight:bolder; color:white;">FriendsMe</a>
			
			</div>
				<form method="POST">
					<input type="search" class="head_srch" name="search" id='search' autocomplete='off' placeholder="Search People.." style='font-weight:bolder; float:left;' ></li>
					<!--<input type="submit"class="head_srch" name="submit" Value="Search" style='display:none;font-weight:bolder; float:left;  margin:0px 0px 0px 0px ;'class="btn btn.primary" ></li>-->
				</form>
				<ul class="nav navbar-nav" style="float:right; background:; ">
					<li style='float:; list-style:none; color:white; '><a href='Profile.php?id=<?php echo $uid_user;?>' style=' font-weight:bolder; color:white; text-transform:capitalize;'><?php echo $name_user;?></a></li>
					<li><a href='../Home/Home.php'><span class="glyphicon glyphicon-home .badge" title='HOME'  style="color:white; font-size:1.2em;"></span></a></li>
					<li><span class="glyphicon glyphicon-globe .badge" title='Notifacation'  style="color:white; margin-top:15px; margin-left:10px; cursor:pointer;font-size:1.2em;"></span></li>
					<li style="float:;"><a href="../Message/Msj.php?message_id=<?php echo $uid_fbs; ?>" id="msj_click"><span class="glyphicon glyphicon-comment .badge" title='Message' style="color:white;  margin-left:10px; font-size:1.2em;"></span></a></li> 
					<li><span class="glyphicon glyphicon-chevron-down" id="" style="color:white; margin:15px 0px 0px 15px; cursor:pointer; font-size:1.2em;"></span></li> 

				</ul>
					<li id="head_pic"style='list-style:none; color:white;'><a href='Profile.php?id=<?php echo $uid_user;?>' ><img src='<?php if($gender_user=='Male' || $gender_user=='Female'){echo"../../../fb_user/$gender_user/$user/Profile/$image_user";}?>' width='' height='35px' style='  box-shadow:0px 0px 25px lightblue; border-radius:3px; border:1px solid white; margin:5px 0px 0px 0px;float:right;'/></a></li>

				
		  </div>
		  		<div class="container-fluid_2" style="width:100%;height:50px;float:left;background:lightgray;">
				<table width='100%'>
					<td><a href='../Home/Home.php'><span class="glyphicon glyphicon-home .badge" title='HOME'  style="color:white; font-size:1.2em;"></span></a></td>
					<td><a href="../Message/Msj.php?message_id=<?php echo $uid_fbs; ?>" id="msj_click"><span class="glyphicon glyphicon-comment .badge" title='Message' style="color:white; font-size:1.2em;"></span></a></td> 
					<td><span class="glyphicon glyphicon-globe .badge" title='Notifacation'  style="color:white; cursor:pointer; font-size:1.2em;"></span></td>
					<td><a href="#" id=""><span class="glyphicon glyphicon-th-list" title='List' style="color:white; font-size:1.2em;"></span></a></td> 
					
				</table>
				</div>
				<div class="container-fluid" id='here_srch'></div>
				<div class="container-fluid" id=''><div id='notify'></div></div>
				<div class="container-fluid" id='message_notification'></div>	
		</nav>
		<div id="main">
			<div id="cover_div">
				<div id="cover">
					<?php
					//for cover
						if(isset($_POST['cover'])){
							$file_cover=$_FILES['file_cover']['name'];
							$folder=$_FILES['file_cover']['tmp_name'];
							$ext = pathinfo($file_cover, PATHINFO_EXTENSION);
							//$time= Date("g:i a");			
							if($file_cover !="")
							{
								if($_FILES['file_cover']['size']>2000)
								{
								if($ext =='jpg'|| $ext =='JPG')
								{
									move_uploaded_file($folder,"../../../fb_user/$gender_user/$user/Cover/$file_cover");
									$mysqli->query("insert into user_cover_pic (user_id,image) values ('$uid_user','$file_cover')");
							
								}else{echo"<script> alert('Error:Only JPG File are Accepted...!');</script>";}
								}else{echo"<script> alert('Error:The File Size is Grather Than 2MB...!');</script>";}
							}
						}
						
						//for Profile
						if(isset($_POST['Profile'])){
							$file_Profile=$_FILES['file_Profile']['name'];
							$folder=$_FILES['file_Profile']['tmp_name'];
							$ext = pathinfo($file_Profile, PATHINFO_EXTENSION);
							$time= Date("g:i a");			
							if($file_Profile !="")
							{
								if($_FILES['file_Profile']['size']>2000)
								{
								if($ext =='jpg'|| $ext =='JPG')
								{
									move_uploaded_file($folder,"../../../fb_user/$gender_user/$user/Profile/$file_Profile");
									$mysqli->query("insert into user_profile_pic (user_id,image,date) values ('$uid_user','$file_Profile','$time')");
								}else{echo"<script> alert('Error:Only JPG File are Accepted...!');</script>";}
								}else{echo"<script> alert('Error:The File Size is Grather Than 2MB...!');</script>";}
							}
						}
						
						?>
						<?php
						$coer=$mysqli->query("select *  from user_cover_pic where user_id='$id'");
							
							while($ic=$coer->fetch_array()){
								
								$cv=$ic['image'];
							
							}
							if(@$cv =="" ){echo"<img src='../image/my_videos.png' width='auto' height='auto' style='z-index:1000; margin:50px 0px 0px 45%;'/>";}	
							else{echo"<img src='../../../fb_user/$gender_fbs/$email_fbs/Cover/$cv' width='100%' height='100%' style='z-index:1000;'/>";}
						?>
				</div>
				<!----profile area--------------->
				<div id="Profile_pic">

				<?php if ($user==$email_fbs){?>
					<div id='add_profile_pic'>
						<div id='edit_profile_cover'> 
							<a href='#' id='edit_profile' style='text-decoration:none; color:white;'>edit profile</a> <br /> 
							<a href='#' id='edit_cover' style='text-decoration:none; color:white;'>edit cover</a>
						</div>
					</div>
				<?php }?>	
					<?php 
						
						$profile=$mysqli->query("select *  from user_profile_pic where user_id='$id'");
							
							while($ip=$profile->fetch_array()){
								
								$ppic=$ip['image'];
							
							}
					
					if($gender_fbs=='Male' || $gender_fbs=='Female'){echo"<img src='../../../fb_user/$gender_fbs/$email_fbs/Profile/$ppic'  height='169px' style=' width:100%; box-shadow:0px 0px 25px black; ' />";}?>
				</div>
					<div id="pro_name"><a href='Profile.php?id=<?php echo $id;?>' style='color:black;'><p style="text-align:center; text-shadow:0px 0px 15px black; color:white; font-size:1.6em;text-transform:capitalize; font-family:Lucida Calligraphy; z-index:0;font-weight:bolder;"><?php echo $name_fbs;?></a></p></div>
					<div id="line">
						<table border="0" width='100%;' height='97px' style='text-align:center;  font-family:Algerian; text-decoration:none;text-transform:capitalize;'>
							<tr>
								<td style="border-left-style:groove; "><a href="Profile.php?id=<?php echo  $id;?>">timeline</a></td>
								<td><a href="about.php?id=<?php echo  $id;?>">about</a></td>
								<td><a href="Photo.php?id=<?php echo  $id;?>">photos</a></td>
								<?php if($user != $email_fbs){?>
								<td style='width:auto;'id="friend_req"></td>
								<?php } ?>
						</table>
					</div>
			</div>
			<div id="line_mob">
				<?php if($user != $email_fbs){?>
						<p style='float:left; width:100%; font-family:Algerian; text-align:center;padding:10px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:white;' id="friend_req_mob"></p>
				<?php } ?>
				<table border="0" width='100%;' height='97px' style='text-align:center;  font-family:Algerian; text-decoration:none;text-transform:capitalize;'>
					<tr>
						<td style="border-left-style:groove; "><a href="Profile.php?id=<?php echo  $id;?>">timeline</a></td>
						<td><a href="about.php?id=<?php echo  $id;?>">about</a></td>
						<td><a href="Photo.php?id=<?php echo  $id;?>">photos</a></td>
						
				</table>
				
			</div>	
		</div>

<!----profile area end--------------->
<!-----------dailouge box--------------------------->	
	<div id="dialouge" style="">
		<div id="cover_add">
			<img src="image/delete.png"	 id="uplod_back"style="float:right; cursor:pointer;"/>
			<div style="background: #3b5998; width:100%; height:30px; color:white; font-family:Algerian; font-weight:bolder; font-size:20px;">Upload Cover Picture</div>
			<?php if ($user==$email_fbs){ ?> 
				<form method="POST" enctype="multipart/form-data">
					<table width="80%" style=" color:white; margin:10% 0px 0px 5%;">
						<tr>
							<td ><input type='file'   name='file_cover' required ></td>
							<td><input type='submit' name='cover' Value='POST'  style='width:100%;  background:#3B5998;  color:white; height:30px; border-radius:3px; font-weight:bolder;font-family:serif;'></td>
						</tr>
					</table>
				</form>
			<?php } ?>
		</div>
	</div>
	<!-----------profile form-------->
	<div id="dialouge_2" style="">
		<div id="cover_add_2">
			<img src="image/delete.png"	 id="uplod_back_2"style="float:right; cursor:pointer;"/>
			<div style="background:#3b5998; width:100%; height:30px; color:white; font-family:Algerian;font-weight:bolder; font-size:20px;">Upload Profile Picture</div>
			<?php if ($user==$email_fbs){ ?> 
				<form method="POST" enctype="multipart/form-data">
					<table width="80%" style=" color:white; margin:10% 0px 0px 5%;">
						<tr>
							<td ><input type='file'   name='file_Profile' required ></td>
							<td><input type='submit' name='Profile' Value='POST'  style='width:100%;  background:#3B5998;  color:white; height:30px; border-radius:3px; font-weight:bolder;font-family:serif;'></td>
						</tr>
					</table>
				</form>
			<?php } ?>
		</div>
	</div>
	<!-------end form profile----------->
	
<!-----------end all work of dialouge box----------------------------------->

<!-----------dailouge box for picture--------------------------->	
			<div id='right_nav'>
				<div id='games'>fdfdsfkdskfhkh</div>
				<!--<div id="chatbox"><span class="glyphicon glyphicon-user .badge" class="badge" style="color:gray; font-size:1.2em;"><img src="../image/online_symbol.png" style="padding:5px; border-radius:10px;"/>Online(<?php //echo $count_status;?>)</span></div>-->
				<div id="chat"><?php include("../Message/chatlist.php");?></div>
			</div>
			
			
	

</body>
</html>
<script>		
function friend(){

	$.ajax({

		url:'friend_request.php',
		type:'GET',
		success: function (data){

		$('#friend_req').html(data);
		//friend();
		}

	});

}
friend();

function friend_mob(){

	$.ajax({

		url:'friend_request.php',
		type:'GET',
		success: function (data){

		$('#friend_req_mob').html(data);
		//friend();
		}

	});

}
friend_mob();
//setInterval("friend()",1000);

</script>

<script>		
function notice(){

	$.ajax({

		url:'../Notification/notification.php',
		type:'GET',
		success: function (data){

		$('#notify').html(data);
			friend();
			friend_mob();

		}

	});

}
notice();
setInterval("notice()",5000);

</script>

<script>
$(document).ready(function(){
	
	$("#search").keyup(function (){
		var x=$("#search").val();
		
		if(x==""){
			$("#here_srch").slideUp("fast");
			
		}
		else
		{
		
			$("#here_srch").slideDown("fast");
			var x=$("#search").val();
			
			$.ajax({
				url:'../search/Search.php',
				data:'q='+x,
				type:'GET',
				success:function (data){
					$("#here_srch").html(data);
				}
				
			});
		}
	});
	
	
}); 

</script>	
<?php }?>
