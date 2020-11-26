var index = 1;

function addColumn() {
    index = index + 1;
    // Selecting last id 
    // var lastname_id = $('.input-form input[type=text]:nth-child(1)').last().attr('id');
    // var split_id = lastname_id.split('_');

    // New index
    // var index = Number(split_id[1]) + 1;
    // var index = a;

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
    // $(newel).find('input[type=text]:nth-child(1)').attr("id", "email_" + index);
    $(newel).find('input[name=price]').attr("id", "tPrice" + index); // test price


    // Set value
    $(newel).find('input[type=number]').val(index); // serial
    $(newel).find('input[type=text]:nth-child(1)').val("tCode_" + index);
    $(newel).find('input[name=price]').val("tPrice_" + index); //test price


    // document.getElementById("sl").value = index;
    // Insert element
    $(newel).insertAfter(".input-form:last");
}

function changeVal(id) {
    // var newV = $('.input-form:last').clone(true);
    // var a = $(newV).find('input[name=price]');
    // document.getElementById("tCode").val("abc");
    // alert("changeVal triggered");

    // load('assets/process/dataDb.php');

    // $("#tCode" + index).val("You new value");
    // event = event || window.event; // IE
    // var target = event.target || event.srcElement; // IE

    //var id = target.id;
    // $(newel).find('input[type=text]:nth-child(1)').attr("id", "tCode" + index);
    //console.log(id);
    // console.log(event.id);


}

$(document).ready(function() {
    $("#formid").find("input,textarea,select").on('input', function() {

        var rowNo = (this.id);
        alert(rowNo);
        // console.log(rowNO);
        $("#tCode" + rowNo).val("testCode_" + rowNo);
        $("#tPrice" + rowNo).val("testPrice_" + rowNo);
        // $("#tPrice" + rowNo).val(fillPrice());
    });
});

// function fillPrice() {
//     $.ajax({
//         url: 'assets/process/dataDb.php',
//         success: function(data) {
//             $('.result').html(data);
//         }
//     });
// }