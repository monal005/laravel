<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request as FacadesRequest;


class UserController extends Controller
{
    public function register(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        return redirect('login')->withError('Login detials not valid');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        echo "error";
    }

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        if (FacadesRequest::get('sort') == 'name_asc') {
            $data['users'] = User::orderBy('name', 'asc')->paginate(10);
            // echo"asec";
        } elseif (FacadesRequest::get('sort') == 'name_desc') {
            $data['users'] = User::orderBy('name', 'desc')->paginate(10);
            // echo"desc";
        } else {
            $data['users'] = User::paginate(10);
        }
        // dd($users);

        return view('home', $data);
    }

    //     public function showEmployee(Request $request)
    //    {
    //       $employees = User::all();
    //       if($request->keyword != ''){
    //       $employees = User::where('name','LIKE','%'.$request->keyword.'%')->get();
    //       }
    //       return response()->json([
    //          'employees' => $employees
    //       ]);
    //     }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = User::where('name', 'LIKE', $request->search . '%')->get();

            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= "<tr>" . "<td>" . $product->id . '</td>' .
                        '<td>' . $product->name . '</td>' .
                        '<td>' . $product->email . '</td>' .
                        '</tr>';
                }

                return Response($output);
            }
        }
    }
}
