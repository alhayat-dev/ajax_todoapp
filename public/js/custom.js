$('.show-todolist-modal').click(function(event) {
    event.preventDefault();

    var url = $(this).attr('href');
    $.ajax({
        url : url,
        dataType : 'html',
        success : function (response) {
            $("#todo-list-body").html(response)
        }
    });

    $('#todolist-modal').modal('show');
});

// Add Todotask event

function showMessage(message){
    $("#add-new-alert").text(message).fadeTo(1000, 500).slideUp(500, function () {
        $(this).hide();
    })
}

function updateTodoListCounter(){

    var totlal = $('.list-group-item').length;
    $('#todo-list-counter').text(totlal).next( totlal > 1 ? 'records' : 'record');
}


// Prevent hit enter event when cursor is on title field

$("#todolist-modal").on('keypress', ":input:not(textarea)", function (event) {
    return event.keyCode !=13;
});

$("#todo-list-save-btn").on('click', function (event) {
    event.preventDefault();
    var form = $("#todo-list-body form");
    var url = form.attr('action');
    var method = 'POST';

    form.find('.help-block').remove();
    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            $("#todo-list").prepend(response);

            form.trigger('reset');
            $("#title").focus();
            updateTodoListCounter();
            showMessage("Todo list has been created.");
        },
        error: function(xhr, status, error) {
            var errors = eval("(" + xhr.responseText + ")");
            var title = errors.errors.title
            var description = errors.errors.description

            if (title){
                $('#title-error').html('<span style="color: red;" class="help-block"><strong>'+ ' Title is required ' +'</strong></span>');
            }
            if (description){
                $('#description-error').html('<span style="color: red;" class="help-block"><strong>'+ ' Description is required ' +'</strong></span>');
            }
        }
    });

    console.log(url);
});

$('.show-task-modal').click(function(event) {
    event.preventDefault();

    $('#task-modal').modal('show');
});

$(function() {
    $('input[type=checkbox]').iCheck({
        checkboxClass: 'icheckbox_square-green',
        increaseArea: '20%'
    });

    $('#check-all').on('ifChecked', function(e) {
        $('.check-item').iCheck('check');
    });

    $('#check-all').on('ifUnchecked', function(e) {
        $('.check-item').iCheck('uncheck');
    });
});
