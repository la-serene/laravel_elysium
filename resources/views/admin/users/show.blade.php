@include('admin.layouts.header')

@include('admin.layouts.sidebar')


<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->first_name}} {{$user->last_name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Total orders:</b> <a class="float-right">{{$orders->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Total spend:</b> <a class="float-right">{{$orders->sum('total_price')}}</a>
                  </li>
                </ul>
                <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger btn-block" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')){document.getElementById('delete-form-{{ $user->id }}').submit();}">
                    <b>Delete</b>
                </a>
                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments 
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->            
                  </div>
                  <div class="tab-pane" id="settings">
                  <form class="form-horizontal" method="POST" action="/update-profile">
                  <form class="form-horizontal" method="POST" action="/update-profile">
                    @csrf <!-- Include this line if using Laravel's CSRF protection -->
                    
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="username" placeholder="Username" value="{{ $user->username }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ $user->email }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Last Name" value="{{ $user->last_name }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputPhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPhoneNumber" name="phone_number" placeholder="Phone Number" value="{{ $user->phone_number }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address" value="{{ $user->address }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputDateOfBirth" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputDateOfBirth" name="date_of_birth" value="{{ $user->date_of_birth }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-warning">Update Profile</button>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->


      @include('admin.layouts.footer')