<script type="text/javascript">
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    })
    function hideMessage()
    {
        $('.alert-danger').html('');
        $('.alert-danger').hide();
        $('.alert-success').html('');
        $('.alert-success').hide();

    }

    function  hideModal()
    {
        $('#backpackModal').modal('hide');
        $('#showModal').empty();
    }

     $(document).on('click', '#modal', function(e) {
        hideMessage();
        hideModal();
        var url = this.getAttribute('data-route');
        var id = this.getAttribute('data-id');
         $.ajax({
            type: 'GET',
            url: url,
            dataType: 'html',
            success: function(result) {
                $('#showModal').html(result);
                $('#backpackModal').modal('show');
            },
        });
    });

     $(document).on('submit', 'form', function(e) {
        e.preventDefault();
        hideMessage();
        var url = this.getAttribute('action');
        var id = $('input[name="id"]').val();
        var message = '';
        if (id) {
            message += '{{ trans('backpack::crud.update_success') }}';
        } else {
            message += '{{ trans('backpack::crud.insert_success') }}';
        }
        $.ajax({
            type: 'POST',
            url: url,
            data: $(this).serialize(),
            success: function(result) {
                hideModal();
                crud.table.ajax.reload();
                $('.alert-success').show();
                $('.alert-success').append('<li>'+message+'</li>');
                $('.alert-success').hide(2000);
            },
           error: function(jqXhr, json, errorThrown){
                var errors = jqXhr.responseJSON.errors;
                if(errors)
                {
                    $('#backpackModal').modal('show');
                    $('.alert-danger').html('');
                    $.each(errors, function(key, value){
                            $('.alert-danger').show();
                            $('.alert-danger').append('<li>'+value+'</li>');
                    });
                }
            }
        });
     });
</script>