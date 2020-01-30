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
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                <!-- /.col -->
                <div class="col-md-8">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Quick Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Subject</label>
                          <input type="text" name="subject" class="form-control" id="exampleInputEmail1" placeholder="Enter Subject">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Template</label>
                          <textarea name="editor1"></textarea>
                        </div>
                      
                        <div class="form-group">
                          <label for="exampleInputPassword1">Upload Template</label>
                          <input type="file" name="file" class="form-control">
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
                      <h3 class="box-title">Assign To User</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <div class="box-body">
                                            
                      <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Select User') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control test" name="user[]"   multiple="multiple">
                                  @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="team" class="col-md-4 col-form-label text-md-right">{{ __('Select Team') }}</label>

                            <div class="col-md-6">
                                <select id="team" class="form-control test" name="team[]"   multiple="multiple">
                                  @foreach($teams as $team)
                                    <option value="{{$team->id}}">{{$team->teamname}}</option>
                                  @endforeach
                                </select>
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
              <button type="submit" name="button" value="email" class="btn btn-sm btn-success pull-right">Save & Preview</button>
             
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