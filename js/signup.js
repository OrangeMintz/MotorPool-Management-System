let username = document.getElementById('username');
let password = document.getElementById('password');
let fullname = document.getElementById('fullname');
let address = document.getElementById('location');
let number = document.getElementById('pnumber');
let submit = document.getElementById('createacc');
let errormsg = document.getElementById('errormsg');

$(".error").hide();

submit.addEventListener('submit', (e) =>{
  let messages = [];

  if(username.value.length < 5){
    messages.push('Username should be at least 5 characters long');
  }
  else if(username.value.trim() === ""){
    messages.push('Username should not be empty');
  }

  else if(username.value.trim().length < 5){
    messages.push('Username should be at least 5 characters long');

  }

  else if(password.value.length < 8){
    messages.push('Password should be at least over 8 characters long');
  }

  else if(fullname.value.length < 5){
    messages.push('Full name should be at least over 5 characters long');
  }

  else if(address.value.length < 8){
    messages.push('Address should be complete');
  }

  else if(number.value.length != 10){
    messages.push('Phone number should be equal to 10 numbers');
  }

  if(messages.length > 0){
    e.preventDefault()
    $(".error").show();
    errormsg.innerText = messages.join(', ')
  }
})
