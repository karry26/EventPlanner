var bill=0 ,gst=0,tot=0;
function doBill()
{var unitB = isNaN(document.form.Tunits.value);//returns boolean
	var loadB = isNaN(document.form.Tloads.value);
	
	if(unitB == true)
	   document.form.Tunits.style.backgroundColor="red";
	else
		document.form.Tunits.style.backgroundColor="white";
	
	if(loadB == true)
		document.form.Tloads.style.backgroundColor="red";
	else
		document.form.Tloads.style.backgroundColor="white";
//    alert(unitB);
//	alert(loadB);
	if(loadB == false && unitB == false)
 {
  //     alert("1")
    bill=10*parseInt(document.form.Tunits.value)+
        100*parseInt(document.form.Tloads.value);
  document.form.Bgst.disabled=false
       document.form.Tbill.value=bill;
   }
       }
function dogst()
{
    gst=18/100*bill;
    document.form.Tgst.value=gst;
    document.form.Btot.disabled=false;
    
}
function dotot()
{
    tot=gst+bill;
    document.form.Ttot.value=tot;
}
function donew()
{
    document.form.Tunits.value='';
    document.form.Tloads.value='';
    document.form.Tbill.value='';
    document.form.Ttot.value='';
    document.form.Tgst.value='';
    document.form.Bgst.disabled=true;
    document.form.Btot.disabled=true;
}