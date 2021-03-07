@php
 $defaultImage = asset('media/users/blank.png');   
@endphp
<script>
   $(".upload-img").unbind('change').change(function(e) {
      
        var width = $(this).attr('data-width');
        var height = $(this).attr('data-height');
        imageProcessing(width, height, this);
        
    });

    function imageProcessing(width, height, input) {
        var myInput = input;
        var myInputID = $(myInput).attr('id');
        var defaultImage = '<?php echo $defaultImage ?>';
        var fileType = input.files[0].type;
        var validImageTypes = ["image/gif", "image/jpeg", "image/jpg", "image/png"];  
        if ($.inArray(fileType, validImageTypes) > 0) {
            var reader = new FileReader();
            reader.onload = (function(input) {
                
                var image = new Image();
                image.src = input.target.result;

                image.onload = function() {
                    if (this.width < width && this.heigth < height) {
                        $(myInput).val("");
                        $('#'+myInputID).closest('.blah').css('background-image', "url(" + defaultImage + ")");
                        toastr.error('Image resoultion is not HD');
                    } else {
                        $('#'+myInputID).closest('.blah').css('background-image', "url(" + this.src + ")");
                    }
                };
            });
            reader.readAsDataURL(input.files[0]);
        } else {
            $(myInput).val("");
            $('#'+myInputID).closest('.blah').css('background-image', "url(" + defaultImage + ")");
            toastr.error('Please select a valid image');
            return false;
        }
    }
</script>

{{-- <script>
    

</script>
 --}}