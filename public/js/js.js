(function ($) { // Begin jQuery
	$(function () { // DOM ready
		// If a link has a dropdown, add sub menu toggle.
		$('nav ul li a:not(:only-child)').click(function (e) {
			$(this).siblings('.nav-dropdown').toggle();
			// Close one dropdown when selecting another
			$('.nav-dropdown').not($(this).siblings()).hide();
			e.stopPropagation();
		});

		// Clicking away from dropdown will remove the dropdown class
		$('html').click(function () {
			$('.nav-dropdown').hide();
		});

		// Toggle open and close nav styles on click
		$('#nav-toggle').click(function () {
			$('nav ul').slideToggle();
		});
		// Hamburger to X toggle
		$('#nav-toggle').on('click', function () {
			this.classList.toggle('active');
		});
	}); // end DOM ready
})(jQuery); // end jQuery


$(function () {


	$("#open-project").click(function () {
		$(".ui.modal.project").modal({
			closable: true,
			autofocus: false,
			observeChanges: false,
			detachable: false,
			transition: 'fade down',
		}).modal("show");
	});
	$("#open-task").click(function () {
		// $('#assigned_to').dropdown('restore defaults');
		$(".ui.modal.task").modal({
			closable: true,
			autofocus: false,
			observeChanges: false,
			detachable: false,
			transition: 'fade down',
		}).modal("show");
	});
	$(".ui.card.task").click(function () {
		$(".ui.modal.task").modal({
			closable: true,
			autofocus: false,
			observeChanges: false,
			detachable: false,
			transition: 'fade down',
		}).modal("show");
	});



});


$(document).ready(function() {

	
	$('.ui.dropdown .remove.icon').on('click', function(e){
		$(this).parent('.dropdown').dropdown('clear');
		e.stopPropagation();
	});	
	
});



$(function () {
	$(".ui.login.modal").modal({
		closable: false,
		autofocus: false,
		observeChanges: true,
	});
	$(".ui.login.modal").modal('show');
});


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





$('.ui.form').form({
	detachable: false,
})

$(function (){
	$( ".ui.large.form.project" ).form({
		fields: {
			name: {
				identifier: 'name',
				rules: [{
					type   : 'empty',
				}]
			},
			description: {
				identifier: 'description',
				rules: [{
					type   : 'empty',
				}]
			},
			users: {
				identifier: 'users',
				rules: [{
					type   : 'minCount[1]',
				}]
			},
		},
		onSuccess: function() {
			return true; // false is required if you do don't want to let it submit                                            
		},
		onFailure: function() {
			$(".ui.modal.project").modal({
				closable: true,
				autofocus: false,
				observeChanges: false,
				detachable: false,
				transition: 'fade down',
			}).modal("show");
			return false; // false is required if you do don't want to let it submit                                            
		}
	}).submit( function( e ) {
		$('#users').dropdown('restore defaults');
		e.preventDefault();
	});
});

$(function (){
	$( ".ui.large.form.task" ).form({
		fields: {
			name: {
				identifier: 'name',
				rules: [{
					type   : 'empty',
				}]
			},
			description: {
				identifier: 'description',
				rules: [{
					type   : 'empty',
				}]
			},
			// assigned_to: {
			// 	identifier: 'assigned_to',
			// 	rules: [{
			// 		type   : 'empty',
			// 	}]
			// },
			due_on: {
				identifier: 'due_on',
				rules: [{
					type   : 'empty',
				}]
			},
		},
		onSuccess: function() {
			$('#assigned_to').dropdown('restore defaults');
			return true; // false is required if you do don't want to let it submit                                            
		},
		onFailure: function() {
			$(".ui.modal.task").modal({
				closable: true,
				autofocus: false,
				observeChanges: false,
				detachable: false,
				transition: 'fade down',
			}).modal("show");
			return true; // false is required if you do don't want to let it submit                                            
		}
	}).submit( function( e ) {
		e.preventDefault();
	});
});




// $(function () {
// 	$('menu a').click(function () {
// 		$('menu a.item').removeClass('active');
// 		$(this).addClass('active');
// 	});
// });

// $(function () {
// 	// First register any plugins
// 	$.fn.filepond.registerPlugin(
// 		FilePondPluginImagePreview,
// 		FilePondPluginFileEncode
// 	);

// 	// Turn input element into a pond
// 	$('.my-pond').filepond();

// 	// Set allowMultiple property to true
// 	$('.my-pond').filepond('allowMultiple', true);

// 	const inputElement = document.querySelector('input[type="file"]');
// 	const pond = FilePond.create(inputElement);

// });