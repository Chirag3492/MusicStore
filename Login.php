
<html>
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #0000FF;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
<script type="text/javascript">
var msg, display, submitBtn;



window.onload = function(){
	submitBtn = document.getElementById('submit');
	submitBtn.disabled = true;
	
}

function usrName(u){
	
	var checkusr = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
	display = document.getElementById('usrmsg');
	
	if(u.match(checkusr)){
		
		msg = display.innerHTML = '';
		
		return msg;
	} else {
		display.style.color = 'red';
		msg = display.innerHTML = 'Incorrect username';
		
		return msg;
	}
	
} 

function pswrdChk(p){
	
	var checkpswd = /^[A-Z]{1}[a-zA-z0-9]{6,12}/g;
	display = document.getElementById('pswdmsg');
	
	if(p.match(checkpswd)){
		
		msg = display.innerHTML = '';
		
		return msg;
	} else {
		display.style.color = 'red';
		msg = display.innerHTML = 'Incorrect password';
		
		return msg;
	}
	
	
} 
function validateFld(){
	var count = 0;
	var uname = document.getElementById('usrnm');
	var pword = document.getElementById('pswrd'); 
	
	
		
		if(uname.value == '' || pword.value == ''){
			count++;
		}else {
			count = 0;
		}

	
	if(count == 0){
		submitBtn.disabled = false;
	}
	
}//End function


</script>
</style>

<body>

<h2>Login Form</h2>

<form action="Signin.php" method="POST">

    <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usrnm" id="usrnm" onKeyPress="usrName(this.value)" autocomplete="off" required>
     <span id="usrmsg"></span>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pswrd" id="pswrd" onkeypress="pswrdChk(this.value)"  required>
     <span id="pswdmsg"></span>  
    <button type="submit">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>


</body>
</html>
