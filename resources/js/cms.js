// Alert
$(document).ready(function () {
    $(document).on('click', '#alert-close-button', function () {
        $(this).closest('.alert').remove()
    });

    $('.alert').each(function () {
        const duration = $(this).data('duration');
        const alert = $(this);

        setTimeout(function () {
            alert.fadeOut('slow');
        }, duration ?? 5000);
    });
});
