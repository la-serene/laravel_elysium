@include('admin.layouts.header')

@include('admin.layouts.sidebar')


       


<form action="{{ route('admin.products.createPost') }}" method="POST">
          @csrf
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
                  <label for="inputName">Product title</label>
                  <input type="text" id="inputTitle" name="productTitle" class="form-control">
                  </div>
                  <div class="form-group">
                  <label for="inputDescription">Product description</label>
                  <textarea id="inputDescription" name="productDescription" class="form-control" rows="4"></textarea>
                  </div>

                  <div class="form-group">
                  <label for="inputCategory">Category</label>
                  <select id="inputCategory" class="form-control custom-select" name="category_id">
                      <option selected disabled>Select one</option>
                      @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->title }}</option>
                      @endforeach
                  </select>
                  </div>

                  <div class="form-group">
                  <label for="inputColor">Subcategory 1</label>
                  <select id="inputColor" class="form-control custom-select" name="subcategory_id1">
                      <option selected disabled>Select one</option>
                      @foreach($subcategory1s as $subcategory1)
                          <option value="{{ $subcategory1->id }}">{{ $subcategory1->title }}</option>
                      @endforeach
                  </select>
                  </div>

                  <div class="form-group">
                  <label for="inputSubcategory2">Subcategory 2</label>
                  <select id="inputSubcategory2" class="form-control custom-select" name="subcategory_id2">
                      <option selected disabled>Select one</option>
                      @foreach($subcategory2s as $subcategory2)
                          <option value="{{ $subcategory2->id }}">{{ $subcategory2->title }}</option>
                      @endforeach
                  </select>
                  </div>
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
                  <input type="number" name="product_price" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputDiscount">Discount</label>
                  <input type="number" name="product_discount" class="form-control">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Option</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="colorMultiSelect">Select color</label>
                  <select class="select2" multiple="multiple" name="product_colors[]" data-placeholder="Any" style="width: 100%;">
                    @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->title }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="colorMultiSize">Size</label>
                  <select class="select2" multiple="multiple" name="product_sizes[]" data-placeholder="Any" style="width: 100%;">
                    @foreach($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->title }}-{{ $size->product_type }}</option>
                    @endforeach
                    </select>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>        
        </div>

        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Product" class="btn btn-success float-right">
        </div>
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
  document.addEventListener("DOMContentLoaded", function() {
    var inputCategory = document.getElementById("inputCategory");

    inputCategory.addEventListener("change", function() {
      var selectedCategory = inputCategory.options[inputCategory.selectedIndex].text;
      console.log("Selected category:", selectedCategory);
    });
  });
</script>


