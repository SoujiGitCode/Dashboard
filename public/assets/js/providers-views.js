<!--  Select Plan Validator-->
$( document ).ready(function() {
    //Save initial custom plan data
    var planSelected= $('#plan_id').val();
    $hotels_init= $('input[name=max_hotels]').val();
    $users_init= $('input[name=max_users]').val();

    console.log(planSelected);
    //check if current plan is custom
    if (planSelected === '4'){
        $('#max_hotels_container, #max_users_container').show();
    }
    //check if selected plan changes
    $("#plan_id").on('change', function() {
        if ($(this).val() === '4'){
            $('#max_hotels_container, #max_users_container').show();
            $('input[name=max_hotels]').val($hotels_init);
            $('input[name=max_users]').val($users_init);

        } else if($(this).val() === '3'){
            $('#max_hotels_container, #max_users_container').hide();
            $('input[name=max_users], input[name=max_hotels]').val('15');

        }else if($(this).val() === '2'){
            $('#max_hotels_container, #max_users_container').hide();
            $('input[name=max_users], input[name=max_hotels]').val('10');
        }
        else {
            $('#max_hotels_container, #max_users_container').hide();
            $('input[name=max_users], input[name=max_hotels]').val('5');
        }
    });
/*------------------------------------------------------------*/

});
