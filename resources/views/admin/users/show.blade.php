@include('admin.layouts.header')

@include('admin.layouts.sidebar')


<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($user->avatar)
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset($user->avatar) }}"
                       alt="User profile picture">
                  @else
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('img/default_avatar.png') }}"
                       alt="User profile picture">
                  @endif
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
                  <li class="nav-item"><a class="nav-link active" href="#orders" data-toggle="tab">Orders</a></li>
                  <li class="nav-item"><a class="nav-link" href="#comments" data-toggle="tab">Comments</a></li>
                  <li class="nav-item"><a class="nav-link" href="#infors" data-toggle="tab">Infor</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="orders">
                    @foreach($user->orders as $order)
                    <div class="post">
                      <p>
                        <span class="description"><a href="{{ route('admin.orders.show', $order->id) }}">Order ID :{{$order->id}}      </a></span>
                        <br>
                        <span class="description"><a href="{{ route('admin.orders.show', $order->id) }}">Total :${{$order->total_price}}</a></span>
                        <br>
                        <span class="description"><a href="{{ route('admin.orders.show', $order->id) }}">Create at :{{$order->created_at}}</a></span>
                        <br>
                        <span class="description"><a href="{{ route('admin.orders.show', $order->id) }}">Status :{{$order->state}}</a></span>
                      </p>                    
                    </div>
                    @endforeach
                    <!-- /.post -->            
                  </div>
                  <div class="tab-pane" id="comments">
                  @foreach($user->orders as $order)
                     @foreach($order->orderDetails as $orderDetail)                   
                      @if($orderDetail->comment)
                      <div class="post">
                      <p>
                        <span class="description"><a href="{{ route('admin.orders.show', $order->id) }}">Order ID:{{$orderDetail->order->id}}</a></span>
                      </p>
                      <p>
                        <span class="description"><a href="{{ route('admin.products.show', $orderDetail->product_id) }}">Product ID: {{$orderDetail->product_id}}</a></span>
                      </p>                      
                      <p>
                        <span class="description">{{$orderDetail->comment}}</span>
                      </p>
                      <p>
                        <span class="description">{{$orderDetail->created_at}}</span>
                        <br>
                        <span class="description"></span>
                      </p>
                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                      </div>
                      @endif
                    <!-- /.post -->    
                    @endforeach       
                  @endforeach                     
                  </div>                
                  
                  <div class="tab-pane" id="infors">
                  <div class="container">
        <h1>User Information</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td>{{ $user->first_name }}</td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>{{ $user->last_name }}</td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>{{ $user->phone_number }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>{{ $user->date_of_birth }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Email Verified At</td>
                    <td>{{ $user->email_verified_at }}</td>
                </tr>
                <tr>
                    <td>Avatar</td>
                    <td>{{ $user->avatar }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{ $user->city->name }}</td>
                </tr>
                <tr>
                    <td>District</td>
                    <td>{{ $user->district->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
                    





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

