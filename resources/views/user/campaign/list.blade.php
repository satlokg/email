 @extends('layouts.user')
 @section('css')

 @endsection
 @section('bread')
 <section class="content-header">
      <h1>
        Templates Detail
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Templates</li>
        <li class="active">Detail</li>
      </ol>
@endsection


@section('content')

      <div class="row">
        <div class="col-md-12">
           <form method="POST" action="{{ route('sendEmail') }}" enctype="multipart/form-data">
            @csrf
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Templates Detail</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                
              
              <div class="col-md-6">
                  <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Templates List</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <table class="table table-bordered table-striped">
                <thead>
                <tr class="bg-yellow">
                  <th>Subject</th>
                  <th></th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($campaigns as $key=>$campaign)
                <tr>
                  <td>{{$campaign->subject}}</td>
                  @if($campaign->templates != null)
                  <td><a href="{{route('campaign.detail',encrypt($campaign->id,'vipra'))}}"> view</a></td>
                  @else
                  <td><a target="_blank" href="{{route('campaign.detail',encrypt($campaign->id,'vipra'))}}"> view</a></td>
                  @endif
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

@endsection