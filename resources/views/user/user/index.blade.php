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
        Campaign
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">CampaignTemplates</li>
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
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Quick Information</h3>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                       <table class="table table-bordered table-striped">
                          <thead>
                          <tr class="bg-yellow">
                            <th>#</th>
                            <th>Name</th>
                            <th>EmailId</th>
                            <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($users as $key=>$user)
                          <tr>
                            <th>{{$key+1}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                              <a href="{{route('users.detail',['id'=>encrypt($user->id,'vipra')])}}" class="btn btn-sm btn-info">Detail</a>
                            </td>
                          </tr>
                          @endforeach
                          </tbody>
                          
                        </table>
                       
                      </div>
                       
              <!-- /.box -->
                    </div>
                    <!-- /.col -->
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