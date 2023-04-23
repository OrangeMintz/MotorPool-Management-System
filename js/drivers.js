
// Create a function that loads the Province, City, Barangay
var locationSelector = {
    "Agusan del Norte": {
        Agusan: ["Agusan","del Norte"],
        Norte: ["Agusan","del Norte"],
      },

      Bukidnon: {
        Valencia: ["Poblacion", "Bagontaas"],
        Malaybalay: ["Aglayan","Casisang"]
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


  let fname = document.getElementById('driver-first-name');
  let lname = document.getElementById('driver-last-name');
  let id = document.getElementById('driver-id');
  let phonenumber = document.getElementById('driver-phone');
  let addform = document.getElementById('driver-add');
  let errormsg = document.getElementById('errormsg');

  $(".error").hide();


  addform.addEventListener('submit', (e) =>{
    let messages = [];

    if(fname.value.length < 2){
      messages.push('First name should be longer than 2 characters');
    }

    else if(lname.value.length < 2){
      messages.push('Last name should be longer than 2 characters');
    }

    else if(id.value.length != 4){
      messages.push('ID should be equal to 4 numbers');
    }

    else if(phonenumber.value.length != 10){
      messages.push('Phone number should be equal to 10 numbers');
    }

    if(messages.length > 0){
      e.preventDefault()
      $(".error").show();
      errormsg.innerText = messages.join(', ')
    }
  })




  



