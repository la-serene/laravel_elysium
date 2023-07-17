@include('admin.layouts.header')

@include('admin.layouts.sidebar')     


    <div class="container mt-5">
        <h1>Create New User</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('admin.users.createPost') }}" method="POST" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

            <div class="form-group">
                <label for="city_id">City</label>
                <select class="form-control" id="city_id" name="city_id" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="district_id">District</label>
                <select class="form-control" id="district_id" name="district_id" required>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputMainImg">Avatar</label> 
                <input type="file" name="mainImg" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>



@include('admin.layouts.footer')

<script>
document.getElementById('city_id').addEventListener('change', function() {
    var cityId = this.value;

    // Clear current options of district_id
    var districtSelect = document.getElementById('district_id');
    districtSelect.innerHTML = '<option selected disabled>Select one</option>';

    // Filter and display only districts that belong to the selected city
    var filteredDistricts = <?php echo json_encode($districts); ?>;
    filteredDistricts = filteredDistricts.filter(function(district) {
        return district.city_id == cityId;
    });

    if (cityId) {
        filteredDistricts.forEach(function(district) {
            var option = document.createElement('option');
            option.value = district.id;
            option.text = district.name;
            districtSelect.appendChild(option);
        });
        // districtSelect.disabled = false; // Uncomment to enable district select
    } else {
        // districtSelect.disabled = true; // Uncomment to disable district select if no city is selected
    }
});
</script>