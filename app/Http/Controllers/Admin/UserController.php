<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Http\Response; // Import the Response class

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $page_title = 'All users';
        $tab_title = 'All users';
        return new Response(view('admin.users.index', ['users' => $users, 'page_title' => $page_title, 'tab_title' => $tab_title]));
    }

    public function show($id)
    {
        $user = User::find($id);
        $page_title = 'User ' . $user->id;
        $tab_title = 'User ' . $user->id;

        // Check if the user exists
        if (!$user) {
            // Handle the case when the user does not exist
            abort(404);
        }
         // Tính số đơn hàng của người dùng
        $orders = $user->orders();

        // Pass the user data and order count to the view
        return view('admin.users.show', ['user' => $user, 'orders' => $orders, 'page_title' => $page_title, 'tab_title' => $tab_title]);
    }

    public function create()
    {
        $cities = City::all();
        $districts = District::all();

        $page_title = 'Add new user';
        $tab_title = 'Add new user';

        return view('admin.users.create', [
            'cities' => $cities,
            'districts' => $districts,
            'page_title' => $page_title, 
            'tab_title' => $tab_title
        ]);
    }

    public function createPOST(Request $request)
    {
        // Lấy thông tin từ request
        $username = $request->input('username');
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $phoneNumber = $request->input('phone_number');
        $dateOfBirth = $request->input('date_of_birth');
        $email = $request->input('email');
        $password = $request->input('password');
        $address = $request->input('address');
        $cityId = $request->input('city_id');
        $districtId = $request->input('district_id');

        // Tạo người dùng mới
        $user = new User();
        $user->username = $username;
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->phone_number = $phoneNumber;
        $user->date_of_birth = $dateOfBirth;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->address = $address;
        $user->city_id = $cityId;
        $user->district_id = $districtId;
        $user->save();

        // Trả về thông tin người dùng đã tạo
        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function edit($id)
    {
        // Add your logic for editing a user by ID
    }

    public function update($id)
    {
        // Add your logic for updating a user by ID
    }
}
