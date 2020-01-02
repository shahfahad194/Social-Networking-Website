<?php
	include("fb_files/fb_home/singup/Singup.php");
	include("login.php");

?>
<html>

<head>
		<title>FriendsMe</title>
	<meta charset="utf-8">
	


	
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/f-icon.png" />
	<script type="text/javascript" src="jquery_files/cycle2.js"></script>
	<script type="text/javascript" src="jquery_files/cycle.js"></script>
	<script type="text/javascript" src="jquery_files/jquery.js"></script>
	<script type="text/javascript" src="jquery_files/jquery-2.2.3.min.js"></script>
	<script src="fb_files/fb_home/Profile/js_files/jquery.js"></script>
	
	<script src="fb_files/fb_home/singup/reg_validation.js"></script>

</head>
<style>
*{
	
	margin:0px;
	padding:0px;
}
body{
	background:linear-gradient(to left,lightgray,transparent,transparent,transparent,transparent,transparent,transparent,lightgray);

	
}
#index_main{width:100%;height:auto;background:transparent; float:left;
		animation-name: example3;
		animation-duration: 4s;
		position:relative;
		animation-timing-function: ease-in-out;

}

#f_1{
			background:linear-gradient(to top right,white,black,#3B5998,#3B5998,black);
			width:100%;
			height:auto;
			float:left;
			border-bottom-style:solid;
			border-color:white;
			border-width:1px;
	
}

#title{
		width:50%;
		height:100px;
		float:left;
		text-align:center;
		background:transparent;
	
}
#login{
		width:50%;
		height:100px;
		background:transparent;
		float:left;
	
}
#login table{
		animation-name: example2;
		animation-duration: 4s;
		position:relative;
		animation-timing-function: ease-in-out;
}

#Login_mobile{display:none;}


#discription_1{width:50%; font-weight:bolder; float:left; height:100px; color:white; font-size:1.2em; background:;}

#discription_2{width:50%; font-weight:bolder; float:left; height:100px; color:#3B5998; font-size:1.2em; background:transparent;}


#image_1{width:50%; display:; 
		overflow:hidden;float:left; 
		height:450px; background:;  
		position: relative;
		animation-name: example;
		animation-duration: 4s;
		animation-timing-function: ease-in-out;

		}


#singup{
		width:50%;
		height:590px;
		background:;
		float:left;
		font-family:serif;
}

.lin{width:100%;border-radius:2px;height:25px; padding:7px;box-shadow:0px 5px 5px gray;}


#singup_table{width:100%; line-height:1.9; word-wrap:hard; text-shadow:0px 0px 5px white; font-family:serif; font-weight:; color:black;margin:5px 0px 0px 0px; font-size:1.3em;}
#singup table tr td input{height:40px; width:80%;}

#singup table tr td{ padding:8px; }

#my_intro{
		height:100px;
		width:8%;
		background:;
		float:left;
	
}

#d_name{
		height:100px;
		width:10%;
		background:;
		float:left;
		
	
}

#d_name_intro{
		height:200px;
		width:25%;
		background:lightgray;
		float:left;
		position:absolute;
		top:70%;
		left:15%;
		display:none;
		border:groove; border-width:thin;
		 border-radius:200px 0px 200px 0px; opacity:;
		 overflow:hidden;
		 display:none;
}

#d_n:hover{ text-decoration:underline;}

#error{
	width:50%;
	height:50px;
	background:;
	margin:10px 0px 0px 180px;
	overflow:hidden;
	
	}

	
#my_intro{width:100%; display:; overflow:hidden; float:left; height:50px; position:; top:; background:transparent;}
#my_intro h2{text-shadow:0px 0px 25px black;  font-family:Lucida Calligraphy; font-weight:bolder; font-size:1.1em;  color:#3B5998; margin:10px 0px 0px 10px;}
#my_intro h2 a{ text-decoration:none; color:#3B5998;}




/* mobile size*/

@-ms-viewport {
		width: device-width;
	}

	body {
		-ms-overflow-style: scrollbar;
	}
	

@media screen and (max-width: 1680px) 
	{
		/*body{margin:0px;padding:0px;background:green; }
		
		#index_main{width:100%;height:auto;background:transparent; float:left;}
		
		#discription_1{width:50%; font-weight:bolder; float:left; height:130px; color:white; margin:auto;font-size:1.3em; background:transparent;}
		#discription_1 h2{padding:10px;}
		
		#discription_2{width:50%; font-weight:bolder; float:left; height:130px; background:transparent;}
		#discription_2 h1{padding:10px;}
		
		#singup{width:50%;height:auto; margin:auto; background:transparent;float:left; font-family:serif;}
		.lin{height:25px; box-shadow:0px 5px 5px gray;}
		#singup_table{width:70%; line-height:2.5; word-wrap:hard; text-shadow:0px 0px 5px white; font-family:serif; font-weight:; color:black;margin:5px 0px 0px 0px; font-size:1.3em;}
		
		
		#image_1{width:50%; display:; overflow:hidden; float:left; height:450px; }
		#image_1 img{ box-shadow:0px 0px 30px gray; overflow:hidden; float:left; }

		#my_intro{width:100%; display:; overflow:hidden; float:left; height:auto; position:;  background:transparent;}
		#my_intro h2{ width:100%; display:;  padding:10px; font-family:Lucida Calligraphy; margin:auto; overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#3B5998;}
*/
	}
	
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:; }
		
		#index_main{width:100%;height:auto;background:transparent; float:left;}
		
		#image_1{width:50%; background:transparent; display:; overflow:hidden; float:left; height:590px; }
		#image_1 #slideshow{width:100%; margin:60px 0px 0px 0px; background:transparent; display:; overflow:hidden; float:left; height:auto; }
		#image_1 img{ box-shadow:0px 0px 30px gray; overflow:hidden; float:left; }

		#singup{width:50%; height:590px; margin:auto; background:transparent; float:left; font-family:serif;}
		
		#singup_table{width:100%; margin:5px 0px 0px 0px; font-size:1.3em; line-height:1.9;}
		#singup_table tr td input[type='text']{width:80%; padding:8px;}
		#singup_table tr td input[type='password']{width:80%; padding:8px; }
		#singup_table tr td input[type='email']{width:80%; padding:8px;}
		#singup_table tr td input[type='date']{width:80%; padding:8px;}
		.name-singup{width:auto; margin:0px; line-height:1.6;}
		
		#discription_1{width:50%; font-weight:bolder; float:left; height:110px; color:white; font-size:1.3em; background:transparent;}

		#discription_2{width:50%; font-weight:bolder; float:left; height:110px; color:#3B5998; font-size:1.3em; background:transparent;}
	

		
		#my_intro{width:100%; display:; overflow:hidden; float:left; height:auto; position:;  background:transparent;}
		#my_intro h2{ width:100%; display:;  padding:10px; font-family:Lucida Calligraphy; margin:auto; overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#3B5998;}
	}
	
	
	
@media (max-width:1024px)
	{
		body{margin:0px;padding:0px;background:linear-gradient(to top right,white,black,#3B5998,#3B5998,black); }
		
		#index_main{width:100%;height:auto;background:transparent; float:left;}
		
		#title{ width:100%; display:none;background:transparent; height:100px; margin:auto; float:left;}
		#title h1{display:none;}

		#Login{display:none;}
		#discription_1 { display:none;}
		#discription_2{ display:none;}
		#image_1{display:none;}
		#singup{ display:none;}
		#singup table tr td{display:none; }
		#singup_table{display:none;}
		
		#Login_mobile{width:80%; height:auto; margin:; font-size:15px; margin:10px 0px 0px 70px;  display:block; background:; float:left;}
		
		#mobile_title{ width:auto; text-shadow:0px 0px 25px black; font-family:Lucida Calligraphy; text-align:; float:left; font-weight:bolder; font-size:3.98em;  background:transparent; color:white; padding:5px;}
		#table-1{width:100%; font-family:Lucida Calligraphy;  margin-top:80px;float:left;}
		
		
		#table-2{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:50px; color:white;float:left; padding:5px;}
		#table-2 tr td input[type='text']{width:80%;  box-sizing: border-box;  border: 2px solid #ccc; height:35px; border-radius:4px; box-shadow:0px 0px 15px black; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-3{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:30px; color:white;float:left; padding:5px;}
		#table-3 tr td input[type='password']{width:80%;  border: 2px solid #ccc; box-sizing: border-box; height:35px; box-shadow:0px 0px 15px black; border-radius:4px; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-4{width:100%; text-align:center; text-shadow:0px 0px 25px black; font-size:1.5em; margin-top:30px; color:white; float:left; padding:5px;}
		#table-4 tr td input[type='button']{width:50%;  float:left; font-family:Lucida Calligraphy;  border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:green; border-radius:2px;  font-size:1.0em; outline-color:green; font:weight:bolder;}
		#table-4 tr td input[type='submit']{width:50%; float:left; font-family:Lucida Calligraphy; border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:gray; border-radius:2px; font-size:1.0em; outline-color:gray; font:weight:bolder;}
		
		#my_intro{width:100%; display:;overflow:hidden; float:left; height:auto; position:;  background:transparent;}
		#my_intro h2{ width:100%; display:; color:white; padding:10px; font-family:Lucida Calligraphy; margin:auto; overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:white;}
		
		
		
		
	}
	
	
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:linear-gradient(to top right,white,black,#3B5998,#3B5998,black); }
		
		#index_main{width:100%;height:auto;background:transparent; float:left;}
		
		#title{ width:100%;display:none; background:transparent; height:100px; margin:auto; float:left;}
		#title h1{display:none;}

		#Login{display:none;}
		#discription_1 { display:none;}
		#discription_2{ display:none;}
		#image_1{display:none;}
		#singup{ display:none;}
		#singup table tr td{display:none; }
		#singup_table{display:none;}
		
		#Login_mobile{width:80%; height:auto; margin:; font-size:15px; margin:10px 0px 0px 40px;  display:block; background:; float:left;}
		
		#mobile_title{ width:auto; text-shadow:0px 0px 25px black; font-family:Lucida Calligraphy; text-align:; float:left; font-weight:bolder; font-size:3.9em;  background:transparent; color:white; padding:5px;}
		#table-1{width:100%; font-family:Lucida Calligraphy;  margin-top:80px;float:left;}
		
		
		#table-2{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:50px; color:white;float:left; padding:5px;}
		#table-2 tr td input[type='text']{width:80%;  box-sizing: border-box;  border: 2px solid #ccc; height:35px; border-radius:4px; box-shadow:0px 0px 15px black; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-3{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:30px; color:white;float:left; padding:5px;}
		#table-3 tr td input[type='password']{width:80%;  border: 2px solid #ccc; box-sizing: border-box; height:35px; box-shadow:0px 0px 15px black; border-radius:4px; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-4{width:100%; text-align:center; text-shadow:0px 0px 25px black; font-size:1.5em; margin-top:30px; color:white; float:left; padding:5px;}
		#table-4 tr td input[type='button']{width:50%;  float:left; font-family:Lucida Calligraphy;  border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:green; border-radius:2px;  font-size:1.0em; outline-color:green; font:weight:bolder;}
		#table-4 tr td input[type='submit']{width:50%; float:left; font-family:Lucida Calligraphy; border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:gray; border-radius:2px; font-size:1.0em; outline-color:gray; font:weight:bolder;}
		
		#my_intro{width:100%; display:;overflow:hidden; float:left; height:auto; position:;  background:transparent;}
		#my_intro h2{ width:100%; display:; color:white; padding:10px; font-family:Lucida Calligraphy; margin:auto; overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:white;}
		
		
		
	}
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:linear-gradient(to top right,white,black,#3B5998,#3B5998,black); }
		
		#index_main{width:100%;height:auto;background:transparent; float:left;}
		
		#title{ width:100%; display:none;background:transparent; height:100px; margin:auto; float:left;}
		#title h1{display:none;}

		#Login{display:none;}
		#discription_1 { display:none;}
		#discription_2{ display:none;}
		#image_1{display:none;}
		#singup{ display:none;}
		#singup table tr td{display:none; }
		#singup_table{display:none;}
		
		#Login_mobile{width:80%; height:auto; margin:; font-size:15px; margin:10px 0px 0px 40px;  display:block; background:; float:left;}
		
		#mobile_title{ width:auto; text-shadow:0px 0px 25px black; font-family:Lucida Calligraphy; text-align:; float:left; font-weight:bolder; font-size:3.5em;  background:transparent; color:white; padding:5px;}
		#table-1{width:100%; font-family:Lucida Calligraphy;  margin-top:80px;float:left;}
		
		
		#table-2{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:50px; color:white;float:left; padding:5px;}
		#table-2 tr td input[type='text']{width:100%;  box-sizing: border-box;  border: 2px solid #ccc; height:35px; border-radius:4px; box-shadow:0px 0px 15px black; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-3{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:30px; color:white;float:left; padding:5px;}
		#table-3 tr td input[type='password']{width:100%;  border: 2px solid #ccc; box-sizing: border-box; height:35px; box-shadow:0px 0px 15px black; border-radius:4px; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-4{width:100%; text-align:center; text-shadow:0px 0px 25px black; font-size:1.5em; margin-top:30px; color:white; float:left; padding:5px;}
		#table-4 tr td input[type='button']{width:100%;  float:left; font-family:Lucida Calligraphy;  border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:green; border-radius:2px;  font-size:1.0em; outline-color:green; font:weight:bolder;}
		#table-4 tr td input[type='submit']{width:100%; float:left; font-family:Lucida Calligraphy; border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:gray; border-radius:2px; font-size:1.0em; outline-color:gray; font:weight:bolder;}
		
		#my_intro{width:100%; display:;overflow:hidden; float:left; height:auto; position:;  background:transparent;}
		#my_intro h2{ width:100%; display:; color:white; padding:10px; font-family:Lucida Calligraphy; margin:auto; overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:white;}
		
		
		
	}

@media (max-width:480px) 
	{
		
		body{margin:0px;padding:0px;background:linear-gradient(to top right,white,black,#3B5998,#3B5998,black); }
		
		#index_main{width:100%;height:auto;background:transparent; float:left;}
		
		#title{ width:100%; display:none;background:transparent; height:100px; margin:auto; float:left;}
		#title h1{display:none;}

		#Login{display:none;}
		#discription_1 { display:none;}
		#discription_2{ display:none;}
		#image_1{display:none;}
		#singup{ display:none;}
		#singup table tr td{display:none; }
		#singup_table{display:none;}
		
		#Login_mobile{width:100%; height:auto; margin:auto; font-size:15px; padding:0px;  display:block; background:transparent; float:left;}
		
		#mobile_title{ width:auto; text-shadow:0px 0px 25px black; font-family:Lucida Calligraphy; text-align:center; font-weight:bolder; font-size:3.0em;  background:transparent; color:white; padding:5px;}
		#table-1{width:100%; font-family:Lucida Calligraphy;  margin-top:80px;float:left;}
		
		
		#table-2{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:50px; color:white;float:left; padding:5px;}
		#table-2 tr td input[type='text']{width:100%;  box-sizing: border-box;  border: 2px solid #ccc; height:35px; border-radius:4px; box-shadow:0px 0px 15px black; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-3{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:30px; color:white;float:left; padding:5px;}
		#table-3 tr td input[type='password']{width:100%;  border: 2px solid #ccc; box-sizing: border-box; height:35px; box-shadow:0px 0px 15px black; border-radius:4px; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-4{width:100%; text-align:center; text-shadow:0px 0px 25px black; font-size:1.5em; margin-top:30px; color:white; float:left; padding:5px;}
		#table-4 tr td input[type='button']{width:100%;  font-family:Lucida Calligraphy; border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:green; border-radius:2px;  font-size:1.0em; outline-color:green; font:weight:bolder;}
		#table-4 tr td input[type='submit']{width:100%;  font-family:Lucida Calligraphy; border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:gray; border-radius:2px; font-size:1.0em; outline-color:gray; font:weight:bolder;}
		
		#my_intro{width:100%; display:;overflow:hidden; float:left; height:auto; position:;  background:transparent;}
		#my_intro h2{ width:100%; display:; color:white; padding:10px; font-family:Lucida Calligraphy; margin:auto; overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:white;}
		
		
		
		
	}	
	
	
	
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:linear-gradient(to top right,white,black,#3B5998,#3B5998,black); }
		
		#index_main{width:100%;height:auto;background:transparent; float:left;}
		
		#title{ width:100%;display:none; background:transparent; height:100px; margin:auto; float:left;}
		#title h1{display:none;}

		#Login{display:none;}
		#discription_1 { display:none;}
		#discription_2{ display:none;}
		#image_1{display:none;}
		#singup{ display:none;}
		#singup table tr td{display:none; }
		#singup_table{display:none;}
		
		#Login_mobile{width:100%; height:auto; margin:auto; font-size:15px;  padding:0px; display:block; background:transparent; float:left;}
		
		#mobile_title{ width:auto; text-shadow:0px 0px 25px black; font-family:Lucida Calligraphy; text-align:center; font-weight:bolder; font-size:3.0em;  background:transparent; color:white; padding:5px;}
		#table-1{width:100%; font-family:Lucida Calligraphy;  margin-top:80px;float:left;}
		
		
		#table-2{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:50px; color:white;float:left; padding:5px;}
		#table-2 tr td input[type='text']{width:100%;  box-sizing: border-box;  border: 2px solid #ccc; height:35px; border-radius:4px; box-shadow:0px 0px 15px black; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-3{width:100%; font-family:Lucida Calligraphy; text-shadow:0px 0px 25px black; font-size:2.0em; margin-top:30px; color:white;float:left; padding:5px;}
		#table-3 tr td input[type='password']{width:100%;  border: 2px solid #ccc; box-sizing: border-box; height:35px; box-shadow:0px 0px 15px black; border-radius:4px; font-family:serif; font-size:17px; margin:auto; float:left; padding:10px;}
	
		#table-4{width:100%;  text-shadow:0px 0px 25px black; font-size:1.5em; margin-top:30px; color:white; float:left; padding:5px;}
		#table-4 tr td input[type='button']{width:100%;  font-family:Lucida Calligraphy; border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:green; border-radius:2px;  font-size:1.0em; outline-color:green; font:weight:bolder;}
		#table-4 tr td input[type='submit']{width:100%;  font-family:Lucida Calligraphy; border: 2px solid #ccc; box-sizing: border-box; box-shadow:0px 0px 15px black; color:white; background:gray; border-radius:2px; font-size:1.0em; outline-color:gray; font:weight:bolder;}
		
		#my_intro{width:100%; display:; overflow:hidden; float:left; height:50px; position:;  background:transparent;}
		#my_intro h2{ width:auto; display:; color:white; padding:10px; font-family:Lucida Calligraphy; margin:auto; overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:white;}

	
	}


/* The element to apply the animation to */
 
@-webkit-keyframes example {
    0%{ left:-600px; top:50px;}
	25%{top:-200px;}
    50%{top:100px; }
    75%{top:80px;}
    100%{ left:0px; top:0px;}
}

@-webkit-keyframes example2 {
    0% { left:-600px; top:-100px;}
	
	25%{bottom:200px;}
	
    50% {top:100px; }
	
	75%{top:150px;}
    
    100%{left:0px; top:0px;}
}
@-webkit-keyframes example3 {
    0% { }
	
	25%{}
	
    50% {  }
	
	75%{}
	
    
    100%{ left:0px; top:0px;}
}

/* The element to apply the animation to */


</style>

<body>
<div id='index_main'>
		<div id='f_1'>
			<div id="title"><h1 style="  text-shadow:0px 0px 25px black; font-family:Lucida Calligraphy; font-weight:bolder; font-size:2.9em; color:white;margin:15px 0px 0px 0px; ">Friends<i style='color:rgba(255,0,100,0.5);'>Me</i> <input type="submit"  id='singup_mobile_hide' name="login" value="LogIn" style="width:100px; display:none; height:35px; float:right; box-shadow:0px 0px 15px black; font-family:serif; background:#3b5998;  color:white; font-weight:bolder; " /></h1></div>
					<!--------------------------------->
			<div id="Login">
				<form  method="POST" action="">
					<table style=" width:65%; text-shadow:0px 0px 25px black; font-family:serif; font-weight:; color:white;margin:15px 0px 0px 0px; font-size:1.0em;">
						<tr style="padding:10px;">
							<td>Email</td>
							<td>Password</td>
							<td> &nbsp </td>
						</tr>
						<tr style="padding:10px;">
							<td><input type="text" name="email" placeholder="Enter Your Email" class="lin"/> </td>
							<td><input type="password" name="password" class="lin" placeholder="Enter Your Password"/> </td>
							<td><input type="submit" name="login" value="LogIn" style="width:50px;  font-family:serif; height:25px; background:#3B5998; color:white;  font-weight:;" /> </td>
						</tr>
						<tr >
							<td> &nbsp </td>
							<td><a href='Forgotten_account.php' style='color:lightblue;padding:2px; text-decoration:none;'>Forgotten account?</a> </td>
						</tr>
						
						
					</table>
				</form>
			</div>
		</div>
		<!--------------------------------->
		<div id='discription_1' style=""><h2 style=" text-shadow:0px 0px 25px black;  font-family:sans-serif; font-weight:bolder; font-size:1.1em;  color:#3B5998; margin:10px 0px 0px 10px; ">FriendsMe helps you connect and share with the people in your life.</h2></div>
		<!--------------------------------------->
		<!-----------login:for mobile-------------------->
			<div id="Login_mobile">
				<table id='table-1'>
						<tr>
							<td><h1 id='mobile_title' style="">FriendsMe</h1></td>
						</tr>	
						
					</table>
				<form  method="POST" action="">
					<table id='table-2'>
						<tr>
							<td>Email</td>
						</tr>	
						<tr>	
							<td><input type="text" name="email" placeholder="Enter Your Email" class="lin"/> </td>

						</tr>
					</table>
					
					<table id='table-3' >
						<tr>
							<td>Password</td>
						</tr>
						<tr>
							<td><input type="password" name="password" class="lin" placeholder="Enter Your Password"/> </td>
						</tr>
						<tr >
						<td><a href='Forgotten_account.php' style='color:lightblue;padding:5px; font-size:27px; font-family:serif;text-decoration:none;'>Forgotten account?</a> </td>
						</tr>
					</table >
					
					<table id='table-4'>
						<tr >
						<td><input type="submit" name="login" value="LogIn" style="" /> </td>
						<td><a href='Signup_mobile.php'><input type="button"  value="Signup" id="mobile" style=" " /> </a></td>
						</tr>
					</table>

				</form>
			</div>	
		<!-------------end login mobile-------------------->
				
		<!--------------------------------->
		
		<div  id='discription_2'style=""><h1 style=" text-shadow:0px 0px 25px black;  font-family:sans-serif; font-weight:bolder; font-size:1.7em; text-decoration:underline; color:white; margin:10px 0px 0px 15px; "> Signup</h1>&nbsp&nbsp Its Free and allways will be.</div>
		<!--------------------------------->
		<div id='image_1' style="">
			<div id ="slideshow" style="width:100%;  height:auto; float:left; background:;" class="cycle-slideshow"
				data-cycle-fx = "fade"
				data-cycle-speed = "1000"		
				data-cycle-timeout = "3000"
				data-cycle-pager=""
				data-cycle-pager-template="<a href='#'><img src='{{src}}' height=100 width=120/>"		
				>
				<img src="images/sky_summer_people_jump_friends_smiles_80509_1920x1080.jpg" style="margin:50px 0px 0px 30px; border-radius:0px 200px 0px 200px; opacity:0.8; border:1px lightgray groove; box-shadow:0px 0px 25px black;" width='90%' height='300px'alt=""/>
				<img src="images/kimson-doan-37947.jpg" style="margin:50px 0px 0px 30px; border-radius:0px 200px 0px 200px; opacity:0.8; box-shadow:0px 0px 25px black; border:1px lightgray groove;" width='90%' height='300px'alt=""/>
				<img src="images/friends_smiles_joy_guys_girls_80226_1920x1080.jpg" style="margin:50px 0px 0px 30px; border-radius:0px 200px 0px 200px; opacity:0.8; box-shadow:0px 0px 25px black; border:1px lightgray groove;" width='90%' height='300px'alt=""/>
				
			</div>
			<!--<img src="images/main1.jpg"  id='abc' style="margin:50px 0px 0px 50px; border-radius:0px 200px 0px 200px; opacity:0.8; box-shadow:0px 0px 25px black;" width='90%' height='300px'/>-->
		</div>
		<!--------------------------------->
		<div id="singup" class='singup'>
				<form method="POST" onSubmit="return check();" name="Reg">
					<table id="singup_table" border='0'style="">
							<tr>
								<td width='20%'>Frist Name</td>
								<td><input type="text" id="name" name="f_name" placeholder="Frist Name" /></td>
							</tr>
							<tr>
								<td class='name-singup'>Last Name</td>
								<td><input type="text" name="l_name" id="l_name" placeholder="Last Name"/></td>
							</tr>
							<tr>
								<td class='name-singup'>Email</td>
								<td><input type="email" name="email" id="email_one" placeholder="Email"/></td>
							</tr>
							<tr>
								<td class='name-singup'>Renter-Email</td>
								<td><input type="text" name="re_emial" id="email_t"  placeholder="Renter-Email"/></td>
							</tr>
							<tr>
								<td class='name-singup'>Password</td>
								<td><input type="password" name="pass" id="pass" placeholder="Password"/></td>
							</tr>
							<tr>
								<td class='name-singup'>Birthday</td>
								<td><input type="date" name="dob" id="dob" placeholder="mm/dd/yy"/></td>
							</tr>
							<tr>
								<td class='name-singup'>Gender</td>
								<td class='name-singup'>
									<select  id="gen" name="gen" style=" width:70%; height:30px;" >
										<option value="I am">I am</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</td>
							</tr>
							<tr>
								<td> &nbsp 	</td>
								<td><input type="submit"  name="singup" value="Signup" onclick="abc()" style=" width:100px; box-shadow:0px 0px 15px black; padding:0px; margin:0px; line-height:1.2; color:white; background:green; font-family:serif; font-size:1.1em; outline-color:green; font:weight:bolder;" /> </td>

							</tr>
							<tr>
								<td> &nbsp 	</td>
								<td style='line-height:1.2;'>
									<?php include("fb_files/fb_home/singup/error_singup.php");?>
								</td>

							</tr>
					</table>
				</form>
		</div>
			<!--------------------------------->
		

		<div id="my_intro">
			
				<h2>Developer -&nbsp <a href="http:\\my-portfolio.comeze.com" target='_blank' style=''>Shah&nbspFahad</a></h2>
		
		</div>
</div>	

		<!------------my introduction 
		<div id="d_name_intro" >	
			<img src="images/fahad.jpg" alt="Developer" width="40%" height="189px" style=" padding:5px; border:groove; border-width:thin;"/>		
			<h2 id="d_n_p" style="text-shadow:0px 0px 25px black;  float:right;font-family:sans-serif; padding-top:10px;font-weight:bolder; font-size:13px;  color:#3B5998; margin:10px 10px 0px 0px; ">Shah Fahad <br /></br>03422609571<br /></br>www.shahfahad.comli.com<br /></br>shahfahad.1994@yahoo.com</h2>
			
		</div>--------------------->
	
</body>
</html>
