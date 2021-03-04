@section('script')
<script>
      $('.delete').on('click',function(e){
        e.preventDefault();
        var that = $(this);
        var n = new Noty({
          text : 'Confirm deleting record',
          killer : true,
          themes: 'relax',
          buttons:[
            Noty.button('Yes', 'btn btn-success mr-2', function(){
              that.closest('form').submit();
            }),

            Noty.button('No', 'btn btn-danger', function(){
              n.close();
            }),
          ]
        });
        n.show();

      });

  </script>
<script>
    $(document).on('click', '#popular', function (e) {

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).data('id');
        var popular = $(this);
        var data = {
            'id': id,
        };
        $.ajax({
            type: "POST",
            url: "{{route('popular')}}",
            data: data,
            success: function (data) {

                if(data == true){
                    new Noty({
                        theme: 'relax',
                        type:'success',
                        layout: 'topRight',
                        text : "Add to popular product",
                        timeout: 3000,
                        kiler: true

                    }).show();

                    popular.text('is popular');
                    popular.removeClass('btn btn-success rounded-0');
                    popular.removeClass('btn btn-danger rounded-0');
                    popular.addClass('btn btn-success rounded-0');
                }else{
                    new Noty({
                        theme: 'relax',
                        type:'error',
                        layout: 'topRight',
                        text : "remove from popular product",
                        timeout: 3000,
                        kiler: true

                    }).show();
                    popular.text('not popular');
                    popular.removeClass('btn btn-success rounded-0');
                    popular.removeClass('btn btn-danger rounded-0');
                    popular.addClass('btn btn-danger rounded-0');
                }
            }


        });
    });
</script>

@endsection
