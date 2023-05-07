let origin = document.getElementById('trips-origin');
let destination = document.getElementById('trips-destination');
let addform = document.getElementById('trip-add');
let errormsg = document.getElementById('errormsg');

$(".error").hide();

addform.addEventListener('submit', (e) => {
    let messages = [];

    // Check if origin contains symbols
    if (!/^[a-zA-Z0-9\s]+$/.test(origin.value)) {
        messages.push('Origin should not contain symbols');
    } else if (origin.value.length < 3) {
        messages.push('Origin should be atleast 4 characters');
    }

    // Check if destination contains symbols
    if (!/^[a-zA-Z0-9\s]+$/.test(destination.value)) {
        messages.push('Destination should not contain symbols');
    } else if (destination.value.length < 3) {
        messages.push('Destination should be atleast 4 characters');
    }

    if (messages.length > 0) {
        e.preventDefault();
        $(".error").show();
        errormsg.innerText = messages.join(', ');
    }
});
