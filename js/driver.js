$('input').each(function (index, elem){

    if(elem.id == 'driver-phone'){
        elem.placeholder = "09*********";
        elem.maxlength = "6";

    }
    if(elem.id == 'driver-id'){
        elem.placeholder = "1000";

    }

    if(elem.id == 'driver-email'){
        elem.placeholder = "email@gmail.com";

    }




})






$('#add-btn').click(function (){

    alert('Driver Added Successfully');

})