var moduleAjax = {
    /* Main function*/
    "send": function (data, params) {
        var request = $.ajax({data: data, url: params['url'], type: params['type'], dataType: params['dataType']});
        request.done(function (response) {
            moduleAjax[params['callback']](response, params['callback_params']);
        });
    }, /* Response functions*/
    "default": function (response, params) {
        alert(response);
    }, "location_reload": function (response, params) {
        location.reload();
    }
};
var formSend = (function () {
    var formData = {};
    var ajaxAction = "";
    var actionType = "";
    var form = {};
    var validation = function (form) {
        var action = true;
        $.each(form.find('.form-fields'), function () {
            if ($(this).hasClass('required')) {
                var val = $(this).val(), type = $(this).attr('type');
                if (val != "") {
                    if (type == "email") {
                        pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
                        if (pattern.test(val)) {
                            $(this).removeClass('is-error');
                        }
                        else {
                            $(this).addClass('is-error');
                            action = false;
                        }
                    } else if (type == 'password' && val.length < 6) {
                        $(this).addClass('is-error');
                        action = false;
                    } else {
                        $(this).removeClass('is-error');
                    }
                } else {
                    $(this).addClass('is-error');
                    action = false;
                }
            }
        });
        return action;
    };
    var postSend = function () {
        if(actionType == 'write_us')
            var request = $.ajax({url: ajaxAction, data: formData, type: 'post', dataType: 'json', contentType: false, processData: false});
        else
            var request = $.ajax({url: ajaxAction, data: formData, type: 'post', dataType: 'json'});

        request.done(function (response) {
            if(response['error'] == 0){
                form.find('.successText').html(response['text']);
                if(response['action'] == 'clear_and_show_text'){
                    form.find('.form-fields').val('');
                    form.find('.successText').show();
                    form.find('.js__submitForm').attr('disabled', 'true');
                }
            } else {
                form.find('.js__submitForm').removeAttr('disabled');
                form.find('.errorText').html(response['text']);
                form.find('.errorText').show();
            }
        });
    };
    return {
        send: function (that, event, type) {
            event.preventDefault();
            actionType = type;
            form = $(that).parents('form');
            form.find('.errorText').hide();
            form.find('.successText').hide();
            form.find('.errorText').html(form.find('.errorText').attr('data-text'));
            var action = validation(form);
            if (action) {
                if(actionType == 'write_us'){
                    formData = new FormData();
                    formData.append('fields', form.serialize());
                    if(form.find('input[type="file"]').val())
                        formData.append('attach_file', form.find('input[type="file"]').prop('files')[0]);
                } else
                    formData = getFormData(form);

                ajaxAction = form.attr('action');
                form.find('.js__submitForm').attr('disabled', 'true');
                postSend();
            } else {
                form.find('.errorText').show();
            }
        }
    }
})();

function formValidator(container) {
    var action = true;
    $.each(container.find('.form-fields'), function () {
        if ($(this).hasClass('required')) {
            var val = $(this).val(), type = $(this).attr('type');
            if (val != "") {
                if (type == "email") {
                    pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
                    if (pattern.test(val)) {
                        $(this).removeClass('error');
                    }
                    else {
                        $(this).addClass('error');
                        action = false;
                    }
                } else if (type == 'password' && val.length < 6) {
                    $(this).addClass('error');
                    action = false;
                } else {
                    $(this).removeClass('error');
                }
            } else {
                $(this).addClass('error');
                action = false;
            }
        }
    });
    return action;
}


function getFormData(form) {
    var data = {};
    $.each(form.find('.form-fields'), function () {
        if ($(this).attr('type') == 'radio') {
            if ($(this).prop("checked")) data[$(this).attr('name')] = $(this).val();
        } else {
            data[$(this).attr('name')] = $(this).val();
        }
    });
    return data;
}

function getContainerData(container) {
    var data = {};
    $.each(container.find('.container-fields'), function () {
        data[$(this).attr('name')] = $(this).val();
    });
    return data;
}

(function () {
    var action = $('body').attr('data-userTime');
    if (action == 'notSet') {
        var d = new Date();
        var dtz = -(d.getTimezoneOffset()) / 60;
        var request = $.ajax({
            data: {'dtz': dtz},
            url: '/actions/set-user-offset-time',
            type: 'post',
            dataType: 'html',
        });
        request.done(function () {
            location.reload();
        });
    }
}());