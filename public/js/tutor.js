$('.add').on('click', add);
$('.remove').on('click', remove);

function add() {
    var new_chq_no = parseInt($('#total_chq').val()) + 1;
    var new_input = "<input type='text' class='form-control mb-1 mt-1' id='new_" + new_chq_no + "'>";

    $('#new_chq').append(new_input);
    $('#total_chq').val(new_chq_no);
}

function remove() {
    var last_chq_no = $('#total_chq').val();

    if (last_chq_no > 1) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq').val(last_chq_no - 1);
    }
}

// add for style section 
$('.add').on('click', addStyle);
$('.remove').on('click', removeStyle);

function addStyle() {
    var new_chq_no = parseInt($('#total_chq1').val()) + 1;
    var new_input = "<input type='text' class='form-control mb-1 mt-1' id='new_" + new_chq_no + "'>";

    $('#new_chq1').append(new_input);
    $('#total_chq1').val(new_chq_no);
}

function removeStyle() {
    var last_chq_no = $('#total_chq1').val();

    if (last_chq_no > 1) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq1').val(last_chq_no - 1);
    }
}
// add for style section 
$('.add').on('click', addPass);
$('.remove').on('click', removePass);

function addPass() {
    var new_chq_no = parseInt($('#total_chq2').val()) + 1;
    var new_input = "<input type='text' class='form-control mb-1 mt-1' id='new_" + new_chq_no + "'>";

    $('#new_chq2').append(new_input);
    $('#total_chq2').val(new_chq_no);
}

function removePass() {
    var last_chq_no = $('#total_chq2').val();

    if (last_chq_no > 1) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq2').val(last_chq_no - 1);
    }
}
// add for style section 
$('.add').on('click', addSpe);
$('.remove').on('click', removePass);

function addSpe() {
    var new_chq_no = parseInt($('#total_chq3').val()) + 1;
    var new_input = "<input type='text' class='form-control mb-1 mt-1' id='new_" + new_chq_no + "'>";

    $('#new_chq3').append(new_input);
    $('#total_chq3').val(new_chq_no);
}

function removeSpe() {
    var last_chq_no = $('#total_chq3').val();

    if (last_chq_no > 1) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq3').val(last_chq_no - 1);
    }
}
// add for style section 
$('.add').on('click', addSpeaks);
$('.remove').on('click', removeSpeaks);

function addSpeaks() {
    var new_chq_no = parseInt($('#total_chq4').val()) + 1;
    var new_input = "<input type='text' class='form-control mb-1 mt-1' id='new_" + new_chq_no + "'>";

    $('#new_chq4').append(new_input);
    $('#total_chq4').val(new_chq_no);
}

function removeSpeaks() {
    var last_chq_no = $('#total_chq4').val();

    if (last_chq_no > 1) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq4').val(last_chq_no - 1);
    }
}

// add for style section 
$('.add').on('click', addIntersts);
$('.remove').on('click', addIntersts);

function addIntersts() {
    var new_chq_no = parseInt($('#total_chq5').val()) + 1;
    var new_input = "<input type='text' class='form-control mb-1 mt-1' id='new_" + new_chq_no + "'>";

    $('#new_chq5').append(new_input);
    $('#total_chq5').val(new_chq_no);
}

function removeIntersts() {
    var last_chq_no = $('#total_chq5').val();

    if (last_chq_no > 1) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq5').val(last_chq_no - 1);
    }
}