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
        SMTP Detail ({{$server->title}})
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> SMTP</a></li>
        <li class="active">SMTP Detail</li>
        <li class="active">Add</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
           <form method="POST" action="{{ route('user.smtp.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$server->id}}">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">SMTP Details</h3>
              @include('user.server.timeline')
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
                       <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" value="{{$server->title}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Host Name</label>
                          <input type="text" name="hostname" class="form-control" id="exampleInputPassword1" placeholder="Host Name" value="{{$server->hostname}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Port</label>
                          <input type="text" name="port" class="form-control" placeholder="Port" value="{{$server->port}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Username" value="{{$server->username}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="text" name="password" class="form-control" placeholder="Password" value="{{$server->password}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Driver</label>
                          <input type="text" name="driver" class="form-control" placeholder="Driver" value="{{$server->driver}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Encryption</label>
                          <input type="text" name="encryption" class="form-control" placeholder="Encryption" value="{{$server->encryption}}">
                        </div>
                       
                      </div>
              <!-- /.box -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <div class="col-md-4">
                  <!-- general form elements -->
                   <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Users</h3>
                    </div>
                      <div class="box-body">
                        <ol>
                          @foreach($server->users as $user)
                            <li>{{$user->name}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $server->users ? $selecteduser=$server->users->pluck('id')->toArray() : $selecteduser=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Users:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="user_server[]">
                                @foreach($users as $user)
                              
                                <option value="{{$user->id}}" {{in_array($user->id, $selecteduser) ? 'selected' : ''}}>{{$user->name}} </option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                    </div>

                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Team</h3>
                    </div>
                      <div class="box-body">
                        <ol>
                          @foreach($server->teams as $team)
                            <li>{{$team->teamname}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $server->teams ? $selectedteam=$server->teams->pluck('id')->toArray() : $selectedteam=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Team:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="team_server[]">
                                @foreach($teams as $team)
                              
                                <option value="{{$team->id}}" {{in_array($team->id, $selectedteam) ? 'selected' : ''}}>{{$team->teamname}} </option>
                                @endforeach
                              </select>
                          </div>
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
<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect();
    });
})(jQuery);
</script>
@endsection