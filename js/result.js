chk();//calling
function chk() {
	var marks = "11";
	var res = isNaN(marks);
	alert(res);
}

function doTotal() 
{
	var cppS = document.frm.txtCpp.value; //returns string
	var javaS = document.frm.txtJava.value;
	var webS = document.frm.txtWeb.value;

	var cppB = isNaN(cppS);//returns boolean
	var javaB = isNaN(javaS);
	var webB = isNaN(webS);
	
	if(cppB==true)
		document.frm.txtCpp.style.backgroundColor="red";
	else
		document.frm.txtCpp.style.backgroundColor="white";
	
	if(javaB==true)
		document.frm.txtJava.style.backgroundColor="red";
	else
		document.frm.txtJava.style.backgroundColor="white";

	if(webB==true)
		document.frm.txtWeb.style.backgroundColor="red";
	else
		document.frm.txtWeb.style.backgroundColor="white";

	
	
	if (cppB == false && javaB == false && webB == false) 
	{
		//parseInt():converts string to integer
		//parseFloat(): con. string to float
		sum = parseFloat(cppS) + parseFloat(javaS) + parseFloat(webS);

		document.frm.txtTotal.value = sum;
		document.frm.btnTotal.disabled = false;
	}
	/*else
		alert("fill numerics plz");*/

}
var sum = 0,
	per = 0;

function doPer() {
	//per=sum*100/300;
	sum = document.frm.txtTotal.value;
	per = sum * 100 / 300;
	document.frm.txtPer.value = per;
}

function doMurder() {
	//alert();
	document.frm.txtTotal.disabled = true;
	document.frm.txtPer.readOnly = true;
}

function doNew() {
	//alert();
	document.frm.txtCpp.value = "";
	document.frm.txtJava.value = "";
}