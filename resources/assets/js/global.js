// GLOBAL ROUTES
window.routes = {};

// GLOBAL VARS
window.user = {};

$(document).ready(function(){
    
    //SUBMIT
    $("form.validate").validate({
        errorPlacement: function(){
            return false; //supresses error message text
        },
        
        submitHandler: function(form){
            $(':submit', form).attr('disabled','disabled');
            form.submit();
        }
        
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
