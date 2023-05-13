$(".error").hide();


  //DELETE APPOINTMENT
  function deleteAppointment(num){
    $('#delete').modal('show');
    $('#delete-btn').click(function() {
      // Send the POST request to delete the vehicle
      $.post("includes/db_appoint_delete.php",{num:num},function(data, status){
        if(status == "success"){
          window.location="appoint.php"

          // Hide the modal
          $('#delete').modal('hide');
        }
        else{
          alert("Cannot delete Appointed Vehicle Driver");
          window.location="appoint.php"

        }
      });
      
    });
  }

    //EDIT VEHICLE
    function editAppointment(num){
      window.location="appointedit.php?appointed=" + num;
    }

$('.appointTable').DataTable();
   
  
    
  

  

