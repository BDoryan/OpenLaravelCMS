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

// Modals for tailwindcss
$(document).ready(function () {
    $(document).on('click', '[data-modal-open]', function () {
        $('.modal').addClass('hidden');

        const modal = $(this).data('modal-open');
        $(modal).removeClass('hidden');

        // Trigger
        modal.trigger('modal:open', modal);
    });

    $(document).on('click', '[data-modal-close], #close-modal', function () {
        const modal = $(this).closest('.modal');
        $(modal).addClass('hidden');

        // Trigger
        modal.trigger('modal:close', modal);
    });
});
