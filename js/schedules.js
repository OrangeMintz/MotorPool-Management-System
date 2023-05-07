$(".error").hide();


 //DELETE SCHEDULE
 function deleteSchedule(num){
    $('#delete').modal('show');
    $('#delete-btn').click(function() {
      // Send the POST request to delete the schedule
      $.post("includes/db_schedule_delete.php",{num:num},function(data, status){
        if(status == "success"){
          window.location="schedule.php"
          // Hide the modal
          $('#delete').modal('hide');
        }
        else{
          alert("Cannot delete Schedule");
          window.location="schedule.php"

        }
      });
      
    });
  }

  //EDIT VEHICLE
  function editSchedule(num){
  window.location="scheduleedit.php?schedule=" + num;
  }



$('.scheduleTable').DataTable();
