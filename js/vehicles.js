// Create a function that loads the Brand and Model
var vehiclesselector = {
    Toyota: [
        "Vios", "Hiace"
    ],
    Honda: [
        "Vios", "Hiace"
    ],
    Nissan: [
        "Vios", "Hiace"
    ],
    Ford: [
        "Vios", "Hiace"
    ],
    Hyundai: [
        "Vios", "Hiace"
    ],
    Suburban: [
        "Vios", "Hiace"
    ],
    
    };
 
    // Get all input html elements from the DOM
    window.onload = function () {
    const vbrand_selection = document.querySelector("#vehicle-brand")
    const vmodel_selection = document.querySelector("#vehicle-model")

    // disable all options 
    vmodel_selection.disabled = true; // remove all options bar first

    // Brand Selection
    for (let brand in vehiclesselector) {
        vbrand_selection.options[vbrand_selection.options.length] = new Option(brand,brand);
    }

    // Model Selection
    vbrand_selection.onchange = (e) => {vmodel_selection.disabled = false;
      vmodel_selection.length = 1;

      let model = vehiclesselector[e.target.value];

      for (let i = 0; i < model.length; i++){
        vmodel_selection.options[vmodel_selection.options.length] = new Option(model[i],model[i])
      }
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