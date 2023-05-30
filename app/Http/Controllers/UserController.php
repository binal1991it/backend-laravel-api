<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;


class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function update($email, Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|between:2,20',
            'last_name' => 'required|string|between:2,20',
            'phone' => 'required|string|between:5,12',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::where('email', $email)->update(array_merge(
                    $validator->validated(),
                ));
        if($request->password){
             //$user->password = bcrypt($request->password);
            // $user->save();
            User::where('email', $email)->update(array_merge(
                    ['password' => bcrypt($request->password)]
                ));
        }
        return response()->json([
            'message' => 'User successfully updated',
            'status' => 1,
            'user' => User::where('email', $email)->first(),
        ], 201);
    }

    

}
