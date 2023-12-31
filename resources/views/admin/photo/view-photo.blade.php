@extends('admin.layouts.index')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">

          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Photo List</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
                <div class="col-sm-6">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                   <button style="margin-top: -30px" type="button" class="close text-white" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
          @endif
        </div>

            <div class="pannel" style="background-color:white;border-bottom: 5px solid #605ca8 ;margin-bottom: 20px;">
             <div class="pannel-header" style="background-color: #605ca8;color: white;padding: 10px">
                <h5>Photo List
                 <button type="button" class="btn btn-warning float-right btn" data-toggle="modal" data-target="#addPhoto"><i class="fa fa-plus-circle"></i> Add Photo</button>
                </h5>
              </div>
            <div class="card-body">
                <table id="example1" class="table  table-hover table-sm">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">

                     <th>Caption Date</th>
                     <th>Photo Title</th>
                     <th>Caption By</th>
                     <th>Photo</th>
                     <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $photo)
            <tr>

                      <td>{{date('d-M-Y',strtotime($photo->caption_date))}}</td>
                      <td>{{ $photo->title}}</td>
                      <td>{{$photo->caption_by}}</td>
                      <td>
                     @if($photo->status==1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                     <td><a target="_blank" href="{{ asset('upload/photoimage/'.$photo->image) }}"><img class="profile-user-img " src="{{(!empty($photo->image))?url('upload/photoimage/'.$photo->image):url('upload/usernoimage.png')}}" style="width:40px;height: 45;" alt="User profile picture"></a></td>
                      <td>
                        @if($photo->status==1)
                          <a id="inactive" href="{{route('admin.photo.inactive',$photo->id)}}" class="btn  btn-warning btn-xs mr-2"> <i class="fa fa-arrow-up"></i></a>
                          @else
                          <a id="active" href="{{route('admin.photo.active',$photo->id)}}" class="btn btn-success btn-xs mr-2" > <i class="fa fa-arrow-down"></i></a>
                          @endif
                    <button type="button" class="btn btn-dark  btn-xs" data-toggle="modal" data-target="#showPhoto-{{ $photo->id }}"><i class="fa fa-eye"></i></button>

                     <button type="button" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#editPhoto-{{ $photo->id }}"><i class="fa fa-edit"></i></button>

                     <a title="Delete" id="delete" href="{{route('admin.photo.delete',$photo->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

   {{-- Add Color --}}

  <div class="modal fade" id="addPhoto" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #605ca8 ;">
            <div class="modal-header " style="background-color: #605ca8;color: white;padding: 10px">
              <h4 class="modal-title">Add Photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('admin.photo.store')}}" id="myform" enctype="multipart/form-data">
                @csrf

<div class="row">
                  <div class="form-group col-md-6">
                    <label for="title"  class="col-sm-12 col-form-label">Photo Title</label>
                    <div class="col-sm-12">
                    <input type="text" name="title" id="photo_title" class="form-control " placeholder="Enter Photo Title"  autocomplete="off" value="{{old('title')}}">
                    <font style="color:red">{{($errors)->has('title')?($errors->first('title')):''}}</font>
                  </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="caption_by"  class="col-sm-12 col-form-label">Caption By</label>
                    <div class="col-sm-12">
                    <input type="text" name="caption_by" id="caption_by" class="form-control " placeholder="Enter Caption By"  autocomplete="off" value="{{old('caption_by')}}">
                    <font style="color:red">{{($errors)->has('caption_by')?($errors->first('caption_by')):''}}</font>
                  </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="caption_date"  class="col-sm-12 col-form-label">Caption Date</label>
                    <div class="col-sm-12">
                    <input type="date" name="caption_date" id="datepicker" class="form-control " placeholder="Enter caption_date"  autocomplete="off" value="{{old('caption_date')}}">
                    <font style="color:red">{{($errors)->has('caption_date')?($errors->first('caption_date')):''}}</font>
                  </div>
                </div>

                 <div class="form-group col-md-6">
                    <label for="image"  class="col-sm-12 col-form-label">Photo</label>
                    <div class="col-sm-12">
                        {{-- <img id="showimage" src="{{(empty($photo->image))?url('backend/photoimage/'.$photo->image):url('upload/usernoimage.jpg')}}" style="width: 40px;height: 45px;border:1px solid #000;"> --}}
                    <input type="file" name="image" id="image" class="form-control" placeholder="Enter Image " autocomplete="off" value="{{old('image')}}">
                      <font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font>
                  </div>
                </div>


       </div>

              <div class="modal-footer ">
                 <button type="button" class="btn btn-danger "  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success ">Add  Photo</button>

            </div>
            </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>
  <!-- /.content-wrapper -->
@foreach($alldata as $key => $photo)
  <div class="modal fade" id="editPhoto-{{ $photo->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #605ca8 ;">
            <div class="modal-header " style="background-color: #605ca8;color: white;padding: 10px">
              <h4 class="modal-title">Edit Photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('admin.photo.update',$photo->id)}}" id="myform2" enctype="multipart/form-data">
                @csrf
            <div class="row">


                  <div class="form-group col-md-6">
                    <label for="title"  class="col-sm-12 col-form-label">Photo Title</label>
                    <div class="col-sm-12">
                    <input type="text" name="title" id="photo_title" class="form-control " placeholder="Enter Photo Title"  autocomplete="off" value="{{$photo->title}}">
                    <font style="color:red">{{($errors)->has('title')?($errors->first('title')):''}}</font>
                  </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="caption_by"  class="col-sm-12 col-form-label">Caption By</label>
                    <div class="col-sm-12">
                    <input type="text" name="caption_by" id="caption_by" class="form-control " placeholder="Enter Caption By"  autocomplete="off" value="{{$photo->caption_by}}">
                    <font style="color:red">{{($errors)->has('caption_by')?($errors->first('caption_by')):''}}</font>
                  </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="caption_date"  class="col-sm-12 col-form-label">Caption Date</label>
                    <div class="col-sm-12">
                    <input type="date" name="caption_date" id="datepicker" class="form-control " placeholder="Enter caption_date"  autocomplete="off" value="{{$photo->caption_date}}">
                    <font style="color:red">{{($errors)->has('caption_date')?($errors->first('caption_date')):''}}</font>
                  </div>
                </div>

                 <div class="form-group col-md-6">
                    <label for="image"  class="col-sm-12 col-form-label">Photo</label>
                    <div class="col-sm-12">
                        <img id="showimage2" src="{{(!empty($photo->image))?url('upload/photoimage/'.$photo->image):url('upload/usernoimage.jpg')}}" style="width: 40px;height: 45px;border:1px solid #000;">
                    <input type="file" name="image" id="image" class="form-control" placeholder="Enter Image " autocomplete="off" value="{{old('image')}}">
                      <font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font>
                  </div>
                </div>



       </div>


              <div class="modal-footer ">
                 <button type="button" class="btn btn-danger "  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success ">Update Photo</button>

            </div>
            </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>

@endforeach

 <!-- /.content-wrapper -->
@foreach($alldata as $key => $photo)
  <div class="modal fade" id="showPhoto-{{ $photo->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #605ca8 ;">
            <div class="modal-header " style="background-color: #605ca8;color: white;padding: 10px">
              <h4 class="modal-title"> Photo Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">

           <table class="table table-bordered table-hover table-sm" >
            <tr>
              <th width="30%">Photo ID</th>
              <th width="70%">{{ $photo->id }}</th>
            </tr>
            <tr>
              <th width="30%"> Photo Title</th>
              <th width="70%">{{ $photo->title }}</th>
            </tr>
            <tr>
              <th width="30%">Caption By</th>
              <th width="70%">{{ $photo->caption_by }}</th>
            </tr>
            <tr>
              <th width="30%"> Caption Date</th>
              <th width="70%">{{ $photo->caption_date }}</th>
            </tr>

             <tr>
              <th width="30%"> Photo</th>
               <td><a target="_blank" href="{{ asset('upload/photoimage/'.$photo->image) }}"><img class="profile-user-img " src="{{(!empty($photo->image))?url('upload/photoimage/'.$photo->image):url('upload/usernoimage.png')}}" style="width:120px;height: 150;" alt="User profile picture"></a></td>
                      <td>
            </tr>
           </table>


              <div class="modal-footer ">
                 <button type="button" class="btn btn-danger "  data-dismiss="modal">Close</button>
            </div>

            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>

@endforeach

 <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
    <script>
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

  <script>
$(function () {

  $('#myform').validate({
    rules: {

      class_id: {
      required: true,

      },
      title: {
        required: true,

      },
      category_id: {
        required: true,

      },
      post_file: {
        required: true,

      },

      description: {
      required: true,

      },

      post_date: {
      required: true,

      },


      email: {
        required: true,
        email: true



      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"

      },

      name: {
        required: "Please enter Name",

      }



    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

 <script>
$(function () {

  $('#myform2').validate({
    rules: {

      role_id: {
      required: true,

      },
      name: {
        required: true,

      },
      mobile: {
        required: true,

      },
      gender: {
        required: true,

      },

      address: {
      required: true,

      },


      email: {
        required: true,
        email: true



      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"

      },

      name: {
        required: "Please enter Name",

      }



    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
    <script>
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection
