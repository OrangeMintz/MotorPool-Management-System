// Create a function that loads the Brand and Model
var vehiclesselector = {
    Toyota: [
        "Vios","RAV4"
    ],
    Honda: [
        "Accord","Odyssey"
    ],
    Nissan: [
        "Caravan","Altima"
    ],
    Ford: [
        "Next-Gen Everest","Next-Gen Ranger"
    ],
    Hyundai: [
        "Veloster","Creta"
    ],
    Chevrolet: [
        "Spark","Suburban"
    ],
    
    };
 
    // Get all input html elements from the DOM
    window.onload = function () {
    const vbrand_selection = document.querySelector("#vehicle-brand")
    const vmodel_selection = document.querySelector("#vehicle-model")

    // disable all options 
    vmodel_selection.readonly = true; // remove all options bar first

    // Brand Selection
    for (let brand in vehiclesselector) {
        vbrand_selection.options[vbrand_selection.options.length] = new Option(brand,brand);
    }

    // Model Selection
    vbrand_selection.onchange = (e) => {vmodel_selection.readonly = false;
      vmodel_selection.length = 1;

      let model = vehiclesselector[e.target.value];

      for (let i = 0; i < model.length; i++){
        vmodel_selection.options[vmodel_selection.options.length] = new Option(model[i],model[i])
      }
    };
  }//onload
  
let vnumber = document.getElementById('vehicle-number');
let vplate = document.getElementById('vehicle-plate');
let addform = document.getElementById('vehicle-add');
let errormsg = document.getElementById('errormsg');

  $(".error").hide();

  addform.addEventListener('submit', (e) =>{
    let messages = [];

    if(vnumber.value.length < 5){
      messages.push('Vehicle Number should be equal to 5 numbers');

    }

    else if(vplate.value.length < 5){
        messages.push('Vehicle Plate should contain 5 characters');

      }

    if(messages.length > 0){
      e.preventDefault()
      $(".error").show();
      errormsg.innerText = messages.join(', ')

    }
  })

  //EDIT VEHICLE
  function editVehicle(num){
    window.location="vehicleedit.php?vehiclenumber=" + num;
  }

  //DELETE VEHICLE
  function deleteVehicle(num){

    $('#delete').modal('show');

    $('#delete-btn').click(function() {
      // Send the POST request to delete the vehicle
      $.post("includes/db_vehicle_delete.php",{num:num},function(data, status){
        if(status == "success"){
          window.location="vehicle.php"
          // Hide the modal
          $('#delete').modal('hide');
        }
        else{
          window.location="vehicle.php"
        }
      });
      
    });
  }
  
  $('.vehicletable').DataTable();

  

