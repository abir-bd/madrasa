@extends('admin.layouts.index')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Admin Profile</li>
            </ol>
          </div><!-- /.col -->
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
          <div class="col-md-4">

            <!-- Profile Image -->
             <div class="pannel" style="background-color:white;border-bottom: 5px solid #605ca8 ;">
            <div class="panel-header " style="background-color: #605ca8;color: white;padding: 10px">My Profile</div>
              <div class="panel-body box-profile" style="margin: 20px">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{(!empty($user->image))?url('upload/adminimage/'.$user->image):url('upload/userimage.png')}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">{{ $user->desi}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name</b> <a class="float-right">{{ $user->name }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-right">{{ $user->mobile }}</a>
                  </li>

                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.panel-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="pannel" style="background-color:white;border-bottom: 5px solid #ffdd1f ;">
            <div class="panel-header " style="background-color: #ffdd1f;color: white;padding: 10px">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a style="font-weight: bolder;font-size: 18px;" class="nav-link active" href="#activity" data-toggle="tab">About Me</a></li>
                  <li class="nav-item"><a style="font-weight: bolder;font-size: 18px;" class="nav-link" href="#timeline" data-toggle="tab">Update Profile</a></li>
                  <li class="nav-item"><a style="font-weight: bolder;font-size: 18px;" class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="panel-body" style="margin:20px">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <!-- Post -->
                     <div class="panel-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                    {{ $user->education }}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{ $user->address }}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                    {{ $user->skills }}
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">{{ $user->notes }}</p>
              </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                     <form class="form-horizontal" method="POST" action="{{ route('admin.profiles.update') }} " enctype="multipart/form-data">
                      @csrf
                       <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-8">
                          <input type="email" name="email" class="form-control" id="inputEmail" value="{{ $user->email }}" placeholder="Email" readonly="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name"  class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="mobile" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-8">
                          <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control" id="mobile" placeholder="Mobile">
                        </div>
                      </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-8">
                           <input type="text" name="address" value="{{ $user->address }}" class="form-control" id="address" placeholder="Address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Education</label>
                        <div class="col-sm-8">
                           <input type="text" name="education" value="{{ $user->education }}" class="form-control" id="address" placeholder="Education">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Skills</label>
                        <div class="col-sm-8">
                           <input type="text" name="skills" value="{{ $user->skills }}" class="form-control" id="address" placeholder="Skills">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Notes</label>
                        <div class="col-sm-8">
                           <input type="text" name="notes" value="{{ $user->notes }}" class="form-control" id="address" placeholder="Notes">
                        </div>
                    </div>



                        <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-8">
                            <img id="showimage" src="{{(!empty($user->image))?url('upload/adminimage/'.$user->image):url('upload/userimage.png')}}"
                       alt="User Logo picture" style="width: 120px;height: 140px;border:1px solid #000;">

                    <input type="file" name="image" id="image" class="form-control" >
                        </div>
                        </div>




                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-9">
                          <button type="submit" class="btn btn-danger float-right">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                     <form method="post" action="{{route('admin.profiles.password.update')}}" id="myform">
                     @csrf



                      <div class="form-group row">
                        <label for="old_password" class="col-sm-4 col-form-label">Old Password</label>
                        <div class="col-sm-8">
                          <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Old Password">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="new_password" class="col-sm-4 col-form-label">New Password</label>
                        <div class="col-sm-8">
                          <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="confirm_password" class="col-sm-4 col-form-label">Confirmation Password</label>
                        <div class="col-sm-8">
                          <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                        </div>
                      </div>


                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger float-right">Change Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script>
$(function () {

  $('#myform').validate({
    rules: {




      old_password: {
        required: true,
        match: true

      },
      new_password: {
        required: true,
        minlength: 8
      },
      confirm_password: {
      required: true,
      equalTo:'#new_password'

      }
    },
    messages: {
     old_password: {
        required: "Please enter  Current Password",


      },


      new_password: {
        required: "Please enter password",
        minlength: "Your password must be at least 8 characters long"
      },

      confirm_password: {
        required: "Please enter Confirm password",
        equalTo:"Confirm password Does Not Match"
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
@endsection
