<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', (get_setting('website_name') ?: 'RoofShelter')) | ADMIN PANEL</title>
    <link rel="icon" href="{{ asset(get_setting('site_logo') ? 'img/'.get_setting('site_logo') : 'webtheme/assets/images/resources/RoofShelter-Logo1.jpg') }}" type="image/x-icon" />

    @vite(['resources/css/app.css', 'resources/js/admin.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/file-upload.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.css">
</head>
<body class="bg-gray-50 font-sans antialiased">
<div class="flex h-screen overflow-hidden">

    @include('backend.layout.sidebar')

    <div class="flex-1 flex flex-col min-w-0 ml-64 transition-all duration-300" id="admin-content-wrapper">
        @include('backend.layout.header')

        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>

        @include('backend.layout.footer')
    </div>

</div>

@yield('modal')

@yield('script')

<script src="{{asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jsvectormap/world.js')}}"></script>
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js"></script>
<script src="{{asset('tinymce/tinymce.min.js')}}"></script>

<script>
$(function () {
    // RateYo for rating input
    let $rating = $("#rating");
    if ($rating.length) {
        let initialRating = parseFloat($rating.val()) || 0;
        $("#rateYo").rateYo({
            rating: initialRating,
            halfStar: true,
            starWidth: "30px",
            ratedFill: "#f97316",
            normalFill: "#dcdcdc",
            onSet: function (rating) {
                $rating.val(rating);
                $("#rating-message").text("You have selected " + rating + " stars!");
            }
        });
        if (initialRating > 0) {
            $("#rating-message").text("You have selected " + initialRating + " stars!");
        }
    }

    // RateYo for read-only star displays
    $(".star-display").each(function () {
        $(this).rateYo({
            rating: parseFloat($(this).data("rating")),
            readOnly: true,
            starWidth: "25px",
            ratedFill: "#f97316",
            normalFill: "#ddd"
        });
    });
});

$(document).ready(function () {
    // Select2
    $('.select2').select2();
    $('#category_id').select2({ allowClear: true });

    // Category → Subcategory cascade
    function loadSubcategories(categoryId, selectedSubcategoryId) {
        if (categoryId) {
            $.get("{{ route('admin.getservice-subcategories') }}", { category_id: categoryId }, function (data) {
                $('#subcategory_id').empty().append('<option value="">-- Select Sub Category --</option>');
                $.each(data, function (k, s) {
                    let sel = s.id == selectedSubcategoryId ? 'selected' : '';
                    $('#subcategory_id').append('<option value="' + s.id + '" ' + sel + '>' + s.subcategory_name + '</option>');
                });
                $('#subcategory_id').trigger('change.select2');
            });
        } else {
            $('#subcategory_id').empty().append('<option value="">-- Select Sub Category --</option>').trigger('change.select2');
        }
    }
    $('#servicecategory_id').on('change', function () { loadSubcategories($(this).val()); });
    let sc = $('#servicecategory_id').data('selected');
    let ss = $('#subcategory_id').data('selected');
    if (sc) { $('#servicecategory_id').val(sc).trigger('change.select2'); loadSubcategories(sc, ss); }

    // Icon select2
    function loadIcons(selected) {
        $.getJSON("{{ asset('icons.json') }}", function (data) {
            let unique = [...new Set(data)];
            let items = [{ id: '', text: 'Select an Icon' }, ...unique.map(i => ({ id: i, text: i, html: '<i class="'+i+'"></i> '+i }))];
            $("#icon").empty().select2({
                data: items,
                tags: true,
                createTag: function (p) {
                    let t = $.trim(p.term);
                    if (!t) return null;
                    return { id: t.startsWith("fa") ? t : 'fa fa-'+t, text: t.startsWith("fa") ? t : 'fa fa-'+t, newOption: true };
                },
                templateResult: function (d) { return d.id ? $('<span><i class="fa '+d.id+'"></i> '+d.text+'</span>') : $('<span class="text-gray-400">Select an Icon</span>'); },
                templateSelection: function (d) { return d.id ? $('<span><i class="fa '+d.id+'"></i> '+d.text+'</span>') : $('<span class="text-gray-400">Select an Icon</span>'); },
                escapeMarkup: function (m) { return m; }
            });
            if (selected) $("#icon").val(selected).trigger("change");
        });
    }
    loadIcons($("#icon").data("selected"));
    $("#icon").on("select2:select", function (e) {
        let d = e.params.data;
        if (d.newOption) {
            $.post("{{ route('icons.add') }}", { _token: "{{ csrf_token() }}", icon: d.id }, function (r) {
                if (r.success) loadIcons(r.icon);
                else { $.notify({ message: r.message, icon: 'fa fa-exclamation-circle' }, { type: "danger", placement: { from: "top", align: "center" }, delay: 2000 }); loadIcons(); }
            });
        }
    });

    // DataTables
    if ($.fn.DataTable) {
        $("#basic-datatables").DataTable();
        $("#multi-filter-select").DataTable({ pageLength: 5 });
        $("#add-row").DataTable({ pageLength: 5 });
    }

    // Delete record
    $(document).on("click", ".delete-record", function (e) {
        e.preventDefault();
        let url = $(this).data("url"), id = $(this).data("id"), row = $("#record-row-" + id);
        swal({ title: "Are you sure?", text: "This record will be permanently deleted!", icon: "warning", buttons: ["Cancel", "Yes, Delete!"], dangerMode: true })
            .then(function (willDelete) {
                if (willDelete) {
                    $.get(url, function (r) {
                        if (r.success) { let t = $("#basic-datatables").DataTable(); t.row(row).remove().draw(false); row.fadeOut(400, function () { $(this).remove(); }); }
                    });
                }
            });
    });

    // Toggle status
    $(document).on("change", ".toggle-status", function () {
        let id = $(this).data("id"), url = $(this).data("url"), status = $(this).is(":checked") ? 1 : 0;
        $.post(url, { _token: "{{ csrf_token() }}", id: id, status: status }, function (r) {
            if (r.success) $.notify({ message: "Published status updated successfully!", title: "Success", icon: "fa fa-check" }, { type: "success", placement: { from: "top", align: "center" }, time: 3000, delay: 2000 });
        });
    });

    // TinyMCE
    if (typeof tinymce !== 'undefined') {
        tinymce.init({ selector: '#myeditor', height: 300, license_key: 'gpl', menubar: false, plugins: 'lists link image code', toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code' });
    }

    // Social fields toggle
    $('#add_social').change(function () { if ($(this).is(':checked')) $('#social-fields').slideDown(); else $('#social-fields').slideUp(); });

    // Enquiry polling
    let lastCount = 0;
    function fetchCounts() {
        $.get("{{ url('/admin/enquiries/latest') }}", function (data) {
            $('#enquiry-count, #header-enquiry-count').text(data.count);
            $('#notif-total').text(data.count);
            let html = '';
            data.notifications.forEach(function (n) {
                html += '<a href="{{ url('/admin/enquiries') }}" class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors"><div class="w-8 h-8 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 flex-shrink-0"><i class="fa fa-envelope text-xs"></i></div><div class="min-w-0"><span class="block text-sm font-medium text-gray-900 truncate">' + n.username + ' sent enquiry</span><span class="block text-xs text-gray-500">' + new Date(n.created_at).toLocaleString() + '</span></div></a>';
            });
            $('#notif-list').html(html);
            if (data.count > lastCount) {
                if (Notification.permission === "granted") new Notification("New Enquiry!", { body: "You have a new enquiry.", icon: "{{ asset('admin-icon.png') }}" });
                new Audio("{{ asset('sounds/notify.mp3') }}").play();
            }
            lastCount = data.count;
        });
        $.get("{{ route('admin.appointments.count') }}", function (d) { $('#appointment-count').text(d.count); });
        $.get("{{ route('admin.quotes.count') }}", function (d) { if (d && typeof d.count !== 'undefined') $('#quote-count').text(d.count); });
    }
    fetchCounts();
    setInterval(fetchCounts, 15000);
    if (Notification.permission !== "granted") Notification.requestPermission();

    // Session flash notifications
    @if(session('success'))
    $.notify({ message: "{{ session('success') }}", icon: 'fa fa-check-circle' }, { type: "success", placement: { from: "top", align: "center" }, delay: 3000 });
    @endif
    @if(session('error'))
    $.notify({ message: "{{ session('error') }}", icon: 'fa fa-exclamation-circle' }, { type: "danger", placement: { from: "top", align: "center" }, delay: 3000 });
    @endif
});
</script>

</body>
</html>