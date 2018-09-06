$(document).ready( function() {
	toastr.options.timeOut = 30;

	$('body').on('click', '.swal-confirm', function (e) {
        e.preventDefault();
        var x = $(this).attr('href');
        var data_title = $(this).attr('data-title');
        var data_message = $(this).attr('data-message');
        var data_type = $(this).attr('data-type');
        swal({
        	title: data_title,
			type: data_type,
			html: '<span style="font-size: 20px;"> "' + data_message +'" </span>',
			showCancelButton: true,
			focusConfirm: true,
			confirmButtonColor: '#C9302C',
			confirmButtonText: '<span style="font-size: 20px;"> Yes! </span>',
			cancelButtonText: '<span style="font-size: 20px;"> No! </span>',
		}).then ( (result) => {
			if (result.value) {
				window.location = x;
			}
		});
	});

	$('.row-data').on('mouseenter', function () {
		$(this).find('.hidden-menu').removeClass('hide');
	});

	$('.row-data').on('mouseleave', function () {
		$(this).find('.hidden-menu').addClass('hide');
	});

	$('.row-data').on('click', function () {

		$('.row-data').removeClass('selected-row');
		$(this).addClass('selected-row');

		$('.hidden-menu').find('a').removeClass('text-white');
		$(this).find('.hidden-menu').find('a').addClass('text-white');

		$('.selected-input').attr('data-id', $(this).attr('data-id'));
		$('.selected-input').attr('data-name', $(this).attr('data-name'));
	});

	$('.action-edit').on('click', function () {
		var selectedInput = $('.selected-input');

		if (selectedInput.attr('data-id')) {
			var redirectUrl = selectedInput.attr('data-link') + '/' + selectedInput.attr('data-module') + '/' + selectedInput.attr('data-id') + '/edit';
			window.location = redirectUrl;
		}
		else
		{
			swal({
				title: 'Please select a product first!',
				type: 'error',
				confirmButtonColor: "#EE350F",
				confirmButtonText: 'OK!',
			});
		}
	});

	$('.action-delete').on('click', function () {
		var selectedInput = $('.selected-input');
		console.log(selectedInput.attr('data-message'));
		if (selectedInput.attr('data-id')) {
			var redirectUrl = selectedInput.attr('data-link') + '/' + selectedInput.attr('data-module') + '/' + selectedInput.attr('data-id') + '/destroy';
			swal({
	        	title: selectedInput.attr('data-message'),
				type: 'warning',
				html: '<span style="font-size: 20px;"> "' + selectedInput.attr('data-name') + ' "</span>',
				showCancelButton: true,
				focusConfirm: true,
				confirmButtonColor: '#C9302C',
				confirmButtonText: '<span style="font-size: 20px;"> Yes!! </span>',
				cancelButtonText: '<span style="font-size: 20px;"> No! </span>',
			}).then ( (result) => {
				if (result.value) {
					window.location = redirectUrl;
				}
			});
		}
		else
		{
			swal({
				title: 'Please select a product first!',
				type: 'error',
				confirmButtonColor: "#EE350F",
				confirmButtonText: 'OK!',
			});
		}
	});

	$('.action-recover').on('click', function () {
		var selectedInput = $('.selected-input');
		if (selectedInput.attr('data-id')) {
			var redirectUrl = selectedInput.attr('data-link') + '/' + selectedInput.attr('data-module') + '/' + selectedInput.attr('data-id') + '/restore';
			swal({
	        	title: 'Restore this item?',
				type: 'info',
				html: '<span style="font-size: 20px;"> "' + selectedInput.attr('data-name') + ' "</span>',
				showCancelButton: true,
				focusConfirm: true,
				confirmButtonColor: '#C9302C',
				confirmButtonText: '<span style="font-size: 20px;"> Yes!! </span>',
				cancelButtonText: '<span style="font-size: 20px;"> No! </span>',
			}).then ( (result) => {
				if (result.value) {
					window.location = redirectUrl;
				}
			});
		}
		else
		{
			swal({
				title: 'Please select a product first!',
				type: 'error',
				confirmButtonColor: "#EE350F",
				confirmButtonText: 'OK!',
			});
		}
	});

	$('.action-permanent-delete').on('click', function () {
		var selectedInput = $('.selected-input');
		if (selectedInput.attr('data-id')) {
			var redirectUrl = selectedInput.attr('data-link') + '/' + selectedInput.attr('data-module') + '/' + selectedInput.attr('data-id') + '/forceDestroy';
			swal({
	        	title: "Do you really want to delete this item? You won't be able to recover this anymore",
				type: 'error',
				html: '<span style="font-size: 20px;"> "' + selectedInput.attr('data-name') + ' "</span>',
				showCancelButton: true,
				focusConfirm: true,
				confirmButtonColor: '#C9302C',
				confirmButtonText: '<span style="font-size: 20px;"> Yes!! </span>',
				cancelButtonText: '<span style="font-size: 20px;"> No! </span>',
			}).then ( (result) => {
				if (result.value) {
					window.location = redirectUrl;
				}
			});
		}
		else
		{
			swal({
				title: 'Please select a product first!',
				type: 'error',
				confirmButtonColor: "#EE350F",
				confirmButtonText: 'OK!',
			});
		}
	});

	$('.search-txt').on('keyup' , function () {
		$('.row-data').each( function() {
			if ($(this).find('.column-name').text().toLowerCase().indexOf($('.search-txt').val().toLowerCase()) <= -1)
			{
				$(this).find('.column-name').parent().parent().addClass('hide');
			}
			else
			{
				$(this).find('.column-name').parent().parent().removeClass('hide');
			}
		});
	});
});