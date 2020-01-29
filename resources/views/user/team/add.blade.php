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
        Team
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Team</li>
        <li class="active">Add</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
          
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Create Team</h3>
              @include('user.team.timeline')
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
                       
                        <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('team.add.post') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="teamname" class="col-md-4 col-form-label text-md-right">{{ __('Team Name') }}</label>

                            <div class="col-md-6">
                                <input id="teamname" type="text" class="form-control @error('teamname') is-invalid @enderror" name="teamname" value="{{ old('teamname') }}" required autocomplete="teamname" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Select User For Team') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control test" name="user[]"   multiple="multiple">
                                  @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                       
                       

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->
      @endsection

@section('js')
<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect();
    });
})(jQuery);
</script>
@endsection