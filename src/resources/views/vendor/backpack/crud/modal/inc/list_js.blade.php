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
        $('#backpackModal').modal('hide');
        $('#showModal').empty();

    }
     $(document).on('click', '#modal', function(e) {
        hideMessage();
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
    })
</script>