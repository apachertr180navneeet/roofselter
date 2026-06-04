$(function () {
    // Preview on file select
    $(document).on('change', '.file-input', function () {
        var container = $(this).closest('.file-upload');
        var preview = container.find('.file-preview');
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.find('.preview-img').attr('src', e.target.result);
                preview.find('.file-name').text(file.name);
                preview.find('.file-size').text((file.size / 1024).toFixed(1) + ' KB');
                preview.removeClass('d-none');
                container.find('.remove-flag').val('0');
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove image
    $(document).on('click', '.remove-btn', function () {
        var container = $(this).closest('.file-upload');
        var preview = container.find('.file-preview');
        var input = container.find('.file-input');
        preview.addClass('d-none');
        input.val('');
        container.find('.remove-flag').val('1');
    });
});
