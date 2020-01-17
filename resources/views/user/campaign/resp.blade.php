 @extends('layouts.user')
 @section('css')

 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Sending Detail
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Email</li>
        <li class="active">Responce</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
           
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sending Detail</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
                
              <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Faild</span>
                      <span class="info-box-number">{{$res->sum('error')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-google-plus"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Success</span>
                      <span class="info-box-number">{{$res->sum('success')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

             
              <!-- /.row -->
            </div>

            <div class="col">
              <table class="table table-bordered table-striped table-responsive">
                <thead>
                <tr class="bg-yellow">
                  <th>Campaign Title</th>
                  <th>Mail List</th>
                  <th>Mail Success</th>
                  <th>Mail Failed</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $list)
                <tr>
                  <td>{{@$list->campaign->subject}}</td>
                  <td>{{@$list->list($list->listing_id)}}</td>
                  <td>{{$list->success}}</td>
                  <td>{{$list->error}}</td>
                  <td>{{$list->created_at->diffForHumans()}}</td>
                </tr>
                @endforeach
                </tbody>
                
              </table>
            </div>
           
          </div>
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->
      @endsection

@section('js')

@endsection