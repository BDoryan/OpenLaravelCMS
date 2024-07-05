function initialize() {
    $('#cms-wrapper main').sortable({
        items: '[data-composite-id]',
        update: function () {
            // Get the page id from the body data attribute
            const page_id = $(this).closest('body').data('page-id');
            const crsf = $('meta[name="csrf-token"]').attr('content');

            const composition = [];
            $('[data-composite-id]').each(function () {
                composition.push($(this).data('composite-id'));
            });

            const url = route('live-edit.composition.order', {
                page_id
            });

            console.log(composition);

            // PUT request to route with the new order of the composition
            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    composition,
                    _token: crsf
                },
                success: function (response) {
                    if (response.error === undefined)
                        console.log('Blocks order updated successfully');
                }
            });
        }
    });
}

// Function to reload the content of the page without refreshing the page
function reloadContent() {
    const url = location.href;

    $(document.body).load(url + ' #cms-wrapper', function (response, status, xhr) {
        if (status === 'success') {
            console.log('Content loaded successfully');
        } else if (status === 'error') {
            console.error('Error loading content:', xhr.status, xhr.statusText);
        }
    });
}

$(document).ready(function () {

    // Initialize the sortable function
    initialize();

    // When you click on the block, add the block to the page
    $(document).on('click', '#blocksModal [data-block-id]', function () {
        const block_id = $(this).data('block-id');
        const page_id = $(this).closest('body').data('page-id');

        const url = route('live-edit.composition.add', {
            page_id,
            block_id
        });

        // Send GET request to route and get the response
        $.get(url, function (response) {
            if (response.error === undefined)
                reloadContent();
        });
    });

    // When you click on the block for deletion, delete the block from the page

    $(document).on('click', '[data-block-action]', function () {
        const composite_id = $(this).closest('[data-composite-id]').data('composite-id');
        const page_id = $(this).closest('body').data('page-id');
        const action = $(this).data('block-action');
        const crsf = $('meta[name="csrf-token"]').attr('content');

        switch (action) {
            case 'delete':
                // Send DELETE request to route and get the response
                $.ajax({
                    url: route('live-edit.composition.delete', {
                        page_id,
                        composite_id
                    }),
                    type: 'DELETE',
                    data: {
                        _token: crsf
                    },
                    success: function (response) {
                        if (response.error === undefined)
                            reloadContent();
                    }
                });
                break;
            case 'move-up' || 'move-down':
                // Move the html of the block up or down
                const block = $(this).closest('[data-composite-id]');
                const sibling = action === 'move-up' ? block.prev() : block.next();

                if (sibling.length) {
                    block[action === 'move-up' ? 'insertBefore' : 'insertAfter'](sibling);

                    // Get blocks in the order they are displayed on the page
                    const blocks = [];
                    $('[data-composite-id]').each(function () {
                        blocks.push($(this).data('composite-id'));
                    });

                    console.log(blocks);
                }
            default:
                break;
        }
    });
})
;

