let driverID = document.getElementById('driver-id');
let vNumber = document.getElementById('vehicle-number');
let origin = document.getElementById('trips-origin');
let destination = document.getElementById('trips-destination');
let addform = document.getElementById('trip-add');
let errormsg = document.getElementById('errormsg');

  $(".error").hide();

  addform.addEventListener('submit', (e) =>{
    let messages = [];

    if(driverID.value.length != 4){
      messages.push('Driver ID should be equal to 4 characters');
    }

    else if(vNumber.value.length != 5){
      messages.push('Vehicle Number should be equal to 5 characters');
    }

    else if(origin.value.length < 4){
        messages.push('Origin should be atleast 4 characters');
    }

    else if(destination.value.length < 4){
        messages.push('Destination should be atleast 4 characters');
    }

    if(messages.length > 0){
      e.preventDefault()
      $(".error").show();
      errormsg.innerText = messages.join(', ')
    }
  })



let driverID2 = document.getElementById('driver-id2');
let vNumber2 = document.getElementById('vehicle-number2');
let origin2 = document.getElementById('trips-origin2');
let destination2 = document.getElementById('trips-destination2');
let addform2 = document.getElementById('trip-edit');
let errormsg2 = document.getElementById('errormsg2');

  $(".error2").hide();

  addform2.addEventListener('submit', (e) =>{
    let messages = [];

    if(driverID2.value.length != 4){
      messages.push('Driver ID should be equal to 4 characters');
    }

    else if(vNumber2.value.length != 5){
      messages.push('Vehicle Number should be equal to 5 characters');
    }

    else if(origin2.value.length < 4){
        messages.push('Origin should be atleast 4 characters');
    }

    else if(destination2.value.length < 4){
        messages.push('Destination should be atleast 4 characters');
    }

    if(messages.length > 0){
      e.preventDefault()
      $(".error2").show();
      errormsg2.innerText = messages.join(', ')
    }
  })


