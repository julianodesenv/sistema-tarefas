$(document).ready(function () {
    taskPlay();
    taskPause();
    taskFinish();
    taskReopen();
    taskShow();
    formPause();
    formFinish();
    taskShowReport();
});

function taskShowReport() {
    $('.btnTaskShowReport').bind('click', function () {
        let id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: APP_URL + 'task/report/show/' + id,
            beforeSend: function () {
                $('.showTask').html('<div class="modal-body text-center"><i class="icon wb-reload icon-spin" aria-hidden="true"></i></div>');
            },
            success: function (result) {
                $('.showTask').html(result);
            }
        });
    });
}

function taskShow() {
    $('.btnTaskShow').bind('click', function () {
        let task_id = $(this).parent('.actionTask').attr('data-task-id');
        let task_user_id = $(this).parent('.actionTask').attr('data-task-user-id');
        $.ajax({
            type: "GET",
            url: APP_URL + 'task/show/' + task_id + '/' + task_user_id,
            beforeSend: function () {
                $('.showTask').html('<div class="modal-body text-center"><i class="icon wb-reload icon-spin" aria-hidden="true"></i></div>');
            },
            success: function (result) {
                $('.showTask').html(result);
            }
        });
    });
}

function reloadActions(task_user_id) {
    $.ajax({
        type: "GET",
        url: APP_URL + 'task/getActions/' + task_user_id,
        beforeSend: function () {
            $('#action-' + task_user_id).html('<i class="icon wb-reload icon-spin" aria-hidden="true"></i>');
        },
        success: function (result) {
            $('#action-' + task_user_id).html(result);
            taskPlay();
            taskPause();
            taskFinish();
            taskShow();
            taskReopen();
        }
    });
    return false;
}

function taskPlay() {
    $('.btnTaskPlay').bind('click', function () {
        let task_user_id = $(this).parent('.actionTask').attr('data-task-user-id');
        $.ajax({
            type: "GET",
            url: APP_URL + 'task/time/play/' + task_user_id,
            beforeSend: function () {

            },
            success: function (result) {
                //alert(result.message);
                reloadActions(task_user_id);
            }
        });
        return false;
    });
}

function taskReopen() {
    $('.btnTaskReopen').bind('click', function () {
        let task_user_id = $(this).parent('.actionTask').attr('data-task-user-id');
        $.ajax({
            type: "GET",
            url: APP_URL + 'task/time/play/' + task_user_id,
            beforeSend: function () {
                $('#action-' + task_user_id).html('<i class="icon wb-reload icon-spin" aria-hidden="true"></i>');
            },
            success: function (result) {
                reloadActions(task_user_id);
            }
        });
        return false;
    });
}

function taskPause() {
    $('.btnTaskPause').bind('click', function () {
        let task_user_id = $(this).parent('.actionTask').attr('data-task-user-id');
        $('#taskUserId').val(task_user_id);
    });
}

function formPause() {
    $('#fTaskPause').submit(function () {
        let task_user_id = $('#taskUserId').val();
        $.ajax({
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            url: APP_URL + "/task/time/pause",
            beforeSend: function () {
                $('#action-' + task_user_id).html('<i class="icon wb-reload icon-spin" aria-hidden="true"></i>');
            },
            success: function (result) {
                if (result.success) {
                    $('.close').click();
                    $('input[type=text],input[type=email], textarea, select').val('');
                    reloadActions(task_user_id);
                } else {
                    var arr = result.message;
                    var msgError = '';
                    $.each(arr, function (index, value) {
                        if (value.length !== 0) {
                            msgError = msgError + value + '<br />';
                        }
                    });
                    //$('#fContact .def-msg').html("<strong class='color-red f-w-600'>" + msgError + "</strong>");
                }
            }
        });
        return false;
    });
}

function taskFinish() {
    $('.btnTaskFinish').bind('click', function () {
        let task_user_id = $(this).parent('.actionTask').attr('data-task-user-id');
        reloadDescriptionFinish(task_user_id);
        $('#taskUserIdFinish').val(task_user_id);
    });
}

function reloadDescriptionFinish(task_user_id) {
    if(task_user_id){
        $.ajax({
            type: "GET",
            url: APP_URL + 'task/time/openFinishDescription/' + task_user_id,
            beforeSend: function () {
                $('#finishDescription').val('Pesquisando...');
            },
            success: function (result) {
                $('#finishDescription').val(result.message);
            }
        });
    }
}

function formFinish() {
    $('#fTaskFinish').submit(function () {
        //let task_user_id = $('#taskUserId').val();
        let task_user_id = $('#taskUserIdFinish').val();
        $.ajax({
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            url: APP_URL + "/task/time/finish",
            beforeSend: function () {
                $('#action-' + task_user_id).html('<i class="icon wb-reload icon-spin" aria-hidden="true"></i>');
            },
            success: function (result) {
                if (result.success) {
                    $('.close').click();
                    $('input[type=text],input[type=email], textarea, select').val('');
                    reloadActions(task_user_id);
                    $('#fTaskFinish .msg').html('<div class="alert success">' + result.message + '</div>');
                } else {
                    var arr = result.message;
                    var msgError = '';
                    $.each(arr, function (index, value) {
                        if (value.length !== 0) {
                            msgError = msgError + value + '<br />';
                        }
                    });
                    $('#fTaskFinish .msg').html('<div class="alert alert-danger">' + msgError + '</div>');
                }
            }
        });
        return false;
    });
}