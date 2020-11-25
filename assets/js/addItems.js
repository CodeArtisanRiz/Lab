// var a = 0;

function change() {
    // a = a + 1;
    // Selecting last id 
    var lastname_id = $('.input-form input[type=text]:nth-child(1)').last().attr('id');
    var split_id = lastname_id.split('_');

    // New index
    var index = Number(split_id[1]) + 1;

    // Create clone
    var newel = $('.input-form:last').clone(true);

    // Set id of new element
    $(newel).find('input[type=text]:nth-child(1)').attr("id", "name_" + index);
    $(newel).find('input[type=text]:nth-child(2)').attr("id", "email_" + index);

    // Set value
    $(newel).find('input[type=text]:nth-child(1)').val("name_" + index);
    $(newel).find('input[type=text]:nth-child(2)').val("email_" + index);

    // Insert element
    $(newel).insertAfter(".input-form:last");
}