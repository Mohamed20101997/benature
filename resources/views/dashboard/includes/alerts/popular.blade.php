@section('script')

<script>
    $(document).on('click', '#popular', function (e) {

        alert('sdf');

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).data('id');
        var data = {
            'id': id
        };
        $.ajax({
            type: "POST",
            url: "/popular",
            data: data,
            success: function (data) {

            }
        });
    });
</script>

@endsection
