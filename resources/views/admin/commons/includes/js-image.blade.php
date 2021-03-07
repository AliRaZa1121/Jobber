<script>
    // component
    //    <div class="form-group">
    //  <button class="btn btn-icon btn-primary upload-helper-btn" type="button">
    //     <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
    //     <span class="btn-inner--text">Select File</span>
    // </button>
    // <input type="file" name="logo" id="logo d-none" class="form-control custom-file-input" value=""> 
    // <div>
    
        // functionality
    $('.upload-helper-btn').unbind('click').click(function(){
        $(this).closest('.form-group').find('.custom-file-input').trigger('click');
    });
    
    $(document).unbind('change').on('change','.custom-file-input' , function(e){ 
        var file = e.target.files[0];
        var fileType = file["type"];
        var validImageTypes = ["image/gif", "image/jpeg", "image/jpg", "image/png"];             
        if ($.inArray(fileType, validImageTypes) < 0) {
            Swal.fire({
                title: 'Error',
                text: 'Kindly upload image of type (png, jpg, jpeg,gif)',
                type: 'Invalid image!'
            });
            $(this).closest('.form-group').find('.upload-helper-btn').removeClass('btn-success').addClass('btn-primary').find('.btn-inner--text').html('Select File');
            return false;
        }
        else{
            $(this).closest('.form-group').find('.upload-helper-btn').removeClass('btn-primary').addClass('btn-success').find('.btn-inner--text').html('Image uploaded');
        }
    });
</script>