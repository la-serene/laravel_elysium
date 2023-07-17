@include('admin.layouts.header')

@include('admin.layouts.sidebar')


<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">
                    {{ $product->title }}
                </h3>                
                <div class="col-12">
                    <img src="{{ asset($product->image) }}" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active">
                        <img src="{{ asset($product->image) }}" alt="Product Image"> <!-- Display the main product image -->
                    </div>

                    @foreach ($product->productOptions as $product_option)
                        <div class="product-image-thumb">
                            <img src="{{ asset($product_option->image) }}" alt="Product Image"> <!-- Display the additional product images -->
                        </div>
                    @endforeach
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
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="color-filter">Color:</label>
                        <select class="form-control" id="color-filter">
                            <option value="">All Colors</option>
                            @php
                                $displayedColors = [];
                            @endphp

                            @foreach($product->productOptions as $productOption)
                                @if(!in_array($productOption->color->title, $displayedColors))
                                    <option value="{{ $productOption->color->title }}">{{ $productOption->color->title }}</option>
                                    @php
                                        $displayedColors[] = $productOption->color->title;
                                    @endphp
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="size-filter">Size:</label>
                        <select class="form-control" id="size-filter">
                            <option value="">All Sizes</option>
                            @php
                                $displayedSizes = [];
                            @endphp

                            @foreach($product->productOptions as $productOption)
                                @if(!in_array($productOption->size->title, $displayedSizes))
                                    <option value="{{ $productOption->size->title }}">{{ $productOption->size->title }}</option>
                                    @php
                                        $displayedSizes[] = $productOption->size->title;
                                    @endphp
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </div>
                    </div>

                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Stock</th>
                        <th>Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->productOptions as $productOption)
                        <tr>
                        <td>{{ $productOption->color->title }}</td>
                        <td>{{ $productOption->size->title }}</td>
                        <td>{{ $productOption->stock }}</td>
                        <td>{{ $productOption->sales }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        <td>Total </td>
                        <td></td>
                        <td id="total-stock">{{$product->stock}}</td>
                        <td id="total-sales">{{$product->sales}}</td>
                        </tr>
                    </tfoot>
                    </table>
                    <div class="mt-4">
                    <form action="{{ route('admin.products.edit', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                         @method('PUT')
                        <button type="submit" class="btn btn-primary btn-lg btn-flat">
                        <i class="fas fa-pencil-alt"></i>Edit
                        </button>
                    </form>  
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
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{$product->description}}</div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


@include('admin.layouts.footer')
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    });
  })
</script>
<script>
    // Function to filter rows based on color and size selection
    function filterRows() {
        var selectedColor = document.getElementById("color-filter").value;
        var selectedSize = document.getElementById("size-filter").value;
        var totalStock = 0;
        var totalSales = 0;

        var rows = document.querySelectorAll("tbody tr");
        rows.forEach(function(row) {
            var color = row.querySelector("td:nth-child(1)").textContent.trim();
            var size = row.querySelector("td:nth-child(2)").textContent.trim();
            var stock = parseInt(row.querySelector("td:nth-child(3)").textContent);
            var sales = parseInt(row.querySelector("td:nth-child(4)").textContent);

            if ((selectedColor === "" || color === selectedColor) && (selectedSize === "" || size === selectedSize)) {
                row.style.display = "";
                totalStock += stock;
                totalSales += sales;
            } else {
                row.style.display = "none";
            }
        });

        document.getElementById("total-stock").textContent = totalStock;
        document.getElementById("total-sales").textContent = totalSales;
    }

    // Event listeners for color and size filter changes
    document.getElementById("color-filter").addEventListener("change", filterRows);
    document.getElementById("size-filter").addEventListener("change", filterRows);
</script>
