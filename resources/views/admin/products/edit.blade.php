@include('admin.layouts.header')

@include('admin.layouts.sidebar')

<form action="{{ route('admin.products.update', ['id' => $product->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputTitle">Product title</label>
                        <input type="text" id="inputTitle" name="productTitle" class="form-control" value="{{ $product->title }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Product description</label>
                        <textarea id="inputDescription" name="productDescription" class="form-control" rows="4">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputCategory">Category</label>
                        <select id="inputCategory" class="form-control custom-select" name="category_id">
                            <option selected disabled>Select one</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputColor">Subcategory 1</label>
                        <select id="inputColor" class="form-control custom-select" name="subcategory_id1">
                            <option selected disabled>Select one</option>
                            @foreach($subcategory1s as $subcategory1)
                                <option value="{{ $subcategory1->id }}" {{ $product->subcategory_id1 == $subcategory1->id ? 'selected' : '' }}>
                                    {{ $subcategory1->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputSubcategory2">Subcategory 2</label>
                        <select id="inputSubcategory2" class="form-control custom-select" name="subcategory_id2">
                            <option selected disabled>Select one</option>
                            @foreach($subcategory2s as $subcategory2)
                                <option value="{{ $subcategory2->id }}" {{ $product->subcategory_id2 == $subcategory2->id ? 'selected' : '' }}>
                                    {{ $subcategory2->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Images</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product->productOptions as $productOption)
                            <tr>
                                <td>
                                    @if($loop->first && $product->image)
                                        <img src="{{ asset($product->image) }}" alt="Product Image" style="max-height: 100px;">
                                    @elseif($productOption->image)
                                        <img src="{{ asset($productOption->image) }}" alt="Product Option Image" style="max-height: 100px;">
                                    @endif
                                </td>
                                <td>
                                    @if($loop->first && $product->image)
                                        Main Image
                                    @elseif($productOption->image)
                                        {{ $productOption->color->title }} - {{ $productOption->size->title }}
                                    @endif
                                </td>
                                <td>
                                    @if($loop->first && $product->image)
                                        <a href="#">Remove Main Image</a>
                                    @elseif($productOption->image)
                                        <a href="#">Remove Image</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>

        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Price</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputPrice">Price</label>
                        <input type="number" name="product_price" class="form-control" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDiscount">Discount</label>
                        <input type="number" name="product_discount" class="form-control" value="{{ $product->discount }}">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Stock</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Stock</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product->productOptions as $productOption)
                            <tr>
                                <td>{{ $productOption->color->title }}</td>
                                <td>{{ $productOption->size->title }}</td>
                                <td>
                                    <input type="number" name="stock[{{ $productOption->id }}]" class="form-control" value="{{ $productOption->stock }}">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>

    <div class="col-12">
        <a href="#" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Update Product" class="btn btn-success float-right">
    </div>
</form>

@include('admin.layouts.footer')
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        $('.select2').select2();
    });
</script>



<script>
    document.getElementById('inputCategory').addEventListener('change', function() {
        var categoryId = this.value;

        // Xóa tất cả các option hiện tại của subcategory1
        var subcategory1Select = document.getElementById('inputColor');
        subcategory1Select.innerHTML = '<option selected disabled>Select one</option>';

        // Lọc và hiển thị chỉ các subcategory1 có value tương ứng với category được chọn
        var filteredSubcategory1s = <?php echo json_encode($subcategory1s); ?>;
        filteredSubcategory1s = filteredSubcategory1s.filter(function(subcategory1) {
            return subcategory1.category_id == categoryId;
        });

        if (categoryId) {
            filteredSubcategory1s.forEach(function(subcategory1) {
                var option = document.createElement('option');
                option.value = subcategory1.id;
                option.text = subcategory1.title;
                subcategory1Select.appendChild(option);
            });
            subcategory1Select.disabled = false; // Bỏ chặn subcategory1 select
        } else {
            subcategory1Select.disabled = true; // Chặn subcategory1 select nếu chưa chọn category
        }
    });

    // Mặc định, chặn subcategory1 select khi chưa chọn category
    //document.getElementById('inputColor').disabled = true;

    // Mặc định, chặn subcategory2 select khi chưa chọn subcategory1
    //document.getElementById('inputSubcategory2').disabled = true;

    document.getElementById('inputColor').addEventListener('change', function() {
        var subcategory1Id = this.value;
        var categoryId = document.getElementById('inputCategory').value; // Lấy giá trị của category_id từ phần tử có id là 'inputCategory'

        // Xóa tất cả các option hiện tại của subcategory2
        var subcategory2Select = document.getElementById('inputSubcategory2');
        subcategory2Select.innerHTML = '<option selected disabled>Select one</option>';

        // Lọc và hiển thị chỉ các subcategory2 có value tương ứng với subcategory1 được chọn và category_id phù hợp
        var filteredSubcategory2s = <?php echo json_encode($subcategory2s); ?>;
        filteredSubcategory2s = filteredSubcategory2s.filter(function(subcategory2) {
            return subcategory2.subcategory_id1 == subcategory1Id && subcategory2.category_id == categoryId;
        });

        if (subcategory1Id) {
            filteredSubcategory2s.forEach(function(subcategory2) {
                var option = document.createElement('option');
                option.value = subcategory2.id;
                option.text = subcategory2.title;
                subcategory2Select.appendChild(option);
            });
            subcategory2Select.disabled = false; // Bỏ chặn subcategory2 select
        } else {
            subcategory2Select.disabled = true; // Chặn subcategory2 select nếu chưa chọn subcategory1
        }
    });
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

