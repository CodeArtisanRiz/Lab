var index = 1;

function addColumn() {
    var index = index + 1;

    // Fix not responding select after clone
    if ($(".test_name").data('select2')) {
        $(".test_name").select2("destroy");
    } // Fix end

    // Create clone
    var newel = $('.input-form:last').clone(true);
    $(newel).find('input[type=text]:nth-child(1)').attr("id", "tCode" + index);
    $(newel).insertAfter(".input-form:last");
}