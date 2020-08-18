function control(ref,t)
{//alert(1)
 if(t.disabled)
 t.disabled=false  ;
 else
     {
     t.disabled=true  ;
         t.value='';
     }
    //alert(1)
t.focus()  ;
 


 
}
var bill=0,tot=0,dis=0,td=0;
function bil()
{//alert(1)
    tot=0;
    var nm=document.getElementById('tmob')
    var nl=document.getElementById('tlap')
    var nb=document.getElementById('tbook')
    
    if(nm.disabled==false)
        tot=tot+(40000*parseInt(nm.value));
    if(nl.disabled==false)
        tot=tot+(200000*parseInt(nl.value));
    if(nb.disabled==false)
        tot=tot+(500*parseInt(nb.value));
  td=tot  
 if(document.getElementById('dis10').checked)
   {  dis=.1*tot;
 td=tot-dis;
   }
 if(document.getElementById('dis20').checked)
   {  dis=.2*tot;
 td=tot-dis;
   }
 
     alert(tot)
document.getElementById('total').value=td;
document.getElementById('tdis').value=dis;
    
    
    
    
    
    
    
    
}