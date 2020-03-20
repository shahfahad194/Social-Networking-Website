
function check(){
			var f_name=Reg.name.value;
			var l_name=Reg.l_name.value;

		if(f_name==''){
				
				document.getElementById("f_name").style.display="block";
				document.getElementById("email").style.display="none";
				document.getElementById("re_emai").style.display="none";
				document.getElementById("pass_o").style.display="none";
				document.getElementById("d_o_b").style.display="none";
				document.getElementById("cgen").style.display="none";

				Reg.name.focus();
				return false;
			}
			//last name 
			if(l_name==''){
				document.getElementById("f_name").style.display="block";
				document.getElementById("email").style.display="none";
				document.getElementById("re_emai").style.display="none";
				document.getElementById("pass_o").style.display="none";
				document.getElementById("d_o_b").style.display="none";
				document.getElementById("cgen").style.display="none";				
				Reg.l_name.focus();
				return false;
			}
			
			
			//for email checking	
			if(Reg.email_one.value==''){
				document.getElementById("email").style.display="block";
				document.getElementById("f_name").style.display="none";
				document.getElementById("re_emai").style.display="none";
				document.getElementById("pass_o").style.display="none";
				document.getElementById("d_o_b").style.display="none";
				document.getElementById("cgen").style.display="none";				
				Reg.email_one.focus();
				return false;
			}
			//checking email 
			if(Reg.email_one.value!=Reg.email_t.value){
				document.getElementById("re_emai").style.display="block";
				document.getElementById("f_name").style.display="none";
				document.getElementById("email").style.display="none";
				document.getElementById("pass_o").style.display="none";
				document.getElementById("d_o_b").style.display="none";
				document.getElementById("cgen").style.display="none";							
			Reg.email_t.focus();
				return false;
			}
			
		//for password checking
			var pass_i=Reg.pass.value;
			if(pass_i==''){
				document.getElementById("pass_o").style.display="block";
				document.getElementById("f_name").style.display="none";
				document.getElementById("email").style.display="none";
				document.getElementById("re_emai").style.display="none";
				document.getElementById("d_o_b").style.display="none";
				document.getElementById("cgen").style.display="none";							
				Reg.pass.focus();
				return false;
				}
		//for password lenght		
			if(pass_i.length<=8){
				document.getElementById("pass_o").style.display="block";
				document.getElementById("f_name").style.display="none";
				document.getElementById("email").style.display="none";
				document.getElementById("re_emai").style.display="none";
				document.getElementById("d_o_b").style.display="none";
				document.getElementById("cgen").style.display="none";								
				Reg.pass.focus();
				return false;
				}
		
		//for date of brith checking
		var dob=Reg.dob.value;
		if(dob==''){
				document.getElementById("d_o_b").style.display="block";
				document.getElementById("f_name").style.display="none";
				document.getElementById("email").style.display="none";
				document.getElementById("re_emai").style.display="none";
				document.getElementById("pass_o").style.display="none";
				document.getElementById("cgen").style.display="none";								
				Reg.dob.focus();
				return false;
				}
				
		//gender checking
		var gen=Reg.gen.value;
		if(gen=='I am'){
				document.getElementById("cgen").style.display="block";
				document.getElementById("f_name").style.display="none";
				document.getElementById("email").style.display="none";
				document.getElementById("re_emai").style.display="none";
				document.getElementById("pass_o").style.display="none";
				document.getElementById("d_o_b").style.display="none";
				Reg.gen.focus();
				return false;
				}
		
		
		
		}
	