//chk();//calling
function chk() {
	var marks = "11";
	var res = isNaN(marks);
	alert(res);
}

function doTotal() 
{
	//var cppS = document.frm.txtCpp.value; //returns string
	var cppS = document.getElementById("txtCpp").value;
	var javaS = document.getElementById("txtJava").value;
	var webS = document.getElementById("txtWeb").value;
	if(document.getElementById("c").value=="1" && document.getElementById("j").value=="1" && document.getElementById("w").value=="	1")
				{
		//parseInt():converts string to integer
		//parseFloat(): con. string to float
		sum = parseFloat(cppS) + parseFloat(javaS) + parseFloat(webS);
		document.getElementById("txtTotal").value = sum;
		document.getElementById("btnTotal").disabled = false;
		}
	else

	{
			alert("fill valid data");
		}

	
}
var sum = 0, per = 0;


function doMurder() {
	//alert();
	document.getElementById("txtTotal").disabled = true;
	document.getElementById("txtPer").disabled = true;
}

function chkMarks(ref,refErr,hdn)
{	
	/*var refCpp=document.getElementById("txtCpp");
	var refErr=document.getElementById("errCpp");*/
	
	
	if(ref.value.length==0)
	{
		refErr.innerHTML="Fill marks";
		ref.style.backgroundColor="red";
		hdn.value="0";
	}
	else
		if(isNaN(ref.value)==true)
		{
			refErr.innerHTML="Fill Numeric";
					hdn.value="0";

		}
	else
		{
					refErr.innerHTML="okay..";
					ref.style.backgroundColor="white";
					hdn.value="1";
		}
	
}


