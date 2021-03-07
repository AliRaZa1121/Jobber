<script>
    // for message send and validation
    $('#message').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            e.preventDefault();
            var _token = $("input[name=_token]").val();
            var from_user = $('#from_user').val();
            var company_id = $('#company_id').val();
            var direction = $('#direction').val();
            var message = $('#message').val();
            var endPoint = '<?php echo route("chat.send") ?>';
            if(message != ''){
                $.ajax({
                    type: 'post',
                    url: endPoint,
                    data:{_token, from_user, company_id, direction, message},
                    success:function(response){
                        $('#chat').html('');
                        $('#chat').html(response);
                        $('#message').val('');
                    }
                });
            }
            else
            {
                Swal.fire({
                    title: 'Error',
                    text: 'Kindly enter some message',
                    type: 'error'
                });
            }
        }
    });
    $('#send').click(function(){
        var _token = $("input[name=_token]").val();
        var from_user = $('#from_user').val();
        var company_id = $('#company_id').val();
        var direction = $('#direction').val();
        var message = $('#message').val();
        var endPoint = '<?php echo route("chat.send") ?>';
        if(message != ''){
            $.ajax({
                type: 'post',
                url: endPoint,
                data:{_token, from_user, company_id, direction, message},
                success:function(response){
                    $('#chat').html('');
                    $('#chat').html(response);
                    $('#message').val('');
                }
            });
        }
        else
        {
            Swal.fire({
                title: 'Error',
                text: 'Kindly enter some message',
                type: 'error'
            });
        }
    });
    
    setInterval(() => {
        if($('#chat').length > 0){
            var _token = $("input[name=_token]").val();
            var from_user = $('#from_user').val();
            var company_id = $('#company_id').val();
            var endPoint = '<?php echo route("chat.ajax") ?>';
            $.ajax({
                type: 'post',
                url: endPoint,
                data:{_token, from_user, company_id},
                success:function(response){
                    $('#chat').html('');
                    $('#chat').html(response);
                }
            });
        }
    }, 10000);
</script>