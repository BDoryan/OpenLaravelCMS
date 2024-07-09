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

    // Modals for tailwindcss
    $(document).on('click', '[data-modal-open]', function () {
        $('.modal').addClass('olc-hidden');

        const modal = $(this).data('modal-open');
        $(modal).removeClass('olc-hidden');

        // Trigger
        $(modal).trigger('modal:open', modal);
    });

    $(document).on('click', '[data-modal-close]', function () {
        const modal_id = $(this).data('modal-close');
        const modal = $(modal_id);

        modal.addClass('olc-hidden');
        modal.trigger('modal:close', modal);
    });

    // Toasts
    function closeToast(toast) {
        toast.removeClass('olc-toast-show');

        setTimeout(function () {
            toast.remove();
        }, 500);
    }

    window.showToast = function (type, title, message, duration = 5000) {
        const url = route('ajax.toast');

        $.ajax({
            url: url,
            method: 'GET',
            data: {
                type: type,
                title: title,
                message: message,
                duration: duration,
            },
            success: function (response) {
                const container = $('.olc-toast-container');
                response = $.parseHTML(response);
                container.append(response);

                const toast = container.find('.olc-toast:last-child');
                const duration = toast.data('duration');

                toast.addClass('olc-toast-show');

                setTimeout(function () {
                    closeToast(toast);
                }, duration);
            },
            error: function (response) {
                console.error(response);
            }
        });
    }

    $(document).on('click', '[data-toast-action]', function () {
        const action = $(this).data('toast-action');
        const toast = $(this).closest('.olc-toast');

        switch (action) {
            case 'close':
                closeToast(toast);
                break;
            default:
                break;
        }
    });

    $('.olc-toast').each(function () {
        const duration = $(this).data('duration');
        const toast = $(this);

        toast.addClass('toast-show');

        setTimeout(function () {
            closeToast(toast);
        }, duration ?? 5000);
    });
});
