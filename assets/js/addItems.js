var a = 0;

function change() {
    a = a + 1;
    // alert(a);
    var newel = $('.input-form:last').clone();

    // Add after last <div class='input-form'>
    $(newel).insertAfter(".input-form:last");
}