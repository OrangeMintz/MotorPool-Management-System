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
  function editAppoint(num){
    window.location="appointedit.php?appointed=" + num;
  }


  //DELETE VEHICLE
  function deleteAppointment(num){
    $('#delete').modal('show');
    $('#delete-btn').click(function() {
      // Send the POST request to delete the vehicle
      $.post("includes/db_appoint_delete.php",{num:num},function(data, status){
        if(status == "success"){
          window.location="appoint.php?appointed_vehicle_driver_deleted_successfully";
          // Hide the modal
          $('#delete').modal('hide');
        }
        else{
          alert("Cannot delete Appointed Vehicle Driver");
        }
      });
      
    });
  }
  $('.appointTable').DataTable();

  

