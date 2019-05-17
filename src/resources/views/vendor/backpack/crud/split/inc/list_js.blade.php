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
     $(document).on('click', '#action', function(e) {
        hideMessage();
        var url = this.getAttribute('data-route');
        var id = this.getAttribute('data-id');
         $.ajax({
            type: 'GET',
            url: url,
            dataType: 'html',
            success: function(result) {
                $('#list').removeClass('{{ $crud->getListContentClass() }}');
                $('#list').addClass('{{ config('backpacksplit.split_class_div') }}');
                $('#show').html(result);
                crud.table.ajax.reload();
            },
        });
    })
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
                $('#list').removeClass('{{ config('backpacksplit.split_class_div') }}');
                $('#list').addClass('{{ $crud->getListContentClass() }}');
                $('#show').empty();
                crud.table.ajax.reload();
                $('.alert-success').show();
                $('.alert-success').append('<li>'+message+'</li>');
                $('.alert-success').hide(1000);
            },
           error: function(jqXhr, json, errorThrown){
                var errors = jqXhr.responseJSON.errors;
                if(errors)
                {
                    $('.alert-danger').html('');

                    $.each(errors, function(key, value){
                            $('.alert-danger').show();
                            $('.alert-danger').append('<li>'+value+'</li>');
                    });
                }
            }
        });
     });

     $(document).on('click', '#cancel', function(e) {
        e.preventDefault();
        hideMessage();
        $('#list').removeClass('{{ config('backpacksplit.split_class_div') }}');
        $('#list').addClass('{{ $crud->getListContentClass() }}');
        $('#show').empty();
        crud.table.ajax.reload();
     });
</script>