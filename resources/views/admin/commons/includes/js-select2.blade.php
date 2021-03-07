<script>
    $('#summernote').summernote();
    setTimeout(() => {
            if($('.select2').length > 0){
                $('.select2').select2({
                    allowClear: true,
                });
            }    
    }, 1000);
    
</script>