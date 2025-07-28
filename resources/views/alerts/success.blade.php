@if ($message = Session::get('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: @json($message),
                timer: 2000,
                showConfirmButton: false
            });
        });
    </script>
@endif
