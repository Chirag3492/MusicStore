<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
var msg, display, submitBtn;

var listener =	function(event){
		event.preventDefault();
	};

window.onload = function(){
	submitBtn = document.getElementById('submit');
	submitBtn.setAttribute('class', 'disabled');
	submitBtn.addEventListener('click', listener, false);
}


function usrName(u){
	
	var checkusr = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
	display = document.getElementById('usrmsg');
	
	if(!u.match(checkusr)){
		display.setAttribute('class','err');
		msg = display.textContent = 'Please enter a valid email';
	} else {
		display.removeAttribute('class');
		msg = display.textContent = '';
	}
	
} 

function pswrdChk(p){
	
	var checkpswd = /^[A-Z]{1}[a-zA-z0-9]{6,12}/g;
	display = document.getElementById('pswdmsg');
	
	if(!p.match(checkpswd)){
		
		display.setAttribute('class','err');
		msg = display.textContent = 'Password must be at least 8 characters and must start with a capital letter';
		
	} else {
		display.removeAttribute('class');
		msg = display.textContent = '';
		
	}
	
	
} 

function validateFld(){
	var count, i;
	var err = document.getElementsByTagName('input');
	debugger;
	for(i=0;i<err.length;i++){
		
		if(err[i].value == ''){
			return;
		} else {
			err[i].removeAttribute('class');
			submitBtn.removeEventListener('click',listener,false);
		}
		
	}
	
	
}//End function 
	

</script>
<body>

<form action="register.php"  method = "POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h2 class="w3-center">Sign-Up</h2>
 

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border"  name="name" type="text" placeholder="First Name">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border"  name="lname" type="text" placeholder="Last Name">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border"  type="email" name="email"  placeholder="Email"  onkeypress="usrName(this.value)"  autocomplete="off">
      <span id="usrmsg"></span>
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="password"  type="password" id="pswrd" placeholder="password" onkeypress="pswrdChk(this.value)">
        <span id="pswdmsg"></span>
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="password" type="password" id="pswrd" placeholder="password confirm" onkeypress="pswrdChk(this.value)" >
        <span id="pswdmsg"></span>
    </div>
</div>


<button class="w3-btn-block w3-section w3-blue w3-ripple w3-padding" name="submit_btn" type="submit" >Submit</button>

</form>

</body>
</html> 
