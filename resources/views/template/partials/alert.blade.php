@push('js')
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{ session()->get('success') }}",
        showCancelButton: false,
        confirmButtonText: 'OK',
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        sessionStorage.removeItem('success');
    }
    })
</script>
@endif
@if (session('info'))
<script>
    Swal.fire({
        icon: 'info',
        title: 'Mohon Maaf',
        text: "{{ session()->get('info') }}",
        type: "info"
    })
</script>
@endif
@if (session('errors'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        text: "{{ session()->get('errors') }}",
        type: "error"
    })
</script>
@endif
@endpush
