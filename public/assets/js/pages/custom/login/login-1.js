$(document).ready(function(e){

	var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="alert alert-bold alert-solid-' + type + ' alert-dismissible" role="alert">\
			<div class="alert-text">'+msg+'</div>\
			<div class="alert-close">\
                <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i>\
            </div>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        KTUtil.animateClass(alert[0], 'fadeIn animated');
    }

    //this js is for admin login form
	$("#admin_login_form").on('submit',function(event){
		event.preventDefault();

		var form = $(this);
		var getURL = $(this).attr('data-url');
		var formData = $(this).serialize();

		$.ajax({
			type: 'POST',
			url:getURL,
			data:formData,
			dataType : 'json',
			beforeSend : function(){
				$("#admin_login_submit").toggleClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light disabled');
			},
			success: function (data) {
				if(jQuery.trim(data.status)=='false') {
					showErrorMsg(form, 'danger', data.errors);
				}else{
					showErrorMsg(form, 'success', data.msg);
					setTimeout(function(){
						window.location.reload();
					},2000);
				}
				if(jQuery.trim(data.status)=='mismatch'){
					showErrorMsg(form,'danger',data.msg);

				}
				setTimeout(function(){
					$("#admin_login_submit").toggleClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light disabled');
				},2000);
			}
		});

	});
});
