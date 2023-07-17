<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Http\Response; // Import the Response class

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return Response
     */
    public function index(): Response
    {
        $users = User::all();
        $page_title = 'All users';
        $tab_title = 'All users';
        return new Response(view('admin.users.index', ['users' => $users, 'page_title' => $page_title, 'tab_title' => $tab_title]));
    }

    public function show($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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

    public function createPOST(Request $request): RedirectResponse
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


        $mainImage = $request->file('mainImg');
        $mainImagePath = null;
        if ($mainImage) {
            $fomartedMainImageName = request('username');
            $fomartedMainImageName = strtolower($fomartedMainImageName); // Chuyển đổi thành chữ thường
            $fomartedMainImageName = preg_replace('/[^a-z0-9]+/', '-', $fomartedMainImageName); // Loại bỏ các ký tự không phải chữ cái và số, thay thế bằng dấu gạch ngang
            $fomartedMainImageName = trim($fomartedMainImageName, '-'); // Loại bỏ dấu gạch ngang từ đầu và cuối chuỗi

            $mainImageName = $fomartedMainImageName . '_'.'avatar'.'.' . $mainImage->getClientOriginalExtension();
            $mainImage->move(public_path('img'), $mainImageName);
            $mainImagePath = 'img/' . $mainImageName;
        }

        // Tạo người dùng mới
        $user = User::create([
            'username' => $username,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $phoneNumber,
            'date_of_birth' => $dateOfBirth,
            'email' => $email,
            'password' => bcrypt($password),
            'address' => $address,
            'city_id' => $cityId,
            'district_id' => $districtId,
            'avatar' => $mainImagePath,
        ]);


        // Trả về thông tin người dùng đã tạo
        return redirect()->back();
    }

    public function delete($id): RedirectResponse
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
