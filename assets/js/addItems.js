var a = 0;

function change() {
    a = a + 1;
    // Selecting last id 
    var lastname_id = $('.input-form input[type=text]:nth-child(1)').last().attr('id');
    var split_id = lastname_id.split('_');

    // New index
    var index = Number(split_id[1]) + 1;
    // var index = a;

    // Fix not responding select after clone
    if ($(".test_name").data('select2')) {
        $(".test_name").select2("destroy");
    } // Fix end

    // Create clone
    var newel = $('.input-form:last').clone(true);

    // Set id of new element
    $(newel).find('input[type=text]:nth-child(1)').attr("id", "tCode_" + index);
    // $(newel).find('input[type=number]:nth-child(2)').attr("id", "email_" + index);
    $(newel).find('input[type=text]:nth-child(2)').attr("id", "email_" + index);

    // Set value
    $(newel).find('input[type=text]:nth-child(1)').val("tCode_" + index);
    // $(newel).find('input[type=number]:nth-child(2)').val("email_" + index);
    $(newel).find('input[type=text]:nth-child(2)').val("email_" + index);

    // Insert element
    $(newel).insertAfter(".input-form:last");

}