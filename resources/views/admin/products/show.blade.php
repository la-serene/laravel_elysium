@include('admin.layouts.header')

@include('admin.layouts.sidebar')


<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $product->title }}</h3>
                <div class="col-12">
                    <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $product->title }}</h3>
                <hr>
                <h4>Available Colors</h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @php
                    $colors = []; // Mảng lưu trữ các màu đã xuất hiện
                    @endphp
                    @foreach($product->productOptions as $productOption)
                    @if (!in_array($productOption->color->title, $colors))
                    @php
                    $colors[] = $productOption->color->title; // Thêm màu vào mảng
                    @endphp
                    <label class="btn btn-default text-center active" style="display: block;">
                        <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                        {{ $productOption->color->title }}
                        <br>                
                        <i class="fas fa-circle fa-2x text-{{ $productOption->color->title }}"></i>
                    </label>
                    @endif
                    @endforeach
                </div>
                <h4 class="mt-3">Size</h4>
                <div class="btn-group btn-group-toggle d-flex flex-wrap" data-toggle="buttons">
                <div style="display: flex; flex-wrap: wrap;">
                    @foreach($product->productOptions as $productOption)
                        <label class="btn btn-default text-center" style="display: block; flex: 0 0 25%; box-sizing: border-box; padding: 5px;">
                            <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                            <span class="text-xl">{{ $productOption->size->title }}</span>
                        </label>
                    @endforeach
                </div>
                </div>      
                @if($product->discount !== null)
                <div>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Before :${{ $product->price }}                             
                        </h2>
                        <h2 class="mb-0">
                            Then :${{ number_format($product->getDiscountedPrice(), 2) }}                           
                        </h2>
                        <h4 class="mt-0">
                        <small>
                            Discount: {{ $product->discount }}%
                        </small>                      
                        </h4>                        
                    </div>
                </div>
                @else
                <div>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Price :${{ $product->price }}                             
                        </h2>                     
                    </div>
                </div>
                @endif
                
            </div>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{ $product->description }}</div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                @if ($order_details)
                @foreach($order_details as $order_detail)
                <div class="post">                    
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                        <a href="{{ route('admin.users.show', $order_detail->order->user->id) }}">
                            {{ $order_detail->order->user->first_name }} {{ $order_detail->order->user->last_name }}
                        </a>
                        </span>
                        <span class="description">{{ $order_detail->order->user->created_at }}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{$order_detail->comment}}
                      </p>
                      <p>
                        <a  class="link-black text-sm">{{$order_detail->rating}}    <i class="fas fa-star"></i> </a>
                      </p>
                    </div>
                </div>
                @endforeach
                @endif
                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">{{ number_format($averageRating, 0) }}  <i class="fas fa-star"></i></div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


@include('admin.layouts.footer')
