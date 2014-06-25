


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Company Registration</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#logo{
color:#FFFFFF;
font-size: 42px;;
width:300px;
margin: 20px ;
float :left;
}
.style7 {font-size: 16px; color: #FF0000;}

legend{
font-size:15px;
font-weight:bold;

}

.vali{
visibility:hidden;
}

#preloadimg{
visibility:hidden;
}
-->
</style>


 
<script type="text/javascript" >
var frm=new Object();
var fields=["name","address","email","tele","country","url","description","con_name","con_post","con_email","con_tele"];

	for(j=0;j<fields.length;j++){
	
		frm[fields[j]]=0;
	
	}frm['country']=1;


function submitForm()
{document.getElementById("preloadimg").style.visibility="visible";
var valiRule=["Name","Address","Email Address","Telephone Number","","URL","Description","Name","Post","Email Address","Telephone Number"];
var isvalidate=true;
var txt="";
	
	for(j=0;j<fields.length;j++ ){
		var f=document.getElementById("com").elements[fields[j]];		

			if(!frm[fields[j]])
			{
				
				validation(f,valiRule[j]);
				isvalidate=false;
				continue;
			}
		
	txt=txt+f.name+"="+f.value+"&";
	}
	


	
	txt=txt.substring(0,txt.length-1);

	if(isvalidate)
	{	

		var xmlhttp=useajax(txt,"register.php","post",true);

		xmlhttp.onreadystatechange=function(){
			
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				
				document.getElementById("preloadimg").style.visibility="hidden";
				document.getElementById("prelodmsg").innerHTML=xmlhttp.responseText;
				

			}
		}		
	}
	else
	 return ;




}



function validation(x,y)
{	
	var pattern;
	var isServerCheck=false;
	switch(y)
	{
		case "URL":pattern= /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi; isServerCheck=true;break;
		case "Telephone Number":pattern=/[0-9]{10}/;break;
		case "Email Address": pattern=/^[-0-9a-z]+(\.[0-9a-z-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,4}$/;isServerCheck=true; break;
		case "Name":pattern=/([a-zA-Z]+\s*)+/;break;
		case "Post":pattern=/([a-zA-Z]+\s*)+/;break;
		case "Address":pattern=/([a-zA-Z0-9,.]+\s*)+/;break;
		case "Company Name":/w+/; isServerCheck=true; break;
		case "Description":/w+/;break;
	}
	return formatItem(x,pattern,y,isServerCheck);
}



function formatItem(x,pattern,y,serverCheking)
{
i=x.parentNode.getElementsByTagName("img")[0];
msg=x.parentNode.getElementsByTagName("span")[0];
msg.style.color="red";
msg.style.fontSize="13px";

	msg.innerHTML="";
	if(x.value==null || x.value==""){
		i.src="images/Invalid.png";
		msg.innerHTML=y+" cannot be left blank !!!"
		i.style.visibility="visible";
		return false;
	}else{

		if(x.value.match(pattern)){

			if(serverCheking)
			{   
				ms= "field="+x.name+"&table=comp_Reg&value="+x.value+"";
				i.src="images/wait.gif";
				var xmlhttp=useajax(ms,"serverCheck.php","POST",true);
		

				xmlhttp.onreadystatechange=function(){
			
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					
					if(xmlhttp.responseText==0 || xmlhttp.responseText=="0" )
					{			
						i.src="images/correct.gif";
						i.style.visibility="visible";
						frm[x.name]=1;
						return true;
						
					}
					else
					{
						i.src="images/Invalid.png";
						msg.innerHTML=""+xmlhttp.responseText+" Is Already Exist!!";
						i.style.visibility="visible";
							frm[x.name]=0;
						return false;
					} 
				  	

				}
  											
				
			}
			}
			else
			{
			i.src="images/correct.gif";
			msg.innerHTML="";
			i.style.visibility="visible";
		frm[x.name]=1;
			return true;
			}

		}
		else
		{

		i.src="images/Invalid.png";
		msg.innerHTML="Invalid "+y+"!!";
		i.style.visibility="visible";
		frm[x.name]=0;
		return false;
		}
	}

}





function useajax(input,action,method,asyncronized){
	var temp;
	var xmlhttp;
	if (window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open(method,action,asyncronized);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(input);

	return xmlhttp;
}


</script>
</head>

<body>


  <div>
  <div id="conten">
  
  
  <div id="register" class="in">
  <H2>Company Registration<br />
  </H2>
  <hr align="left" width="450" />
  <form action="" method="post" id="com" onsubmit="submitForm();return false;">
    <fieldset > <legend>Company Details</legend>
  <table width="450" border="0" cellpadding="2" cellspacing="5" >
    <tr>
      <td width="125" align="right" >Company Name :</td>
      <td width="275"><div class="reg">
    <input name="name" onkeyup="validation(this,'Company Name')"  onblur="validation(this,'Company Name')"  type="text" size="23" maxlength="50" id="fname" placeholder="Required" required required="required" ok="true">
     <img class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span> </div></td>
    </tr>
    
    <tr>
      <td align="right" >Address :</td>
      <td><div class="reg"><input name="address" onkeyup="validation(this,'Address')"  onblur="validation(this,'Address')" type="text" size="23" maxlength="100" id="pass" placeholder="Required" required required="required">
         <img class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span>


 </div></td>
    </tr>
    
      <td align="right">Email :</td>
      <td><div class="reg"><input name="email" type="email" onkeyup="validation(this,'Email Address')" onblur="validation(this,'Email Address')" size="23" maxlength="50" id="email" placeholder="Required" required required="required">
     
	    <img class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span>
 </div></td>
    </tr>
  <td align="right" >Telephone :</td>
      <td><div class="reg"><input name="tele" onkeyup="validation(this,'Telephone Number')"  onblur="validation(this,'Telephone Number')" type="text" size="23" maxlength="100" id="pass" placeholder="0790000000" >
          <img class="vali"  src="images/wait.gif" height="20px" width="20px"><br><span></span>

</div></td>
    </tr>


    <tr>



      <td align="right">Country :</td>
      <td><div class="reg" >
        
        <select name="country"  class="fields" id="country" required required="required">
<option value="" selected="selected">--select--</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote D Ivoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curacao">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea South">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands (Holland Europe)">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka" selected="selected" selected>Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
            <img class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span>
        
      </div></td>
    </tr>
    
    <tr>
      <td align="right">Company Website :</td>
      <td><div class="reg">
      
      <input type="text" name="url" onkeyup="validation(this,'URL')" onblur="validation(this,'URL')" size=23 placeholder="http://www.example.com" required required="required">
          <img  class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span>
      
      
      
      </div></td>
    </tr>
      <tr>
      <td align="right">Company Description :<br>(Will be posted)&nbsp;</td>
      <td><div class="reg">
      
      <textarea  name="description" onkeyup="validation(this,'Description')" onblur="validation(this,'Description')" rows="10" cols="20" required required="required"></textarea>
      
          <img class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span>
      
      
      </div></td>
    </tr>



   
	

  




 





  </table>
  </fieldset >

  <fieldset > <legend>Contact Person</legend>
  <table width="450" border="0" cellpadding="2" cellspacing="5" >
<tr>
      <td width="125" align="right">contact Name :</td>
      <td width="271"><div class="reg">
    <input name="con_name" type="text" size="23" maxlength="50" onkeyup="validation(this,'Name')" onblur="validation(this,'Name')" id="conname" required required="required" placeholder="Required">
    <img  class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span>
      </div></td>
    </tr>
     <tr>
      <td align="right" >Post :</td>
      <td><div class="reg"><input name="con_post" type="text" size="23" onkeyup="validation(this,'Post')" onblur="validation(this,'Post')" maxlength="100" id="pass" placeholder="Required" required required="required">
          <img class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span>

</div></td>
    </tr>
    <tr>
      <td align="right" >Email :</td>
      <td><div class="reg"><input name="con_email" type="text" size="23" maxlength="100" id="pass" onblur="validation(this,'Email Address')"  onkeyup="validation(this,'Email Address')" placeholder="Required" required required="required">
         <img class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span> </div></td>
    </tr>

   <tr>
      <td align="right" >Telephone :</td>
      <td><div class="reg"><input name="con_tele" type="text" size="23" maxlength="100" id="pass" onkeyup="validation(this,'Telephone Number')"     onblur="validation(this,'Telephone Number')" placeholder="optional" >
          <img class="vali" src="images/wait.gif" height="20px" width="20px"><br><span></span></div></td>
    </tr>

 

</table>
</fieldset>

<table width="450" border="0" cellpadding="2" cellspacing="5" >

   <tr >
      <td colspan="2" align="right"><input type="button" onclick="submitForm()" name="register" class="btn" value="Register">&nbsp;<input type="reset" name="reset" class="btn" value="Reset"></td>
      </tr>
    <tr>
      <td colspan="2" class="style7" id="status" ></td>
      </tr>
</table>



  </form>
  </div>
  </div>
 </div>
<div id="prelod">
<img id="preloadimg" src="images/process.gif" align="center">
<br><span id="prelodmsg"></span>

</div>
 <div id="bottom">

 </div>

<script>





/* document.getElementById("status").innerHTML="Please wait.......";
txt='email='+em+'&uname='+un+'&lname='+ln+'&day='+bd+'&year='+by+'&month='+bm+'&country='+country+'&ans='+ans+'&rpass='+rp+'&sq='+sq+'&fname='+fn+'&sex='+sx+'&pass='+pa;*/
//result=useajax("register.php",txt,"status");



</script>
</body>
</html>
