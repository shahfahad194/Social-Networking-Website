<?php
include("../../connection/conect.php");

session_start();
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];

		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
			$name=$fetch1['Name'];
			$email=$fetch1['Email'];
			$gender=$fetch1['Gender'];
			$friend_id=$fetch1['friend'];
			$valus_re_f=(explode(',',$friend_id));

			//fcth 2nd for pic
		$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
		$fetch2=$row2->fetch_array();
			$image=$fetch2['image'];
			//fecth 2 for post	
		
		
		$index = array_search($u_id, $valus_re_f);
		if ( $index !== false )
		{
			unset( $valus_re_f[$index] );
			$array=array($valus_re_f);
			foreach( $array as $key){
				foreach( $key as $keye){
					
			$row_chat=$mysqli->query("select * from chat where user_id='$keye' && friend_id='$u_id'");
			//$fetch_chat=$row_chat->fetch_array();
			$count_msj=mysqli_num_rows($row_chat);
			}
			}
		}
		
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
		<title>FriendsBook</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">		
<link rel="stylesheet" type="" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="" href="css/Background.css"/>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="Profile/js_files/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!--google aadss-->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({
	google_ad_client: "ca-pub-2589843701748129",
	enable_page_level_ads: true
	});
	</script>
<!--google aadss-->	
</head>
<style>
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



</style>
<body>
		<nav class="navbar navbar-default navbar-fixed-top" style="float:left;background:#3B5998;">
		  <div class="container-fluid" style='height:40px;'>
			<div class="navbar-header">
			  <a class="navbar-brand" href="#" style="text-shadow:0px 0px 25px black; font-family:sans-serif; font-weight:bolder; color:white;">FriendsBook</a>
			
			</div>
				<form method="POST">
					<input type="search" class="head_srch" name="search" placeholder="Search People.." style='font-weight:bolder; float:left;' ></li>
					<!--<input type="submit"class="head_srch" name="submit" Value="Search" style='display:none;font-weight:bolder; float:left;  margin:0px 0px 0px 0px ;'class="btn btn.primary" ></li>-->
				</form>
				<ul class="nav navbar-nav" style="float:right; background:; ">
					<li style='float:; list-style:none; color:white; '><a href='Profile/Profile.php?id=<?php echo $u_id;?>' style=' font-weight:bolder; color:white; text-transform:capitalize;'><?php echo $name;?></a></li>
					<li style='float:; list-style:none; color:white; '><a href='Home.php' style=' font-weight:bolder; color:white; text-transform:capitalize;'>Home</a></li>
					<!--<li style="float:;"><a href="#"><span class="glyphicon glyphicon-user .badge" class="badge" style="color:white; font-size:1.2em;"><?php //echo"7";?> </span></a></li>
					<li style="float:;"><a href="#"><span class="glyphicon glyphicon-globe .badge"  style="color:white; font-size:1.2em;">2</span></a></li> 
					<li style="float:;"><a href="#"><span class="glyphicon glyphicon-comment .badge"  style="color:white; font-size:1.2em;">12</span></a></li>--> 
					<li style="float:;"><a href="#" id="msj_click"><span class="glyphicon glyphicon-comment .badge"  style="color:white; font-size:1.2em;"><b style='color:red;'>(<?php  echo @$count_msj; ?>)</b></span></a></li> 
					<a  href="Home.php?logout">logout</a>
				</ul>
					<li id="head_pic"style='list-style:none; color:white;'><a href='Profile/Profile.php?id=<?php echo $u_id;?>' ><img src='<?php if($gender=='Male' || $gender=='Female'){echo"../../fb_user/$gender/$email/Profile/$image";}?>' width='' height='35px' style=' border:1px solid white;  box-shadow:0px 0px 25px lightblue; border-radius:3px; margin:5px 0px 0px 0px;float:right;'/></a></li>

				
		  </div>
		  		<div class="container-fluid_2" style="width:100%;height:50px;float:left;background:lightgray;">
				<table width='100%'>
					<td><a href='Profile/Profile.php?id=<?php echo $u_id;?>'><span class="glyphicon glyphicon-user .badge" title='Profile'  style="color:white; font-size:1.2em;"></span></a></td>
					<td><a href="msj.php" id="msj_click"><span class="glyphicon glyphicon-comment .badge" title='Message' style="color:white; font-size:1.2em;"></span></a></td> 
					<td><a href="#" id=""><span class="glyphicon glyphicon-th-list" title='List' style="color:white; font-size:1.2em;"></span></a></td> 
					
				</table>
				</div>

		</nav>
		
		<div id="side_nav" >
			<div id='n_pic'>	
					<table border='0' align="center" width='80%' class=''>
				
				<tr>
					<td id='q' width='20%'><?php if($gender=='Male' || $gender=='Female'){echo"<img src='../../fb_user/$gender/$email/Profile/$image'  style='width:100%; height:30px; border:solid 1px white; box-shadow:0px 0px 25px black; float:right;'/>";}?></td>
					<td id='q' align='center'><?php echo $name;?></td>
					
				</tr>
				</table>
			</div>
			<div id='feeds'>
				<table border='0' align="center" width='80%' class=''>
				
				<tr>
					<td><img src='image/newsfeed.PNG' width='20px'/></td>
					<td style='text-align:left;'><a href='Home.php'>News feed</a></td>
				</tr>
				<tr>
					<td><img src='image/timeline.PNG' width='20px'/></td>
					<td style='text-align:left;'><a href="Profile/Profile.php?id=<?php echo $u_id;?>">Timeline</a></td>
				</tr>
				<tr>
					<td><img src='image/my_videos.PNG' width='20px'/></td>
					<td style='text-align:left;'> <a href='Profile/Photo.php?id=<?php echo $u_id;?>'>photo&video</a> </td>
				</tr>
				<tr>
					<td><img src='image/about.PNG' width='20px'/></td>
					<td style='text-align:left;'> <a href='Profile/about.php?id=<?php echo $u_id;?>'>about</a> </td>
				</tr>
				<tr>
					<td><img src='image/settings2.PNG' width='20px'/></td>
					<td style='text-align:left;'> <a href=''>setting </a></td>
				</tr>
				
				
				</table>
			</div>
			<div style='width:100%; height:auto; overflow:hidden;'>
			<script type="text/javascript">
			sa_client = "af9ed58e41ad7e0e41bcf55affde5497";
			sa_code = "e88f24d123ff2f66dae5a18fd9d41214";
			sa_protocol = ("https:"==document.location.protocol)?"https":"http";
			sa_pline = "0";
			sa_maxads = "3";
			sa_bgcolor = "ffffff";
			sa_bordercolor = "ffffff";
			sa_superbordercolor = "ffffff";
			sa_linkcolor = "000000";
			sa_desccolor = "000000";
			sa_urlcolor = "008000";
			sa_b = "0";
			sa_format = "rect_250x250";
			sa_width = "250";
			sa_height = "250";
			sa_location = "0";
			sa_radius = "4";
			sa_borderwidth = "1";
			sa_font = "0";
			document.write(unescape("%3cscript type='text/javascript' src='"+sa_protocol+"://sa.entireweb.com/sense2.js'%3e%3c/script%3e"));
			</script>
			</div>
		</div>
		
		<div id="right_nav">

		<div style="width:auto; background:; margin-top:5%; height:auto;float:right;">
			<!-- Begin BidVertiser code -->
			<SCRIPT SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=753690&bid=1857231" TYPE="text/javascript"></SCRIPT>
			<!-- End BidVertiser code --> 
		</div>
		
		
		</div>
		<div id="left_nav">
			<!-- Begin BidVertiser code -->
			<SCRIPT SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=753690&bid=1857354" TYPE="text/javascript"></SCRIPT>
			<!-- End BidVertiser code --> 
		<div id="chat">
				<?php include("chatlist.php");?>
				
				
			
			</div>
			<div id="chatbox">
			
				<span class="glyphicon glyphicon-user .badge" class="badge" style="color:gray; font-size:1.2em;"><img src="image/online_symbol.png" style="padding:5px;	cursor:pointer; border-radius:10px;"/>Online(<?php echo $count_status;?>)</span>
			</div>
			
		
		</div>
		
	<script>
			$(document).ready(function(){
				$("#chatbox").click(function(){
				$("#chat").fadeToggle("slow");
				$("table").fadeIn("slow");
				
				});
			});
			
			
	</script>
		
	
		




<?php }?>
</body>
</html>