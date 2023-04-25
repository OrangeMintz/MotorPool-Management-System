


window.onload = function () {
    const vbrand_selection = document.querySelector("#vehicle-brand")
    const vmodel_selection = document.querySelector("#vehicle-model")
    // disable all options 
    vmodel_selection.disabled = true; // remove all options bar first

    // Model Selection
    vbrand_selection.onchange = (e) => {vmodel_selection.disabled = false;

    };
  }//onload
  
let vnumber = document.getElementById('vehicle-number');
let addform = document.getElementById('vehicle-add');
let errormsg = document.getElementById('errormsg');

  $(".error").hide();

  addform.addEventListener('submit', (e) =>{
    let messages = [];

    if(vnumber.value.length < 5){
      messages.push('Vehicle Number should be equal to 5 numbers');

    }

    if(messages.length > 0){
      e.preventDefault()
      $(".error").show();
      errormsg.innerText = messages.join(', ')

    }
  })


  //EDIT VEHICLE
  function editVehicle(num){
    window.location="vehicleEdit.php?vehiclenumber=" + num;
  }