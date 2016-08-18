function ajax_innerHTML___1_1__dkl(duong_dan,id)
{
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById(id).innerHTML=xmlhttp.responseText;
		doscript_ajax_innerHTML___1_1__dkl(xmlhttp.responseText);
		//eval(alert("chao"););
		}
	  }
	  //alert(+duong_dan);
	xmlhttp.open("GET",duong_dan);
	xmlhttp.send(null);
}
function doscript_ajax_innerHTML___1_1__dkl(st){
//alert(st);
   var p1=st.indexOf("\<script\>");
	//alert(p1);
   while (p1 != -1)
   {
       var p2=st.indexOf("\</script\>",p1);
       var code=st.substr(p1+8,p2- p1 -8);
	   //alert(code);
       eval(code);
       p1=st.indexOf("\<script\>",p2);
   }
   //alert("doscript " + st);
   //alert(p1);
}
function table_css(id)
{
	//alert("vao day");
	//alert(id);
	var lay_id=document.getElementById(id);
	lay_id.className="table__abc";
	//alert(lay_id);
	var cac_tr=lay_id.getElementsByTagName("tr");
	for(j=0;j<cac_tr.length;j++)
	{
		cac_tr[j].onmouseover=function()
		{
			this.id="table__abc___tr_td_hover";
			var cac_td=this.getElementsByTagName("td");
			for(k=0;k<cac_td.length;k++)
			{
				//cac_td[k].style.background="black";
				cac_td[k].id="table__abc___tr_td_hover";
			}
		}
		cac_tr[j].onmouseout=function()
		{
			this.id="table__abc___tr_td";
			var cac_td=this.getElementsByTagName("td");
			for(k=0;k<cac_td.length;k++)
			{
				cac_td[k].id="table__abc___tr_td";
			}
		}
	}
}
function table_css_1(id)
{
	//alert("vao day");
	//alert(id);
	var lay_id=document.getElementById(id);
	lay_id.className="table__abc";
	//alert(lay_id);
	var cac_tr=lay_id.getElementsByTagName("tr");
	//alert(tr_dau[0]);
	var cac_td_dau=cac_tr[0].getElementsByTagName("td");
	//alert(cac_td_dau);
	for(i=0;i<cac_td_dau.length;i++)
	{
		//alert(cac_td_dau[i]);
		cac_td_dau[i].className="table__abc___tr_td__dau";
		//cac_td_dau[i].style.color="red";
	}

}
function table_css_2(id)
{
	var lay_id=document.getElementById(id);
	lay_id.className="table__abc";
	var cac_tr=lay_id.getElementsByTagName("tr");
	var cac_td_dau=cac_tr[0].getElementsByTagName("td");
	for(i=0;i<cac_td_dau.length;i++)
	{
		cac_td_dau[i].className="table__abc___tr_td__dau";
	}
	for(j=1;j<cac_tr.length;j++)
	{
		var cac_td=cac_tr[j].getElementsByTagName("td");
		cac_tr[j].onmouseover=function()
		{
			this.id="table__abc___tr_td_hover";
			var cac_td=this.getElementsByTagName("td");
			for(k=0;k<cac_td.length;k++)
			{
				//cac_td[k].style.background="black";
				cac_td[k].id="table__abc___tr_td_hover";
			}
		}
		cac_tr[j].onmouseout=function()
		{
			this.id="table__abc___tr_td";
			var cac_td=this.getElementsByTagName("td");
			for(k=0;k<cac_td.length;k++)
			{
				cac_td[k].id="table__abc___tr_td";
			}
		}
	}
}

