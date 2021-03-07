<script>
    // for deleting file popup sweetalert
    $(".delete").unbind('click').click(function() {
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = $(this).attr('data-url');
            }
        });

    });

</script>
