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
@endsection
