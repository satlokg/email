 @extends('layouts.user')
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
        User Detail ({{$user->name}} [{{$user->roles[0]->name}}])
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">User Detail</li>
        <li class="active">Add</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
           <form method="POST" action="{{ route('campaign.post') }}" enctype="multipart/form-data">
            @csrf
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Create Campaign Templates</h3>
              @include('user.user.timeline')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
                <div class="col-md-8">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">General Information</h3>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                       
                       
                      </div>
              <!-- /.box -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <div class="col-md-4">
                  <!-- general form elements -->
                   <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Team</h3>
                    </div>
                      <div class="box-body">
                       
                      </div>
                    </div>

                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Campaign</h3>
                    </div>
                      <div class="box-body">
                       
                      </div>
                    </div>

                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Smtp Server</h3>
                    </div>
                      <div class="box-body">
                       
                      </div>
                    </div>

                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Client Server</h3>
                    </div>
                      <div class="box-body">
                       
                      </div>
                    </div>


                  </div>

             
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             
             
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

<script src="{{asset('public/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
 CKEDITOR.replace( 'editor1' );
</script>

@endsection