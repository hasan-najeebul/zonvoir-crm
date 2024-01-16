jQuery( function( $ ){
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    /*Action : ajax
    * used to: submit forms
    * Instance of: Jquery vailidate libaray
    * @JSON
    **/
    $("#form").validate({

        highlight: function(element) {
            $(element).addClass('is-invalid');
            $(element).parent().addClass("error");
        },
        unhighlight: function(element) {
            console.log(element);
            $(element).parent().removeClass("error");
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form){
            var formData = new FormData($("#form")[0]);
            $.ajax({
                beforeSend:function(){
                    $("#form").find('button').attr('disabled',true);
                    $("#form").find('button>i').show();
                },
                url: $("#form").attr('action'),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                success:function(response){
                    console.log(response.redirect_url)
                    if(response.success){
                        toastr.success(response.message, 'Success', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                        if (response.redirect_url !='') {
                            setTimeout(function(){
                                location.href = response.redirect_url;
                            },2000);
                        }else{
                            location.reload();
                        }
                    }else{
                        toastr.error(response.message, '', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                    }
                },
                complete:function(){
                    $("#form").find('button').attr('disabled',false);
                    $("#form").find('button>i').hide();
                },
                error:function(xhr, status, error){
                    var errors = JSON.parse(xhr.responseText);
                    if(xhr.status == 422){
                        $("#form").find('button').attr('disabled',false);
                        $("#form").find('button>i').hide();
                        $.each(errors.errors, function(i,v){
                            toastr.error(v, '', {
                                timeOut: 3000,
                                extendedTimeOut: 2000,
                                progressBar: true,
                                closeButton: true,
                                tapToDismiss: false,
                                positionClass: "toast-top-right",
                            });
						});
					}else{
						toastr.error(errors.message, 'Opps!', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
					}
              	}
			});
			return false;
		}
	});

    /*Action : ajax
    * used to: delete record
    */
    $("body").on("click",".delete-item",function(){
        var row = $(this).closest('tr');
        var checkstr =  confirm('Are you sure?');
        if(checkstr == true){
            $.ajax({
                url: $(this).attr('href'),
                type: 'DELETE',
                success:function(response){
                    if(response.success){
                        row.remove();
                        toastr.success(response.message, 'Success', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                    }else{
                        toastr.error(response.message, '', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                    }
                }
            });
            return false;
        }else{
            return false;
        }
    });

    $('.select2').select2();

    $("body").on('change', '.addType', function(){
        let typeVal = $(this).find(":selected").val();
        if(typeVal == "Organisation"){
            $('.companyNameLabel, .officialContactNoLabel').removeClass('d-none');
            $('.contactNumberLabel, .nameLabel').addClass('d-none');
            $('.vatNumber, .gstNumber').removeAttr("disabled", true);
        }else{
            $('.companyNameLabel, .officialContactNoLabel').addClass('d-none');
            $('.contactNumberLabel, .nameLabel').removeClass('d-none');
            $('.vatNumber, .gstNumber').attr("disabled", true);
        }
    });

    let typeVal = $(".editType").find(":selected").val();
    if(typeVal == "Organisation"){
        $('.editCompanyNameLabel , .editOfficialContactNoLabel').removeClass('d-none');
        $('.editContactNumberLabel, .editNameLabel').addClass('d-none');
        $('.editVatNumber, .editGstNumber').removeAttr("disabled", false);
    }else{
        $('.editCompanyNameLabel, .editOfficialContactNoLabel').addClass('d-none');
        $('.editContactNumberLabel, .editNameLabel').removeClass('d-none');
        $('.editVatNumber, .editGstNumber').attr("disabled", true);
    }

    // Billing & Shipping handling

    $('#billingShippingBtn').on('click', function(){
        $('#billingshippingContent').toggleClass('d-none');
    });

    $('.billingSameAsCustomer').on('click', function(e) {
        e.preventDefault();
        $('input[name="billing_address"]').val($('input[name="address"]').val());
        $('input[name="billing_city"]').val($('input[name="city"]').val());
        $('input[name="billing_state"]').val($('input[name="state"]').val());
        $('input[name="billing_zip"]').val($('input[name="zipcode"]').val());
        $('select[name="billing_country"]').val($('select[name="country_id"]').val());
    });

    $('.customerCopyBillingAddress').on('click', function(e) {
        e.preventDefault();
        $('input[name="shipping_address"]').val($('input[name="billing_address"]').val());
        $('input[name="shipping_city"]').val($('input[name="billing_city"]').val());
        $('input[name="shipping_state"]').val($('input[name="billing_state"]').val());
        $('input[name="shipping_zip"]').val($('input[name="billing_zip"]').val());
        $('select[name="shipping_country"]').val($('select[name="billing_country"]').val());
    });


});

function save_contact(){
    $(".contact-form").validate({
        highlight: function(element) {
            $(element).addClass('is-invalid');
            $(element).parent().addClass("error");
        },
        unhighlight: function(element) {
            $(element).parent().removeClass("error");
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form){
            var formData = new FormData($(".contact-form")[0]);
            $.ajax({
                beforeSend:function(){
                    $(".contact-form").find('button').attr('disabled',true);
                },
                url: $(".contact-form").attr('action'),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                success:function(response){
                    if(response.success){
                        toastr.success(response.message, 'Success', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                        if (response.redirect_url !='') {
                            setTimeout(function(){
                                location.href = response.redirect_url;
                            },2000);
                        }else{
                            location.reload();
                        }
                    }else{
                        toastr.error(response.message, '', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                    }
                },
                complete:function(){
                    $(".contact-form").find('button').attr('disabled',false);
                },
                error:function(xhr, status, error){
                    var errors = JSON.parse(xhr.responseText);
                    if(xhr.status == 422){
                        $(".contact-form").find('button').attr('disabled',false);
                        $.each(errors.errors, function(i,v){
                            toastr.error(v, '', {
                                timeOut: 3000,
                                extendedTimeOut: 2000,
                                progressBar: true,
                                closeButton: true,
                                tapToDismiss: false,
                                positionClass: "toast-top-right",
                            });
                        });
                    }else{
                        toastr.error(errors.message, 'Opps!', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                    }
                }
            });
            return false;
        }
    });
}

function save_customer(){
    $(".customer-form").validate({
        highlight: function(element) {
            $(element).addClass('is-invalid');
            $(element).parent().addClass("error");
        },
        unhighlight: function(element) {
            $(element).parent().removeClass("error");
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form){

            var formData = new FormData($(".customer-form")[0]);
            $.ajax({
                beforeSend:function(){
                    $(".customer-form").find('button').attr('disabled',true);
                },
                url: $(".customer-form").attr('action'),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                success:function(response){
                    if(response.success){
                        toastr.success(response.message, 'Success', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                        if (response.redirect_url !='') {
                            setTimeout(function(){
                                location.href = response.redirect_url;
                            },2000);
                        }else{
                            location.reload();
                        }
                    }else{
                        toastr.error(response.message, '', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                    }
                },
                complete:function(){
                    $(".customer-form").find('button').attr('disabled',false);
                },
                error:function(xhr, status, error){
                    var errors = JSON.parse(xhr.responseText);
                    if(xhr.status == 422){
                        $(".customer-form").find('button').attr('disabled',false);
                        $.each(errors.errors, function(i,v){
                            toastr.error(v, '', {
                                timeOut: 3000,
                                extendedTimeOut: 2000,
                                progressBar: true,
                                closeButton: true,
                                tapToDismiss: false,
                                positionClass: "toast-top-right",
                            });
                        });
                    }else{
                        toastr.error(errors.message, 'Opps!', {
                            timeOut: 3000,
                            extendedTimeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            tapToDismiss: false,
                            positionClass: "toast-top-right",
                        });
                    }
                }
            });
            return false;
        }
    });
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)

});


// Initialize Select2 for the tag input field
$(document).ready(function () {
    $('#tag-input').select2({
        tags: true,
        tokenSeparators: [',', ' '],
    });

    var isChecked = $('#progress_from_tasks').prop('checked');
    if(isChecked){
        $('#progressRange').attr('disabled',true);
    }else{
        $('#progressRange').removeAttr('disabled',false);
    }

    $('#progress_from_tasks').on('change', function(){
        if ($(this).prop("checked")) {
            $('#progressRange').attr('disabled',true);
        } else {
            $('#progressRange').removeAttr('disabled',false);
        }
    });

    $('#progressRange').on('change', function(){
        var rangeValue = $(this).val();
        $(".label_progress").text(rangeValue + '%');
        $('input[name="progress"]').val(rangeValue);
    });

    var billing_type_val = $('#billing_type').find(":selected").val();
    if(billing_type_val == 1){
        $('#project_cost').removeClass('d-none');
        $('#project_rate_per_hour').addClass('d-none');
    }else if(billing_type_val == 2){
        $('#project_cost').addClass('d-none');
        $('#project_rate_per_hour').removeClass('d-none');
    }else if(billing_type_val == 3){
        $('#project_cost, #project_rate_per_hour').addClass('d-none');
    }

    $('#billing_type').on('change', function(){
        var billing_type_val = $('#billing_type').find(":selected").val();
        if(billing_type_val == 1){
            $('#project_cost').removeClass('d-none');
            $('#project_rate_per_hour').addClass('d-none');
        }else if(billing_type_val == 2){
            $('#project_cost').addClass('d-none');
            $('#project_rate_per_hour').removeClass('d-none');
        }else if(billing_type_val == 3){
            $('#project_cost,#project_rate_per_hour').addClass('d-none');
        }
    });
});
