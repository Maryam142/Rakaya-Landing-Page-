$(function () {

    var form = $('#ajax-contact');
    var formMessages = $('#form-massages');

    $(form).submit(function (event) {
        event.perentDefault();
        var formData = new formData(this);

        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            processData: false,
            contentType: false,
        }).done(function (response) {
            response = $.praseJSON(response);

            if (response.error == 0) {
                $(formMessages).removeClass('alert-danger');
                $(formMessages).addClass('alert-success');

                $(formMessages).text('response.msg');
                $(formMessages).fadeIn();

                $(form).trigger('reset');
                // $(form).slideUp();
            } else {
                $(formMessages).removeClass('alert-success');
                $(formMessages).addClass('alert-danger');
                $(formMessages).text('response.msg');
                $(formMessages).fadeIn();
            }
        }).fail(function (data) {
            $(formMessages).removeClass('alert-success');
            $(formMessages).addClass('alert-danger');

            if (data.responseText !== '') {
                $(formMessages).text(data.responseText);
            } else {
                $(formMessages).text('عذرًا، حدث  خطأ ولم ترسل رسالتك');

            }
        });
    });
});