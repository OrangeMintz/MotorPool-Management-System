
// validations
$('input').each(function (index, elem){

    if(elem.id == 'driver-phone'){
        elem.placeholder = "09*********";
        elem.maxlength = "6";

    }
    if(elem.id == 'driver-id'){
        elem.placeholder = "1000";

    }

    if(elem.id == 'driver-email'){
        elem.placeholder = "example@gmail.com";

    }
// validations


})


// Create a function that loads the Province, City, Barangay
var locationSelector = {
    "Agusan del Norte": {
        Agusan: ["Agusan","del Norte"],
        Norte: ["Agusan","del Norte"],
      },

      Bukidnon: {
        Bukid: ["Bukid", "Non"],
        Non: ["Bukid","Non"]
      },

      Camiguin: {
        Cami: ["Cami","Guin"],
        Guin: ["Cami","Guin"],
      },

      "Davao de Oro": {
        Davao: ["Davao","de Oro"],
        "de Oro": ["Davao","de Oro"],
      },


    };
 
    // Get all input html elements from the DOM
    window.onload = function () {
    const provinceSelection = document.querySelector("#driver-province")
    const citySelection = document.querySelector("#driver-city")
    const barangaySelection = document.querySelector("#driver-barangay")

    // disable all options 
    citySelection.disabled = true; // remove all options bar first
    barangaySelection.disabled = true; // remove all options bar first

    // Province Selection
    for (let province in locationSelector) {
      provinceSelection.options[provinceSelection.options.length] = new Option(province,province);
    }

    // City Selection
    provinceSelection.onchange = (e) => {citySelection.disabled = false;
      citySelection.length = 1;
      barangaySelection.length = 1;
  
      for (let city in locationSelector[e.target.value]) {
        citySelection.options[citySelection.options.length] = new Option(city,city);
      }
    };


    // Barangay Selection
    citySelection.onchange = (e) => {barangaySelection.disabled = false;
      barangaySelection.length = 1;

      let barangay = locationSelector[provinceSelection.value][e.target.value];

      for (let i = 0; i < barangay.length; i++){
        barangaySelection.options[barangaySelection.options.length] = new Option(barangay[i],barangay[i])
      }
    };
  }//onload


$('#add-btn').click(function (){

        alert(document.getElementById('driver-city').value)

})