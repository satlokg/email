 @extends('layouts.admin')
 @section('css')
<link rel="stylesheet" href="{{asset('public/bower_components/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<style type="text/css">
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #2522d4;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
</style>
 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Server Detail
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Server Detail</li>
        <li class="active">Add</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
           <form method="POST" action="{{ route('admin.mailserver.post') }}" enctype="multipart/form-data">
            @csrf
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Credentials</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Quick Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Host Name</label>
                          <input type="text" name="hostname" class="form-control" id="exampleInputPassword1" placeholder="Host Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Port</label>
                          <input type="text" name="port" class="form-control" placeholder="Port">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Driver</label>
                          <input type="text" name="driver" class="form-control" placeholder="Driver">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Encryption</label>
                          <input type="text" name="encryption" class="form-control" placeholder="Encryption">
                        </div>
                      
                       
                  </div>
          <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
              <div class="col-md-6">
                  <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Server List</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <table class="table table-bordered table-striped">
                <thead>
                <tr class="bg-yellow">
                  <th>Server Title</th>
                  <th>Host Name</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                
                 @foreach($servers as $key=>$server)
                  <tr class="bg-green">
                  <td>{{$server->title}}</td>
                  <td>{{$server->hostname}}</td>
                  <td></td>
                  
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
              <button type="submit" class="btn btn-sm btn-success pull-right">Save</button>
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
<script src="{{asset('public/bower_components/moment/min/moment.min.js')}}"></script>
<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect();
    });
})(jQuery);
</script>
<script src="{{asset('public/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
(function($) {
     $('.select2').select2()
})(jQuery);
</script>.
<script src="{{asset('public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript">
  $('#datepicker').datepicker({
      autoclose: true
    })
  $('#reservation').daterangepicker()
</script>
<script src="{{asset('public/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-add").click(function(){ 

          var lsthmtl = $(".clone").html();

          $(".increment").after(lsthmtl);

      });

      $(".box-body").on("click",".btn-danger",function(){ 

          $(this).parents(".hdtuto").remove();

      });

    });

</script>
@endsection