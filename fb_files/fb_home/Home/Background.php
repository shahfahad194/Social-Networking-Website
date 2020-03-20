<?php
include("../../../connection/conect.php");
error_reporting(0);
//session_start();
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];

		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
			$name=$fetch1['Name'];
			$email=$fetch1['Email'];
			$gender=$fetch1['Gender'];
			//fcth 2nd for pic
		$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
		$fetch2=$row2->fetch_array();
			$image=$fetch2['image'];
			//fecth 2 for post	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
		<title>FriendsMe</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">		
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
<!--<link rel="stylesheet" type="text/css" href="../css/Background.css"/>-->
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../search/search_people.js"></script>
<script src="../Profile/js_files/jquery.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

</head>
<style>
*{
	
	margin:0px;
	padding:0px;
}

	

#main{
		width:100%;
		background:;
		float:left;
		font-family:serif;
}
.head_srch {
    width: 150px;
	height:40px;
	margin:5px 0px 0px 30px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color:white;
     background-image: url(../image/srh.PNG);
	background-size:30px;
    background-position: 10px 2px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 50px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

.head_srch:focus {
    width:35%;
}

#side_nav{
	width:17%;
	height:10000px;
	min-height:auto;
	max-height:10000px;
	background:;
	position:fixed;
	float:left;
	max-height:auto;
	border-right-style:solid;
	border-color:lightgray;
	border-width:2px;
	box-shadow:0px 10px 25px black;
	box-sizing: border-box;

}
#right_nav{
	width:18%;
	height:10000px;
	min-height:auto;
	max-height:10000px;
	background:;
	position:fixed;
	float:right;
	left:62%;
	top:;
	border-left-style:groove;
	border-right-style:groove;
	border-color:white;
	border-width:thin;
	border-width:2px;
		box-sizing: border-box;

}
#left_nav{
	width:18%;
	height:10000px;
	min-height:auto;
	max-height:10000px;
	background:;
	position:fixed;
	float:right;
	left:82%;
	top:;
	border-left-style:groove;
	border-color:white;
	border-width:2px;
	box-shadow:0px 10px 25px black;
	box-sizing: border-box;

}


#n_pic{
	width:70%;
	float:left;
	height:auto;
	background:;
	text-align:center;
	padding:0px;
	margin:100px 0px 0px 30px;
	border-bottom-style:solid;
	border-bottom-color:white;
	border-bottom-width:thin;
}
#q{

	
	color:#3B5998;
	font-weight:bolder;
	text-shadow:10px 0px 25px lightgray;
	text-transform:capitalize;
	font-family:serif;
	font-size:1.1em;	
	font-weight:bolder;
}
#feeds{
	width:70%;
	float:left;
	height:auto;
	background:;
	text-align:center;
	margin:0px 0px 0px 30px;
	border-bottom-style:solid;
	border-bottom-color:white;
	border-bottom-width:2px;
	
	box-sizing: border-box;

}
#feeds table tr td a{text-decoration:none;}

#feeds table tr td{
	
	text-align:;
	width:50%;
	padding:7px;
	text-transform:capitalize;
	background:;
	font-family:serif;
	font-size:auto;
}
#chat{
	width:100%;
	height:420px;
	background:transparent;
	float:right;
	max-height:10000px;
	overflow:auto;
	
}
#chatbox{
	width:100%;
	height:40px;
	background:lightgray;
	position:relative;
	margin-top:185px;
	float:left;
	border:groove;
	border-color:lightgray;
	border-width:thin;
	text-align:center;
	padding:10px;
	font-weight:bolder;
	font-size:17px;
	font-family:serif;
	cursor:pointer;
}
#msj_main{
	width:20%;
	height:40px;
	background:lightgray;
	position:fixed;
	float:right;
	left:57%;
	top:94%;
	border:groove;
	border-color:lightgray;
	border-width:thin;
	text-align:center;
	padding:10px;
	font-weight:bolder;
	font-size:17px;
	font-family:serif;
	z-index:1000;
	display:none;
}

.navbar-header a{  font-size:2.0em;}
	
#here
{
	width:34%;
	height:auto;
	position:absolute;
	left:12.5%;
	top:85%;
	display:none;
	z-index:1000;	
	background:white;
	border: 2px solid #ccc;
	font-family:algerian;
	color:#3B5998;
	padding:10px;
	
}
#notification
{
	
	width:34%;
	max-height:400px;
	min-height:auto;
	position:absolute;
	left:60%;
	top:99%;
	z-index:1000;	
	background:white;
	border: 2px solid #ccc;
	font-family:algerian;
	color:#3B5998;
	padding:5px;
	display:none;
	overflow:auto;
	
}

li{
	font-family:serif;
}
.container-fluid_3{overflow:auto;}
.container-fluid_2{display:none;}

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
	
/* .container-fluid navbar-header  nav navbar-nav*/
/* mobile size*/
@media (max-width:1024px) {
	/*.navbar.navbar-default.navbar-fixed-top{float:left; width:100%; height:100px; font-size:20px;}
	.navbar.navbar-default.navbar-fixed-top ul{ diplay:block; width:auto; margin-top:;}
	.container-fluid{ width:100%; height:100px; float:left;font-size:20px;background:;}
	.container-fluid form{margin-top:10px; }
	.navbar-header{ width:auto; font-size:20px; float:left;background:;}
	.navbar-header a{ margin-top:0px; font-size:auto;}
	.nav.navbar-nav{display:none;}
	
	#head_pic{display:none;}
	.container-fluid_2{display:block;margin-top:10px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:white;}
	.container-fluid_2 table tr td{text-align:center; padding:10px; }
	
	.head_srch {
    width: 60%;
	height:10px;
	margin:0px 0px 0px 10px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url(../image/srh.PNG);
	background-size:15px;
    background-position: 8px 2px;
    background-repeat: no-repeat;
    padding: 10px 20px 12px 30px;
	 
   }
   .head_srch:focus {width:60%;}

.navbar-header a{  font-size:0.9em;}
   
	#side_nav{display:none;}
	#right_nav{display:none;}
	#left_nav{display:none;}
	
	/* Scrollbar styles */
	::-webkit-scrollbar {
	width: 0px;
	height: 10px;
	}

	::-webkit-scrollbar-track {
	box-shadow: inset 0 0 10px  #3b5998;
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
	
	*/
	
}





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
		#feeds table tr td{
	
			text-align:;
			width:50%;
			padding:5px;
			text-transform:capitalize;
			background:;
			font-family:serif;
			font-size:15px;
			line-height:1.7;
		}
	
	}
	
	
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}	
		
		
		#here
			{
				left:19.5%;
				
			}
		#feeds table tr td{
	
			text-align:;
			width:50%;
			padding:7px;
			text-transform:capitalize;
			background:;
			font-family:serif;
			font-size:15px;
			line-height:2;
		}
		

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
	   
	   
		#side_nav{display:none;}
		#right_nav{display:none;}
		#left_nav{display:none;}

		
		#here
			{
				width:100%;
				height:auto;
				max-height:500px;
				min-height:auto;
				position:relative;
				left:0%;
				top:0%;
				margin:auto;
				display:none;
				z-index:1000;	
				background:;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:10px;
				font-size:15px;
				overflow:auto;
				
			}
			#notification
			{
				
				width:100%;
				max-height:400px;
				min-height:auto;
				position:relative;
				left:0%;
				top:0%;
				z-index:1000;	
				background:white;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:5px;
				display:none;
				overflow:auto;
				font-size:15px;
				
			}
					
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
	   
	   
		
		#side_nav{display:none;}
		#right_nav{display:none;}
		#left_nav{display:none;}
		#here
			{
				width:100%;
				height:auto;
				position:relative;
				left:0%;
				top:0%;
				margin:auto;
				display:none;
				z-index:1000;	
				background:;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:10px;
				font-size:13px;
				
			}
			#notification
			{
				
				width:100%;
				max-height:400px;
				min-height:auto;
				position:relative;
				left:0%;
				top:0%;
				z-index:1000;	
				background:white;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:5px;
				display:none;
				overflow:auto;
				font-size:13px;
				
			}
					
		

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
	   
	   
		#side_nav{display:none;}
		#right_nav{display:none;}
		#left_nav{display:none;}
		#here
			{
				width:100%;
				height:auto;
				position:relative;
				left:0%;
				top:0%;
				margin:auto;
				display:none;
				z-index:1000;	
				background:;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:10px;
				font-size:13px;
				
			}
			#notification
			{
				
				width:100%;
				max-height:400px;
				min-height:auto;
				position:relative;
				left:0%;
				top:0%;
				z-index:1000;	
				background:white;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:5px;
				display:none;
				overflow:auto;
				font-size:13px;
				
			}
					

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
	   
	   
		
		#side_nav{display:none;}
		#right_nav{display:none;}
		#left_nav{display:none;}
		#here
			{
				width:100%;
				height:auto;
				position:relative;
				left:0%;
				top:0%;
				margin:auto;
				display:none;
				z-index:1000;	
				background:;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:10px;
				font-size:13px;
				
			}
			#notification
			{
				
				width:100%;
				max-height:400px;
				min-height:auto;
				position:relative;
				left:0%;
				top:0%;
				z-index:1000;	
				background:white;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:5px;
				display:none;
				overflow:auto;
				font-size:13px;
				
			}
					

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
	   
	   
	
		#side_nav{display:none;}
		#right_nav{display:none;}
		#left_nav{display:none;}
		
		#here
			{
				width:100%;
				height:auto;
				position:relative;
				left:0%;
				top:0%;
				margin:auto;
				display:none;
				z-index:1000;	
				background:;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:10px;
				font-size:13px;
				
			}
			#notification
			{
				
				width:100%;
				max-height:400px;
				min-height:auto;
				position:relative;
				left:0%;
				top:0%;
				z-index:1000;	
				background:white;
				border: 2px solid #ccc;
				font-family:algerian;
				color:#3B5998;
				padding:5px;
				display:none;
				overflow:auto;
				font-size:13px;
				
			}
					
		
	}



</style>
<body onload="notice();">
		<nav class="navbar navbar-default navbar-fixed-top" style="float:left;background:#3B5998;">
		  <div class="container-fluid" style='height:40px;'>
			<div class="navbar-header">
			  <a class="navbar-brand" href="#" style="text-shadow:0px 0px 25px black; font-family:Lucida Calligraphy; font-weight:bolder; color:white;">FriendsMe</a>
			
			</div>
				<form method="POST">
					<input type="search" id='search' class="head_srch" name="search" autocomplete='off' placeholder="Search People.." style='font-weight:bolder; float:left;' ></li>
					
					<!--<input type="submit"class="head_srch" name="submit" Value="Search" style='display:none;font-weight:bolder; float:left;  margin:0px 0px 0px 0px ;'class="btn btn.primary" ></li>-->
				</form>
				<ul class="nav navbar-nav" style="float:right; background:; ">
					<li style='float:; list-style:none; color:white; '><a href='../Profile/Profile.php?id=<?php echo $u_id;?>' style=' font-weight:bolder; color:white; text-transform:capitalize;'><?php echo $name;?></a></li>
					<li style='float:; list-style:none; color:white; '><a href='../Home/Home.php' style=' font-weight:bolder; color:white; text-transform:capitalize;'>Home</a></li>
					<li><span class="glyphicon glyphicon-globe .badge" title='Notifacation'  style="color:white;margin:15px 0px 0px 0px;   cursor:pointer; font-size:1.2em;"></span></li>
					<li><a href="../Message/Msj.php?message_id=<?php echo $u_id;?>"><span class="glyphicon glyphicon-comment .badge" title='Message' style="color:white; margin:0px 0px 0px 0px; cursor:pointer; font-size:1.2em;"></span></a></li> 
					<li><span class="glyphicon glyphicon-chevron-down" id="" style="color:white; margin:15px 0px 0px 15px; cursor:pointer; font-size:1.2em;"></span></li> 
					
					
				</ul>
					<li id="head_pic"style='list-style:none; color:white;'><a href='../Profile/Profile.php?id=<?php echo $u_id;?>' ><img src='<?php if($gender=='Male' || $gender=='Female'){echo"../../../fb_user/$gender/$email/Profile/$image";}?>' width='' height='35px' style=' border:1px solid white;  box-shadow:0px 0px 25px lightblue; border-radius:3px; margin:5px 0px 0px 0px;float:right;'/></a></li>

				
		  </div>
		  		<div class="container-fluid_2" style="width:100%;height:50px;float:left;background:lightgray;">
				<table width='100%'>
					<td><a href='../Profile/Profile.php?id=<?php echo $u_id;?>'><span class="glyphicon glyphicon-user .badge" title='Profile'  style="color:white; font-size:1.2em;"></span></a></td>
					<td><a href="msj.php" id="msj_click"><span class="glyphicon glyphicon-comment .badge" title='Message' style="color:white; font-size:1.2em;"></span></a></td> 
					<td><span class="glyphicon glyphicon-globe .badge" title='Notifacation'  style="color:white; cursor:pointer; font-size:1.2em;"></span></td>
					<td><a href="#" id=""><span class="glyphicon glyphicon-th-list" title='List' style="color:white; font-size:1.2em;"></span></a></td> 
					
				</table>
				</div>
		  		<div class="container-fluid" id='here'></div>
		  		<div class="container-fluid_3" id='notification'></div>
		</nav>
		
		<div id="side_nav" >
			<div id='n_pic'>	
					<table border='0' align="center" width='80%' class=''>
				
				<tr>
					<td id='q' width='20%'><?php if($gender=='Male' || $gender=='Female'){echo"<img src='../../../fb_user/$gender/$email/Profile/$image'  style='width:100%; height:30px; border:solid 1px white; box-shadow:0px 0px 25px black; float:right;'/>";}?></td>
					<td id='q' align='center'><?php echo $name;?></td>
					
				</tr>
				</table>
			</div>
			<div id='feeds'>
				<table border='0' align="center" width='80%' class=''>
				
				<tr>
					<td><img src='../image/newsfeed.PNG' width='20px'/></td>
					<td style='text-align:left;'><a href='../Home/Home.php'>News feed</a></td>
				</tr>
				<tr>
					<td><img src='../image/timeline.PNG' width='20px'/></td>
					<td style='text-align:left;'><a href="../Profile/Profile.php?id=<?php echo $u_id;?>">Timeline</a></td>
				</tr>
				<tr>
					<td><img src='../image/my_videos.PNG' width='20px'/></td>
					<td style='text-align:left;'> <a href='../Profile/Photo.php?id=<?php echo $u_id;?>'>photo&video </a></td>
				</tr>
				<tr>
					<td><img src='../image/group.PNG' width='20px'/></td>
					<td style='text-align:left;'> <a href='../Group/Create_Groups.php'>groups</a></td>
				</tr>
				<tr>
					<td><img src='../image/pages.PNG' width='20px'/></td>
					<td style='text-align:left;'> <a href='../Profile/Pages.php?id=<?php echo $u_id;?>'>Pages</a></td>
				</tr>
				
				<tr>
					<td><img src='../image/about.PNG' width='20px'/></td>
					<td style='text-align:left;'> <a href='../Profile/about.php?id=<?php echo $u_id;?>'>about</a> </td>
				</tr>
				<tr>
					<td><img src='../image/settings2.PNG' width='20px'/></td>
					<td style='text-align:left;'> <a href='#'>setting </a></td>
				</tr>
				<tr>
					<td><span class='glyphicon glyphicon-log-out' width='20px' style='color:blue;'> </span></td>
					<td style='text-align:left;'> <a href='../Home/Home.php?logout'>Logout </a></td>
				</tr>
				
				
				</table>
			</div>
			<!--second menu table-->
			<div id='feeds'>
				<table border='0' align="center" style='color:gray;' width='100%' class=''>
					<tr>
						<td colspan="2" align="left"><p width='20px' >explore</p></td>
					</tr>
					<?php 
				
					$row_groups=$mysqli->query("select * from groups where user_id='$u_id' LIMIT 4");
					while($fetch_groups=$row_groups->fetch_array()){
					$group_ids=$fetch_groups['group_id'];
					$group_names=substr($fetch_groups['group_name'],0,5);
					$group_nas=$fetch_groups['group_name'];
				
				$row_groups_pic=$mysqli->query("select * from group_post where group_id='$group_ids' AND group_post_text='added a Cover photo..' order by time desc");
					$fetch_groups_pic=$row_groups_pic->fetch_array();
					$group_post_texts=strchr($fetch_groups_pic['group_post_text'],'added a Cover photo..');
					$group_post_pics=$fetch_groups_pic['group_post_pic'];
				?>
					<tr>
						<td style='width:20%; padding:0px;'>
						<?php if(strchr($group_post_texts,'added a Cover photo..')=='added a Cover photo..' AND $group_post_pics !=''){echo"<img src='../../../fb_user/$gender/$email/$group_nas/Cover/$group_post_pics' style='width:100%; height:25px; border-radius:5px; border:1px solid gray;'/>";}
						else{echo"<img src='../image/Group-icon.png' style='width:100%; height:25px;'/>";}?>
						</td>
						<td style='text-align:left;'><a href="../Group/Groups.php?group_id=<?php echo $group_ids;?>"><?php echo $group_names.'&nbsp....' ;?></a></td>
					</tr>
					<?php }?>
					<?php if(count($group_ids)>4){?>
					<tr>
						<td colspan="2" align="right"><a href='Create_Groups.php'>see all</a></td>
					</tr>
					<?php }?>
				</table>
			</div>
			<div id='feeds'>
				<table border='0' align="center" style='color:gray;' width='100%' class=''>
				
				<tr>
					<td colspan='2' align="left"><p width='20px'>create</p></td>
					
				</tr>
				<tr>
					<td colspan="2" ><p width='20px'>ad - &nbsp page -&nbsp <a href="../Group/Create_Groups.php">group</a></p></td>
					
				</tr>
					
				</table>
			</div>
			
		</div>
		
		<div id="right_nav"></div>
		<div id="left_nav">
		<div style='width:100%; float:left; height:150px; background:gray; '> <br/>hdhkfdkfkdshfkdsf</div>
		
			<div id="chat">
				<?php include("../Message/chatlist.php");?>
			</div>
			<!--<div id="chatbox">
			
				<span class="glyphicon glyphicon-user .badge" class="badge" style="color:gray;  font-size:1.2em;"><img src="../image/online_symbol.png" style="padding:5px;	cursor:pointer; border-radius:10px;"/>Online(<?php echo $count_status;?>)</span>
			</div>-->
			
		
		</div>
		
<script>
	$(document).ready(function(){
		$("#chatbox").click(function(){
		$("#chat").fadeToggle("slow");
		$("table").fadeIn("slow");
		
		});
	});
	
	//msj_box script
	$(document).ready(function(){
		$(".glyphicon.glyphicon-globe").click(function(){
		$("#notification").fadeToggle("slow");
		
		
		});
	});
</script>
	
<script>		
function notice(){

	$.ajax({

		url:'../Notification/notification.php',
		type:'GET',
		success: function (data){

		$('#notification').html(data);

		}

	});

}

setInterval("notice()",3000);

</script>	
<?php }?>
</body>
</html>