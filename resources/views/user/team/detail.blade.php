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
        Team Detail ({{$team->teamname}})
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Team</a></li>
        <li class="active">Team Detail</li>
        <li class="active">Add</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
           <form method="POST" action="{{ route('team.update') }}" enctype="multipart/form-data">
            @csrf
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Team Details</h3>
              @include('user.team.timeline')
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
                       <form method="POST" action="{{ route('team.add.post') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $team->id }}">
                        <div class="form-group row">
                            <label for="teamname" class="col-md-4 col-form-label text-md-right">{{ __('Team Name') }}</label>

                            <div class="col-md-6">
                                <input id="teamname" type="text" class="form-control @error('teamname') is-invalid @enderror" name="teamname" value="{{ $team->teamname }}" required autocomplete="teamname" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                       
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
                          @foreach($team->users as $user)
                            <li>{{$user->name}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $team->users ? $selecteduser=$team->users->pluck('id')->toArray() : $selecteduser=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Users:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="user_team[]">
                                @foreach($users as $user)
                              
                                <option value="{{$user->id}}" {{in_array($user->id, $selecteduser) ? 'selected' : ''}}>{{$user->name}} </option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                    </div>

                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Campaign</h3>
                    </div>
                      <div class="box-body">
                        <ol>
                          @foreach($team->campaigns as $campaign)
                            <li>{{$campaign->subject}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $team->campaigns ? $selectedcampaign=$team->campaigns->pluck('id')->toArray() : $selectedcampaign=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Campaign:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="team_campaign[]">
                                @foreach($campaigns as $user)
                              
                                <option value="{{$user->id}}" {{in_array($user->id, $selectedcampaign) ? 'selected' : ''}}>{{$user->subject}} </option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                    </div>

                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Smtp Server</h3>
                    </div>
                      <div class="box-body">
                        <ol>
                          @foreach($team->servers as $server)
                            <li>{{$server->title}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $team->servers ? $selectedserver=$team->servers->pluck('id')->toArray() : $selectedserver=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">SMTP:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="team_server[]">
                                @foreach($servers as $server)
                              
                                <option value="{{$server->id}}" {{in_array($server->id, $selectedserver) ? 'selected' : ''}}>{{$server->title}} </option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                    </div>

                    <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Client Server</h3>
                    </div>
                      <div class="box-body">
                        <ol>
                          @foreach($team->clients as $client)
                            <li>{{$client->driver}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $team->clients ? $selectedclient=$team->clients->pluck('id')->toArray() : $selectedclient=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Client:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="team_client[]">
                                @foreach($clients as $client)
                              
                                <option value="{{$client->id}}" {{in_array($client->id, $selectedclient) ? 'selected' : ''}}>{{$client->driver}} </option>
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