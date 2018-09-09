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