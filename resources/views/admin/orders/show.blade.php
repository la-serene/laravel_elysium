@include('admin.layouts.header')

@include('admin.layouts.sidebar')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Order General Details</h3>
                </div>
                <div class="card-body">
                    <h5>Order ID: {{ $order->id }}</h5>
                    <p ><a href="{{ route('admin.users.show', $order->user_id) }}">User ID: {{ $order->user_id }}</a></p>
                    <p>Total Price: ${{ $order->total_price }}</p>
                    <p>Address: {{ $order->address }}</p>
                    <p>City ID: {{ $order->city->name }}</p>
                    <p>District ID: {{ $order->district->name }}</p>
                    <p>Status: {{ $order->state }}</p>
                    <p>Created At: {{ $order->created_at->setTimeZone('Asia/Ho_Chi_Minh') }}</p>
                    <p>Updated At: {{ $order->updated_at->setTimeZone('Asia/Ho_Chi_Minh') }}</p>
                    <form action="{{ route('admin.orders.updateState', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="state">Change State:</label>
                            <select name="state" id="state" class="form-control">
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="shipping">Shipping</option>
                                <option value="success">Success</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Change State</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h4>Order Details</h4>
                </div>
                <div class="card-body">
                    @foreach($order->orderDetails as $orderDetail)
                    <div class="post">
                    <div class="mb-3">
                        <h6><a href="{{ route('admin.products.show', $orderDetail->product_id) }}">Product Name: {{ $orderDetail->product->title }}</a></h6>
                        <h6><a href="{{ route('admin.products.show', $orderDetail->product_id) }}">Product Price: {{ $orderDetail->product->price }}</a></h6>
                        <h6>Product Option: {{ $orderDetail->productOption->color->title }} - {{ $orderDetail->productOption->size->title }}</h6>
                        <p>Quantity: {{ $orderDetail->quantity }}</p>
                        <p>Total Price: ${{ $orderDetail->total_price }}</p>
                        <p>Comment: {{ $orderDetail->comment }}</p>
                        <p>Rating: {{ $orderDetail->rating }}</p>
                    </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layouts.footer')