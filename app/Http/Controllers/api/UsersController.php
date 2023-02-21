<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\users;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = users::all();
        return request()->json(200, $users);
    }
    public function show($id){
        $user = users::find($id);

        return request()->json(200, $user);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);
        users::create($request->all());
        return request()->json(200, ['data'=>"User Stored Seucceffuly"]);
    }
    public function login(Request $request){
    $request->password = bcrypt($request->password);
      $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|exists:users,password',
      ],
        [
            'email.exists' => 'Email does not exist',
            'password.exists' => 'Wrong password'
        ]
    );

        $user = users::where('email', $request->email)->first();
        $email = users::where('email',$request->email)->get("email");
        $password = users::where('password', $request->password)->get("password");
        // return request()->json(200,["data"=>$email]);
        if ($email){
            if($password){
                 $token = $user->createToken("token")->plainTextToken;

                return request()->json(200,['token' => $token]);
            }
            else{
                return request()->json(200,["data"=>"Wrong Password"]);
            }
        }
        else{
            return request()->json(200,["data"=>"Email does not exist"]);
        }
    }
    public function getDifference(Request $request) {
        $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->created_at);
        $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->updated_at);
        // $diff_in_years = $to->diffInYears($from);
        // $diff_in_months = $to->diffInMonths($from);
        // $diff_in_weeks = $to->diffInWeeks($from);
        $diff_in_days = $to->diffInDays($from);
        $diff_in_hours = $to->diffInHours($from->subDays($diff_in_days));
        $diff_in_minutes = $to->diffInMinutes($from->subHours($diff_in_hours));
        // $diff_in_seconds = $to->diffInSeconds($from->subMinutes($diff_in_minutes));
        $total_time = CarbonInterval::hours($diff_in_hours)->minutes($diff_in_minutes)->forHumans();
        return request()->json(200,["lenth"=>$total_time]);
    }
}
