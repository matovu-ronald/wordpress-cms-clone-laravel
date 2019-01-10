@section('script')
    <script src="{{ asset('backend/plugins/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/boostrapdatepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/boostrapdatepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        // Convert title to slug
        $('#title').on('blur', function () {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-')
                                .replace(/[^a-z0-9-]/g, '-')
                                .replace(/\-\-+/g, '-')
                                .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);

        });

        // SimpleMDE Editor
        var simplemdeExcerpt = new SimpleMDE({ element: $("#excerpt")[0] });
        var simplemdeBody = new SimpleMDE({ element: $("#body")[0] });

        // Date Time Picker
        $(function () {
                $('#datetimepicker1').datetimepicker({
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down",
                        previous: "fa fa-arrow-left",
                        next: "fa fa-arrow-right",
                        clear: "fa fa-times"
                    },

                    format: 'YYYY-MM-DD HH:mm:ss',

                    showClear: true
                });
        });

        //Draft Submit button
        $("#draft-btn").click(function (e) {
            e.preventDefault();
            $("published_at").val(' ');
            $("#post-form").submit();
        })
    </script>
@endsection