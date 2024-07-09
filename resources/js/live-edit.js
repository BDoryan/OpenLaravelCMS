window.openlaravelcms_errors = [];
window.openlaravelcms_content = {};

if ($ === undefined)
    window.openlaravelcms_errors.push('jQuery is not loaded');

if ($.ui === undefined)
    window.openlaravelcms_errors.push('jQuery UI is not loaded');

if (tinymce === undefined)
    window.openlaravelcms_errors.push('TinyMCE is not loaded');

if (window.openlaravelcms_errors.length > 0) {
    console.error('CMS Errors:', window.openlaravelcms_errors);
} else {
    // Check if in the url get parameter debug is set to true
    const urlParams = new URLSearchParams(window.location.search);
    window.openlaravelcms_debug = urlParams.get('debug') === 'true' || false;

    function debug(...message) {
        if (window.openlaravelcms_debug)
            console.debug(message);
    }

    function storeElementContent(element) {
        const composite_id = element.closest('[data-composite-id]').data('composite-id');
        window.openlaravelcms_content[composite_id + '_' + element.data('editable')] = element.html();
    }

    function compareElementContent(element) {
        const composite_id = element.closest('[data-composite-id]').data('composite-id');
        return window.openlaravelcms_content[composite_id + '_' + element.data('editable')] !== element.html();
    }

    function hasContentChanged() {
        let hasChanged = false;

        $('[data-editable]').each(function () {
            const editable = $(this);

            if (compareElementContent(editable)) {
                hasChanged = true;
            }
        });
        return hasChanged;
    }

    function updateOrderComposition(page_id) {
        const crsf = $('meta[name="csrf-token"]').attr('content');

        const composition = [];
        $('[data-composite-id]').each(function () {
            composition.push($(this).data('composite-id'));
        });

        const url = route('live-edit.composition.order', {
            page_id
        });

        // PUT request to route with the new order of the composition
        $.ajax({
            url: url,
            type: 'PUT',
            data: {
                composition,
                _token: crsf
            },
            success: function (response) {
                if (response.error === undefined) {
                    debug('Blocks order updated successfully');

                    // Commented out because if the order is updated, the content is also saved
                    // reloadContent()
                }
            }
        });
    }

    function initialize() {
        $('#cms-wrapper main').sortable({
            items: '[data-composite-id]',
            handle: '.composite-header',
            update: function () {
                const page_id = $(this).closest('body').data('page-id');

                updateOrderComposition(page_id);
            }
        });

        // Create observer on [data-editable] elements
        const observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                const target = mutation.target;
                const html = target.nodeValue;

                debug('Mutation:', target, 'HTML:', html);
            });
        });

        $('[data-editable]').each(function () {
            const editable = $(this);

            // Store the content of the element
            storeElementContent(editable);

            observer.observe(editable[0], {
                childList: true,
                subtree: true,
                characterData: true
            });

            const key = editable.data('editable');
            const useTinyMCE = editable.data('tinymce');

            if (editable.is('div') || useTinyMCE) {
                // Load TinyMCE editor inline
                tinymce.init({
                    selector: `[data-editable="${key}"]`,
                    inline: true,
                    license_key: 'gpl',
                    menubar: false,
                    plugins: 'link image code',
                    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | link image | code',
                    style_formats: [
                        {
                            title: 'Gras',
                            inline: 'span',
                            styles: { 'font-weight': 'bold' }
                        },
                        {
                            title: 'Italic',
                            inline: 'span',
                            styles: { 'font-style': 'italic' }
                        },
                        {
                            title: 'Sous-ligné',
                            inline: 'span',
                            styles: { 'text-decoration': 'underline' }
                        },
                        {
                            title: 'Alignement à gauche',
                            selector: 'img',
                            styles: { 'float': 'left', 'margin': '0 10px 10px 0' }
                        },
                        {
                            title: 'Alignement au centre',
                            selector: 'img',
                            styles: { 'display': 'block', 'margin': '0 auto' }
                        },
                        {
                            title: 'Alignement à droite',
                            selector: 'img',
                            styles: { 'float': 'right', 'margin': '0 0 10px 10px' }
                        }
                    ],
                    formats: {
                        bold: { inline: 'span', styles: { 'font-weight': 'bold' } },
                        italic: { inline: 'span', styles: { 'font-style': 'italic' } },
                        underline: { inline: 'span', styles: { 'text-decoration': 'underline' } },
                        alignleft: { selector: 'img', styles: { 'margin-right': 'auto' } },
                        aligncenter: { selector: 'img', styles: { 'display': 'block', 'margin': '0 auto' } },
                        alignright: { selector: 'img', styles: { 'margin-left': 'auto' } }
                    }
                });
            }
        });
    }

    function saveContent() {
        // Get all elements [data-editable] and save the content
        const composition = $('[data-composite-id]');
        const page_id = $('body').data('page-id');
        const crsf = $('meta[name="csrf-token"]').attr('content');

        composition.each(function () {
            const composite = $(this);
            const composite_id = composite.data('composite-id');
            const elements = composite.find('[data-editable]');

            const data = {};
            elements.each(function () {
                const editable = $(this);
                const key = editable.data('editable');

                data[key] = editable.html();
                storeElementContent(editable);
            });

            debug('Content:', data);

            const url = route('live-edit.composition.update', {
                page_id,
                composite_id
            });

            // Send PUT request to route with the new data of the block
            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    data,
                    _token: crsf
                },
                success: function (response) {
                    if (response.error === undefined) {
                        debug('Block content updated successfully');
                        reloadContent();

                        window.showToast('success', 'Sauvegarde réussie', 'Les modifications ont été enregistrées avec succès');
                    } else {
                        console.error('Error updating block content:', response.error);
                        alert('Error updating block content')
                    }
                }
            });
        });


    }

    // Function to reload the content of the page without refreshing the page
    function reloadContent() {
        const url = location.href;

        $('#cms-wrapper').load(url + ' #cms-wrapper > *', function (response, status, xhr) {
            if (status === 'success') {
                debug('Content loaded successfully');
                initialize();
            } else if (status === 'error') {
                console.error('Error loading content:', xhr.status, xhr.statusText);
            }
        });
    }

    $(document).ready(function () {
            // Initialize the sortable function
            initialize();

            // When you leave the page, are you sure you want to leave?
            window.onbeforeunload = function () {
                if (hasContentChanged())
                    return 'Vous n\'avez pas enregistré les modifications';
            };

            $(document).on('click', '#saveContent', function () {
                saveContent();
            });

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

                debug('Action:', action, 'Composite ID:', composite_id, 'Page ID:', page_id, 'CSRF:', crsf)

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
                    case 'move-up':
                    case 'move-down':
                        // Move the html of the block up or down
                        const block = $(this).closest('[data-composite-id]');
                        const sibling = action === 'move-up' ? block.prev() : block.next();

                        debug('Block:', block, 'Sibling:', sibling, 'Action:', action)

                        if (sibling.length) {
                            block[action === 'move-up' ? 'insertBefore' : 'insertAfter'](sibling);

                            // Update the order of the blocks
                            updateOrderComposition(page_id);
                        }
                        break;
                    default:
                        break;
                }
            });
        }
    )
    ;
}
