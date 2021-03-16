<script src="{{ asset('assets/panel/vertical/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/detect.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/vertical-menu.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('assets/helper.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@include('sweetalert::alert')
@stack('script')
<!-- Core JS -->
<script src="{{ asset('assets/panel/vertical/js/core.js') }}"></script>
<!-- End JS -->
<!-- Summernote JS -->
<script src="{{ asset('assets/panel/vertical/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $('.summernote-description').summernote({
        placeholder: 'Description...',
        tabsize: 2,
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
