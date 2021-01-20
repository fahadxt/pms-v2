window.addEventListener('dropdown-restore', event => {
    $('#users').dropdown('restore defaults');
    $('#assigned_to').dropdown('restore defaults');
})

window.addEventListener('sweet-alert-success', event => {
    Swal.fire({
        icon: 'success',
        title: event.detail.msg,
        showConfirmButton: false,
        timer: 1500
      })
})

window.addEventListener('sweet-alert-error', event => {
    Swal.fire({
        icon: 'error',
        title: event.detail.msg,
        showConfirmButton: false,
        timer: 1500
      })
})

$(function () {
	$('.ui.dropdown').dropdown();
});

$(document).ready(function() {
	$("#due_on").flatpickr({
		enableTime: false,
		dateFormat: "Y-m-d",
		minDate: "today"
	});
});
console.log('main.js')