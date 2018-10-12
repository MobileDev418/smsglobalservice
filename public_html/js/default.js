// JavaScript Document
function cofirmDel(msg)
{
	var del;
	del=confirm(msg);
	if(del)
		return true;
	else
		return false;
}

function validRegForm()
{
	var rt=true;
	var name=document.getElementById('name');
	var username=document.getElementById('username');
	var pass1=document.getElementById('pass1');
	var pass2=document.getElementById('pass2');
	var email=document.getElementById('email');
	var code=document.getElementById('code');
	var country=document.getElementById('country');
	/*var ph=document.getElementById('ph');*/
	var cell=document.getElementById('cell');

	var er_name=document.getElementById('er_name');
	var uname_er=document.getElementById('uname_er');
	var pass1_er=document.getElementById('pass1_er');
	var pass2_er=document.getElementById('pass2_er');
	var email_er=document.getElementById('email_er');
	var code_er=document.getElementById('code_er');
	var country_er=document.getElementById('country_er');
	/*var ph_er=document.getElementById('ph_er');*/
	var cell_er=document.getElementById('cell_er');
	
	er_name.style.visibility='hidden';
	uname_er.style.visibility='hidden';
	pass1_er.style.visibility='hidden';
	pass2_er.style.visibility='hidden';
	email_er.style.visibility='hidden';
	code_er.style.visibility='hidden';
	country_er.style.visibility='hidden';
	/*ph_er.style.visibility='hidden';*/
	cell_er.style.visibility='hidden'; 
	


	name.style.border='1px solid #CCC';
	username.style.border='1px solid #CCC';
	pass1.style.border='1px solid #CCC';
	pass2.style.border='1px solid #CCC';	
	email.style.border='1px solid #CCC';
	code.style.border='1px solid #CCC';
	country.style.border='1px solid #CCC';
	/*ph.style.border='1px solid #CCC';*/
	cell.style.border='1px solid #CCC';
	
	
	
	if(name.value=="")
	{
		er_name.style.visibility='visible';
		name.style.border='1px solid #ff0000';
		rt=false;
	}
	if(username.value=="")
	{
		uname_er.style.visibility='visible';
		username.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if(pass1.value=="")
	{
		pass1_er.style.visibility='visible';
		pass1.style.border='1px solid #ff0000';
		rt=false;
	}
	if(pass2.value=="")
	{
		pass2_er.style.visibility='visible';
		pass2.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if(country.selectedIndex==0)
	{
		country_er.style.visibility='visible';
		country.style.border='1px solid #ff0000';
		/*country.style.background='#ff0000'; */
		rt=false;
	}
	
/*	if(ph.value=="")
	{
		ph_er.style.visibility='visible';
		ph.style.border='1px solid #ff0000';
		rt=false;
	}*/
	
	if(cell.value=="")
	{
		cell_er.style.visibility='visible';
		cell.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if(cell.value.length<10 || cell.value.charAt(0)=="0" )
	{
		cell_er.style.visibility='visible';
		cell.style.border='1px solid #ff0000';
		rt=false;
		alert("Please enter mobile number in international format. Eg. 254733657122, 4477916745");
		cell.focus();
	}

		
	if ((email.value==null)||(email.value==""))
	{
		email_er.style.visibility='visible';
		email.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if (echeck(email.value)==false)
	{
		email_er.style.visibility='visible';
		email.style.border='1px solid #ff0000';
		rt=false;
	}
	if(code.value=="")
	{
		code_er.style.visibility='visible';
		code.style.border='1px solid #ff0000';
		rt=false;
	}
	if(pass1.value!="" && pass2.value!="" && pass1.value!=pass2.value)
	{
		pass1_er.style.visibility='visible';
		pass2_er.style.visibility='visible';
		pass1.style.border='1px solid #ff0000';
		pass2.style.border='1px solid #ff0000';
		rt=false;		
	}
	return rt;
}
function validRegFormhome()
{
	var rt=true;
	var name_home=document.getElementById('ffname');
	var username_home=document.getElementById('username');
	var pass1_home=document.getElementById('pass1');
	var pass2_home=document.getElementById('pass2');
	var email_home=document.getElementById('email');
	var code_home=document.getElementById('code');
	var country_home=document.getElementById('country');
	/*var ph=document.getElementById('ph');*/
	var cell_home=document.getElementById('cell');
/*
	var er_name=document.getElementById('er_name');
	var uname_er=document.getElementById('uname_er');
	var pass1_er=document.getElementById('pass1_er');
	var pass2_er=document.getElementById('pass2_er');
	var email_er=document.getElementById('email_er');
	var code_er=document.getElementById('code_er');
	var country_er=document.getElementById('country_er');
	/*var ph_er=document.getElementById('ph_er');
	var cell_er=document.getElementById('cell_er');
	
	er_name.style.visibility='hidden';
	uname_er.style.visibility='hidden';
	pass1_er.style.visibility='hidden';
	pass2_er.style.visibility='hidden';
	email_er.style.visibility='hidden';
	code_er.style.visibility='hidden';
	country_er.style.visibility='hidden';
	/*ph_er.style.visibility='hidden';
	cell_er.style.visibility='hidden'; */
	


	name_home.style.border='1px solid #CCC';
	username_home.style.border='1px solid #CCC';
	pass1_home.style.border='1px solid #CCC';
	pass2_home.style.border='1px solid #CCC';	
	email_home.style.border='1px solid #CCC';
	code_home.style.border='1px solid #CCC';
	country_home.style.border='1px solid #CCC';
	/*ph.style.border='1px solid #CCC';*/
	cell_home.style.border='1px solid #CCC';
	
	
	
	if(name_home.value=="")
	{
		//er_name.style.visibility='visible';
		name_home.style.border='1px solid #ff0000';
		rt=false;
	}
	if(username_home.value=="")
	{
		//uname_er.style.visibility='visible';
		username_home.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if(pass1_home.value=="")
	{
		//pass1_er.style.visibility='visible';
		pass1_home.style.border='1px solid #ff0000';
		rt=false;
	}
	if(pass2_home.value=="")
	{
		//pass2_er.style.visibility='visible';
		pass2_home.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if(country_home.selectedIndex==0)
	{
		//country_er.style.visibility='visible';
		country_home.style.border='1px solid #ff0000';
		/*country.style.background='#ff0000'; */
		rt=false;
	}
	
/*	if(ph.value=="")
	{
		ph_er.style.visibility='visible';
		ph.style.border='1px solid #ff0000';
		rt=false;
	}*/
	
	if(cell_home.value=="")
	{
		//cell_er.style.visibility='visible';
		cell_home.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if(cell_home.value.length<10 || cell_home.value.charAt(0)=="0" )
	{
		//cell_er.style.visibility='visible';
		cell_home.style.border='1px solid #ff0000';
		rt=false;
		alert("Please enter mobile number in international format. Eg. 254733657122, 4477916745");
	}

		
	if ((email_home.value==null)||(email_home.value==""))
	{
		//email_er.style.visibility='visible';
		email_home.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if (echeck(email_home.value)==false)
	{
		//email_er.style.visibility='visible';
		email_home.style.border='1px solid #ff0000';
		rt=false;
	}
	if(code_home.value=="")
	{
		//code_er.style.visibility='visible';
		code_home.style.border='1px solid #ff0000';
		rt=false;
	}
	if(pass1_home.value!="" && pass2_home.value!="" && pass1_home.value!=pass2_home.value)
	{
		//pass1_er.style.visibility='visible';
		//pass2_er.style.visibility='visible';
		pass1_home.style.border='1px solid #ff0000';
		pass2_home.style.border='1px solid #ff0000';
		rt=false;		
	}
	return rt;
}



function enable_disable(rd)
{
	if(rd.checked==true)
	{
		document.getElementById('register').disabled=false;
		document.getElementById('register').style.color='#464646';	
	}
	else
	{
		document.getElementById('register').disabled=true;	
		document.getElementById('register').style.color='#999';	
	}
		
}


function echeck(str) {
	
		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
//		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
//		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
//		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
//		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
//		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
//		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
//		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
}
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=44)
            return false;
			
         return true;
      }


function validCodeForm(codeform)
{
	var rt=true;
	var username=codeform.username;
	var code=codeform.act_code;
	var uname_er=document.getElementById('uname_er');
	var code_er=document.getElementById('code_er');
	uname_er.style.visibility='hidden';
	code_er.style.visibility='hidden';
	username.style.border='1px solid #CCC';
	code.style.border='1px solid #CCC';
	if(username.value=="")
	{
		uname_er.style.visibility='visible';
		username.style.border='1px solid #ff0000';
		rt=false;
	}
	if(code.value=="")
	{
		code_er.style.visibility='visible';
		code.style.border='1px solid #ff0000';
		rt=false;
	}
	return rt;
}

// JavaScript Document
function checkuncheck()
{
	var st=document.getElementById('chkall');
	var x=document.getElementsByName("chk_con[]");
	if(st.checked==true)
	{
		for (i = 0; i < x.length; i++)
			x[i].checked = true ;
	}
	else
		for (i = 0; i < x.length; i++)
			x[i].checked = false ;
}

function isCheck()
{
		var x=document.getElementsByName("chk_con[]");
		var opt=document.getElementById('act').value;
		for (i = 0; i < x.length; i++)
		{
			if(x[i].checked == true)
			{
				if(opt==1)
					return confirm("Are you sure to delete?");
				else
					return true;
					
			}	
		}
		
		alert("Select contact");
		return false;
}
function setOption(val)
{
	var action=document.getElementById('act');
	action.value=val;
}

function isCheck_q()
{
		var x=document.getElementsByName("chk_con[]");
		for (i = 0; i < x.length; i++)
		{
			if(x[i].checked == true)
			{
				return confirm("Are you sure to delete messages?");				
			}	
		}
		
		alert("Select messages to delete");
		return false;
}

function validGroup()
{
	var er_name=document.getElementById('er_name');	
	var cus_gr=document.getElementById('cus_group');	
	var name=cus_gr.name;
	er_name.style.visibility='hidden';
	name.style.border='1px solid #ccc';
	if(name.value=="")
	{
		er_name.style.visibility='visible';
		name.style.border='1px solid #ff0000';
		return false;
	}
	
}

function validContactForm()
{
	var rt=true;	
	var er_name=document.getElementById('er_name');	
	var er_phone=document.getElementById('er_phone');	
	var er_group=document.getElementById('er_group');
	
	
	var cont_form=document.getElementById('c_form');	
	er_name.style.visibility='hidden';
	er_phone.style.visibility='hidden';
	er_group.style.visibility='hidden';

	var name=cont_form.name;
	var phone=cont_form.phone;
	var group=cont_form.group_id;


	name.style.border='1px solid #ccc';
	phone.style.border='1px solid #ccc';
	group.style.border='1px solid #ccc';
	
	
	if(name.value=="")
	{
		er_name.style.visibility='visible';
		name.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if(phone.value.length<12 || phone.value.charAt(0)=="0" )
	{
		er_phone.style.visibility='visible';
		phone.style.border='1px solid #ff0000';
		alert("Please enter mobile number in international format. Eg. 254733657122, 4477916745");
		rt=false;
	}
	



	if(group.selectedIndex==0)
	{
		er_group.style.visibility='visible';
		group.style.border='1px solid #ff0000';
		rt=false;
	}
	
	return rt;

}
function valid_singleSms()
{
	var phlist=document.getElementById('phone_list');
	var sender=document.getElementById('sender');
	var message=document.getElementById('txtmessage');
	var nig_code=document.getElementById('nig_code');
	var hy_ch=document.getElementById('hy_ch');
	var send_opt2=document.getElementById('send_opt2');
	var dt_picker=document.getElementById('popup_container'); 	
	
	if(phlist.value.length<10 || phlist.value.charAt(0)=="0")
	{
		alert("Please enter mobile number in international format. Eg. 254733657122, 4477916745");
		phlist.focus();
		return false;
		
	}
	
	if(sender.value=="")
	{
		alert("Please enter sender name.");
		sender.focus();
		return false;
	}
	
	if(send_opt2.checked==true && dt_picker.value=="" )
	{
		alert("Please select date.");
		dt_picker.focus();
		return false;
		
	}
	
	if(message.value=="")
	{
		alert("Please eneter message to send.");
		message.focus();
		return false;
	}
	

	phlist.value=nig_code.value+""+phlist.value;
	nig_code.style.width="0px";
	nig_code.style.visibility='hidden';
	hy_ch.style.visibility='hidden';
	//hy_ch.style.visibility='hidden';
	phlist.style.width="130px";
}

function changeSendOpt(opt)
{
		var sp_dateTime=document.getElementById('date_time');
		var pdate=document.getElementById('popup_container');
		var ptime=document.getElementById('time_picker');
	
		if(opt==1)
		{
			sp_dateTime.style.color='#CCCCCC';
			pdate.disabled=true;
			ptime.disabled=true;		
		}
		else
		{
			sp_dateTime.style.color='#666666';
			pdate.disabled=false;
			ptime.disabled=false; 
		}
			
}
function validContactUsForm(ctfom)
{
	var rt=true;

	var er_name=document.getElementById('er_name');
	var email_er=document.getElementById('email_er');
	var message_er=document.getElementById('message_er');
	var code_er=document.getElementById('code_er');
	
	er_name.style.visibility='hidden';
	email_er.style.visibility='hidden';
	message_er.style.visibility='hidden';
	code_er.style.visibility='hidden';
	
	ctfom.name.style.border='1px solid #ccc';
	ctfom.email.style.border='1px solid #ccc';
	ctfom.message.style.border='1px solid #ccc';
	ctfom.code.style.border='1px solid #ccc';
	

	if(ctfom.name.value=="")
	{
		er_name.style.visibility='visible';
		ctfom.name.style.border='1px solid #ff0000';
		rt=false;
	}

	if ((ctfom.email.value==null)||(ctfom.email.value==""))
	{
		email_er.style.visibility='visible';
		ctfom.email.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if (echeck(ctfom.email.value)==false)
	{
		email_er.style.visibility='visible';
		ctfom.email.style.border='1px solid #ff0000';
		rt=false;
	}

	if(ctfom.message.value=="")
	{
		message_er.style.visibility='visible';
		ctfom.message.style.border='1px solid #ff0000';
		rt=false;
	}
	if(ctfom.code.value=="")
	{
		code_er.style.visibility='visible';
		ctfom.code.style.border='1px solid #ff0000';
		rt=false;
	}
	
	
	return rt;
	
}



function validProfileForm()
{
	var rt=true;
	var name=document.getElementById('name');
	var email=document.getElementById('email');
	var mobno=document.getElementById('mobileno');
	var cell=document.getElementById('cell'); var umob=document.getElementById('mobileno');
	var addnew=document.getElementById('addnewoption');
	
	var er_name=document.getElementById('er_name');
	var email_er=document.getElementById('email_er');
	var cell_er=document.getElementById('cell_er');


	
	er_name.style.visibility='hidden';
	email_er.style.visibility='hidden';
	cell_er.style.visibility='hidden';
	


	name.style.border='1px solid #ccc';
	email.style.border='1px solid #ccc';
	cell.style.border='1px solid #ccc';
	
	
	if(name.value=="")
	{
		er_name.style.visibility='visible';
		name.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if(mobno.value=="" || mobno.value.length<10 || mobno.value.charAt(0)=="0"  )
	{
		alert("Please enter mobile number in international format. Eg. 254733657122, 4477916745");
		rt=false;
	}

	if(cell.value=="" && addnew.checked==true  )
	{
		cell_er.style.visibility='visible';
		cell.style.border='1px solid #ff0000';
		rt=false;
	}
	if(isNaN(cell.value) && cell.value.length>11 && addnew.checked==true)
	{
		alert("The number of characters should be maximum 11 for alphanumeric sender id")
		cell_er.style.visibility='visible';
		cell.style.border='1px solid #ff0000';
		rt=false;
	}
	if ((email.value==null)||(email.value==""))
	{
		email_er.style.visibility='visible';
		email.style.border='1px solid #ff0000';
		rt=false;
	}
	
	if (echeck(email.value)==false)
	{
		email_er.style.visibility='visible';
		email.style.border='1px solid #ff0000';
		rt=false;
	}

	
	return rt;
	
}
function validPassword()
{
	var form_sign=document.getElementById('sign');
	if(form_sign.oldpass.value=="")
	{
		alert("Enter old password");
		form_sign.oldpass.focus();
		return false;
		alert("called");
	}
	if(form_sign.pass1.value=="")
	{
		alert("Enter New Password");
		form_sign.pass1.focus();
		return false;
	}
	if(form_sign.pass2.value=="")
	{
		alert("Confirm New Password");
		form_sign.pass2.focus();
		return false;
	}
	if(form_sign.pass1.value!=form_sign.pass2.value)
	{
		alert("Password does not match");
		form_sign.pass1.select();
		return false;		
	}

	
}
function validRecoverPassword()
{

	var email=document.getElementById('email');
	if ((email.value==null)||(email.value==""))
	{
		alert("Enter a valid email address");
		email.focus();
		return false;
	}
	if (echeck(email.value)==false)
	{
		alert("Enter a valid email address");
		email.focus()
		return false;
	}

}
function valid_GroupSms()
{
	var phlist=document.getElementById('phone_list');
	var sender=document.getElementById('sender');
	var message=document.getElementById('txtmessage');
	var send_opt2=document.getElementById('send_opt2');
	var dt_picker=document.getElementById('popup_container'); 
	
	
	
	if(phlist.value=="")
	{
		alert("No contacts in the selected groups.");
		return false;
	}
	
	if(sender.value=="")
	{
		alert("Please enter sender name.");
		sender.focus();
		return false;
	}
	
	if(send_opt2.checked==true && dt_picker.value=="" )
	{
		alert("Please select date.");
		dt_picker.focus();
		return false;
		
	}
	
	if(message.value=="")
	{
		alert("Please eneter message to send.");
		message.focus();
		return false;
	}
	
}


function fixLen()
{

	var msg=document.getElementById('sms_msg');
	var ch_ind=document.getElementById('chleft');
	if(msg.value.length>169)
		return false;
}








function validBulkContactForm()
{
	var rt=true;	
	var er_file=document.getElementById('er_file');	
	var er_group=document.getElementById('er_group');
	
	
	var cont_form=document.getElementById('c_form');	
	er_file.style.visibility='hidden';
	er_group.style.visibility='hidden';

	var c_file=cont_form.txtcontacts;
	var group=cont_form.group_id;


	c_file.style.border='1px solid #999999';
	group.style.background='#999999';
	
	if(c_file.value=="")
	{
		er_file.style.visibility='visible';
		c_file.style.border='2px solid #ff0000';
		rt=false;
	}
	
	if(group.selectedIndex==0)
	{
		er_group.style.visibility='visible';
		group.style.background='#ff0000';
		rt=false;
	}
	return rt;

}



function valid_BulkSms()
{
	var rt;
	var txt_file =document.getElementById('phone_dir');
	if(txt_file.value=="")
	{
		alert("Please select a text file.");
		txt_file.focus();
		return false;

	}
	
	file=txt_file.value;
	var dot=file.indexOf('.');
	var len=file.length;
	var ext=file.substr(dot+1,len);
	if(ext.toUpperCase()=='TXT' || ext.toUpperCase()=='txt')
	{
			rt=true;
	}
	else
	{
			alert("This file is not valid. Upload txt file");
			txt_file.select();
			return false;
	}
		
	
	var sender=document.getElementById('sender');
	var message=document.getElementById('txtmessage');
	var send_opt2=document.getElementById('send_opt2');
	var dt_picker=document.getElementById('popup_container'); 	
	
	
	
	if(sender.value=="")
	{
		alert("Please enter sender name.");
		sender.focus();
		return false;
	}
	
	if(send_opt2.checked==true && dt_picker.value=="" )
	{
		alert("Please select date.");
		dt_picker.focus();
		return false;
		
	}	

	if(message.value=="")
	{
		alert("Please eneter message to send.");
		message.focus();
		return false;
	}
	
}







function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}





function insertAtCaret(obj, text) {
		if(document.selection) {
			obj.focus();
			var orig = obj.value.replace(/\r\n/g, "\n");
			var range = document.selection.createRange();

			if(range.parentElement() != obj) {
				return false;
			}

			range.text = text;
			
			var actual = tmp = obj.value.replace(/\r\n/g, "\n");

			for(var diff = 0; diff < orig.length; diff++) {
				if(orig.charAt(diff) != actual.charAt(diff)) break;
			}

			for(var index = 0, start = 0; 
				tmp.match(text) 
					&& (tmp = tmp.replace(text, "")) 
					&& index <= diff; 
				index = start + text.length
			) {
				start = actual.indexOf(text, index);
			}
		} else if(obj.selectionStart) {
			var start = obj.selectionStart;
			var end   = obj.selectionEnd;

			obj.value = obj.value.substr(0, start) 
				+ text 
				+ obj.value.substr(end, obj.value.length);
		}
		
		if(start != null) {
			setCaretTo(obj, start + text.length);
		} else {
			obj.value += text;
		}
	}
	
	function setCaretTo(obj, pos) {
		if(obj.createTextRange) {
			var range = obj.createTextRange();
			range.move('character', pos);
			range.select();
		} else if(obj.selectionStart) {
			obj.focus();
			obj.setSelectionRange(pos, pos);
		}
	}

function checkrange(buyform, lower, upper)
{
	/*alert(lower);
	//alert(upper);
	alert(buyform);*/
	if(buyform.amount.value=="")
	{
		alert("Enter value within range ("+lower+"-"+upper+")");
		buyform.amount.focus();
		return false;
	}
	/*alert(buyform);*/
	if(parseInt(buyform.amount.value)<parseInt(lower) || parseInt(buyform.amount.value)>parseInt(upper))
	{
		alert("Enter value within range ("+lower+"-"+upper+")");
		buyform.amount.select();
		return false;
	}
	else
		return true;
}

function validBulkContactForm()
{
    var rt=true;
    var er_file=document.getElementById('er_file');
    var er_group=document.getElementById('er_group');


    var cont_form=document.getElementById('c_form');
    er_file.style.visibility='hidden';
    er_group.style.visibility='hidden';

    var c_file=cont_form.txtcontacts;
    var group=cont_form.group_id;


    c_file.style.border='1px solid #999999';
    group.style.background='#999999';

    if(c_file.value=="")
    {
        er_file.style.visibility='visible';
        c_file.style.border='2px solid #ff0000';
        rt=false;
    }

    if(group.selectedIndex==0)
    {
        er_group.style.visibility='visible';
        group.style.background='#ff0000';
        rt=false;
    }
    return rt;

}
