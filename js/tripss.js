let origin = document.getElementById('trips-origin');
let destination = document.getElementById('trips-destination');
let addform = document.getElementById('trip-add');
let errormsg = document.getElementById('errormsg');

$(".error").hide();

addform.addEventListener('submit', (e) =>{
    let messages = [];

    // const regex = /^[a-zA-Z0-9\s\-\,\[\]]+$/;

    // if(!regex.test(origin.value)){
    //     messages.push('Origin contains invalid characters');
    // }

    // if(!regex.test(destination.value)){
    //     messages.push('Destination contains invalid characters');
    // }

    if(origin.value.length < 4){
        messages.push('Origin should be atleast 4 characters');
    }

    if(destination.value.length < 4){
        messages.push('Destination should be atleast 4 characters');
    }

    if(messages.length > 0){
        e.preventDefault()
        $(".error").show();
        errormsg.innerText = messages.join(', ')
    }
})

  //EDIT VEHICLE
  function editTrips(num){
    window.location="tripsedit.php?trip=" + num;
    }


 //DELETE SCHEDULE
 function deleteTrip(num){
    $('#delete').modal('show');
    $('#delete-btn').click(function() {
      // Send the POST request to delete the schedule
      $.post("includes/db_trips_delete.php",{num:num},function(data, status){
        if(status == "success"){
          window.location="trips.php"
          // Hide the modal
          $('#delete').modal('hide');
        }
        else{
          alert("Cannot delete Schedule");
          window.location="trips.php"

        }
      });
      
    });
  }





// //SHOW TRIPS
// function viewTrips(data){

//   let modal = $('#viewSchedule');

//   var dataArray = data.split(' ');
//   var origin = dataArray[0];
//   var destination = dataArray[1];
//   var schedule_status = dataArray[2];

//   modal.find('#origin').text(origin);
//   modal.find('#destination').text(destination);
//   modal.find('#schedule_status').text(schedule_status);

//   modal.modal('show');
// }

