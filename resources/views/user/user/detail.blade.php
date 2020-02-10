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
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Select Role') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control" name="role">
                                  @foreach($roles as $role)
                                    <option value="{{$role->name}}" {{($user->roles[0]->name == $role->name ? 'selected' : '')}}>{{$role->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
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
                      <h3 class="box-title">Team</h3>
                    </div>
                      <div class="box-body">
                        <ol>
                          @foreach($user->teams as $team)
                            <li>{{$team->teamname}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $user->teams ? $selectedteam=$user->teams->pluck('id')->toArray() : $selectedteam=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Team:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="user_team[]">
                                @foreach($teams as $team)
                              
                                <option value="{{$team->id}}" {{in_array($team->id, $selectedteam) ? 'selected' : ''}}>{{$team->teamname}} </option>
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
                          @foreach($user->campaigns as $campaign)
                            <li>{{$campaign->subject}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $user->campaigns ? $selectedcampaign=$user->campaigns->pluck('id')->toArray() : $selectedcampaign=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Campaign:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="user_campaign[]">
                                @foreach($campaigns as $campaign)
                              
                                <option value="{{$campaign->id}}" {{in_array($campaign->id, $selectedcampaign) ? 'selected' : ''}}>{{$campaign->subject}} </option>
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
                          @foreach($user->servers as $server)
                            <li>{{$server->title}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $user->servers ? $selectedserver=$user->servers->pluck('id')->toArray() : $selectedserver=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Team:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="user_server[]">
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
                          @foreach($user->clients as $client)
                            <li>{{$client->title}}</li>
                          @endforeach
                        </ol>
                         
                      </div>
                      <div class="box-footer">
                        @php
                         $user->clients ? $selectedclient=$user->servers->pluck('id')->toArray() : $selectedclient=[];
                         @endphp
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Team:</label>
                             <select class="form-control test" multiple="multiple" data-placeholder="Select User" style="width: 100%;" name="user_client[]">
                                @foreach($clients as $client)
                              
                                <option value="{{$client->id}}" {{in_array($client->id, $selectedclient) ? 'selected' : ''}}>{{$client->title}} </option>
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