 @extends('layouts.user')
 @section('css')

 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Mail  Detail
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Mail </li>
        <li class="active">Detail</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
           <form method="POST" action="{{ route('mailList.post') }}" id="emailform">
            @csrf
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Credentials</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
              <div class="col-md-9">
                  <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Server List</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <table class="table table-bordered table-striped" id="email">
                      <thead>
                      <tr class="bg-yellow">
                        <th><input type="checkbox" id="select_all"></th>
                        <th>#</th>
                        <th>Email Id</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($emails as $key=>$email)
                      <tr>
                        <td><input type="checkbox" name="ids[]" value="{{$email->id}}" class="checkbox"></td>
                        <th>{{$key+1}}</th>
                        <td>{{$email->email}}</td>
                        <td>{{$email->email}}</td>
                        <td>
                           <a href="{{route('email.edit',['id'=>$email->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                   
                   
                           <a href="{{ route('email.delete',['id'=>encrypt($email->id,'vipra')]) }}" class="btn btn-sm btn-danger"
                                 data-tr="tr_{{$email->id}}"
                                 data-toggle="confirmation"
                                 data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                                 data-btn-ok-class="btn btn-sm btn-danger"
                                 data-btn-cancel-label="Cancel"
                                 data-btn-cancel-icon="fa fa-chevron-circle-left"
                                 data-btn-cancel-class="btn btn-sm btn-default"
                                 data-title="Are you sure you want to delete ?"
                                 data-placement="left" data-singleton="true">
                                  <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                              </a>
                         
                           <a href="{{ route('email.block',['id'=>encrypt($email->id,'vipra')]) }}" class="text-danger btn btn-sm btn-default"
                                 data-tr="tr_{{$email->id}}"
                                 data-toggle="confirmation"
                                 data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                                 data-btn-ok-class="btn btn-sm btn-danger"
                                 data-btn-cancel-label="Cancel"
                                 data-btn-cancel-icon="fa fa-chevron-circle-left"
                                 data-btn-cancel-class="btn btn-sm btn-default"
                                 data-title="Are you sure you want to delete ?"
                                 data-placement="left" data-singleton="true">
                                  <i class="fa fa-ban" aria-hidden="true"></i> Block
                              </a>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>

             
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <input type="submit" class="btn btn-sm btn-default pull-right"  value="Selected Block">
              <input type="submit" class="btn btn-sm btn-danger pull-right" value="Selected Delete">
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          </form>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->
      @endsection

@section('js')
<script type="text/javascript">
$("#select_all").change(function(){  //"select all" change 
    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change 
$('.checkbox').change(function(){ 
  //uncheck "select all", if one of the listed checkbox item is unchecked
    if(false == $(this).prop("checked")){ //if this item is unchecked
        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }
  //check "select all" if all checkbox items are checked
  if ($('.checkbox:checked').length == $('.checkbox').length ){
    $("#select_all").prop('checked', true);
  }
});
</script>
<script>
  $(function () {
    $('#email').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mistic100-Bootstrap-Confirmation/2.4.4/bootstrap-confirmation.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'GET',
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });

 
  $('#emailform').on('submit',function(e) {
    
    event.preventDefault();
      var form = this;
      swal({
        title: "Are you sure?",
        text: "All data related to this will be parmanently deleted",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, DELETE it!",
        cancelButtonText: "No, cancel please!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          form.submit();
          } else {
          swal("Cancelled", " Record is safe :)", "error");
        
        }
      });
      });
</script>
@endsection