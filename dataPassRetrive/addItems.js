var index = 1;

function addColumn() {
    index = index + 1;

    // Fix not responding select after clone
    if ($(".test_name").data('select2')) {
        $(".test_name").select2("destroy");
    } // Fix end

    // Create clone
    var newel = $('.input-form:last').clone(true);

    // Set id of new element
    $(newel).find('input[type=number]').attr("id", index); //serial no
    $(newel).find('select:nth-child(1)').attr("id", index); //test name
    $(newel).find('input[type=text]:nth-child(1)').attr("id", "tCode" + index); //test code



    // Set value
    $(newel).find('input[type=number]').val(index); // serial


    $(newel).find('input[type=text]:nth-child(1)').val(""); // test code
    // $(newel).find('input[name=price]').val(""); //test price

    // Insert element
    $(newel).insertAfter(".input-form:last");
}