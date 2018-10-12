function textCounter(field, maxlimit) 
	    { 
	    if (field.value.length > maxlimit)
		    { 
			    field.value = field.value.substring(0, maxlimit);
			    return maxlimit;
		    }	
    		
	    else{ 
		    return  maxlimit - field.value.length;
		    }
}
	
function setCounter()
  		
{
        var ilen;
        ilen = textCounter(document.form1.txtmessage,document.form1.hiddcount.value );
	    document.form1.lblno.value  = ilen + "/" + document.form1.hiddcount.value ; 
}

function setMessageLength()

{
		    if(document.form1.ddtype.value=="0")
		    {
			    document.form1.hiddcount.value = "160" ;
			    setCounter();
		    }
		    if(document.form1.ddtype.value=="1")
		    {
			    document.form1.hiddcount.value  = "160";
			    setCounter();	
    				
		    }
		    if(document.form1.ddtype.value=="2")
		    {
			    document.form1.hiddcount.value  = "280";
			    setCounter();
		    }
    		
}

function CheckAll(chk)
{
			for (var i=0;i < document.form1.elements.length;i++)
			{
				var e = document.form1.elements[i];
				if (e.type == "checkbox")
				{
					e.checked = chk.checked;
				}
			}
}
			
function Check(chk,mainchk)
{
		
		if (chk.type == "checkbox")
			{
			if (chk.checked==0)
			{
				mainchk.checked = chk.checked;
				
			}
			
		}
}
	
