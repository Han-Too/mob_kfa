<?php

namespace App\Http\Controllers;

use App\Helpers\Utils;
use App\Models\MasterPrivilege;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('status', '!=', 'deleted')->get();
        $roles = MasterPrivilege::where('status', '!=', 'deleted')->where('id', '!=', 6)->get();
        return view('admin.users.index', compact('data', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);

        if ($validation->fails()) {
            return json_encode(['status' => false, 'message' => $validation->messages()]);
        }

        $check = User::where('username', $request->username)->first();
        if ($check) {
            return  response()->json(['message'=> "Username is used!", 'status' => false], 200);
        }

        if ($request->has('image')) {
            $img = Utils::uploadImageOri($request->image);
        } else {
            $img = null;
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'token' => Str::uuid()->toString(),
                'name' => $request->name,
                'username' => $request->username,
                'role_id' => $request->user_role,
                'email' => $request->email,
                'image' => $img,
                'password' => Hash::make($request->password),
            ]);

            if ($user) {
                DB::commit();
                return  response()->json(['message'=> "Successfully added user!", 'status' => true], 201);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add user!", 'status' => false], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($token)
    {
        $data = User::where('token', $token)->first();
        $roles = MasterPrivilege::where('status', '!=', 'deleted')->where('id', '!=', 6)->get();
        return view('admin.users.edit', compact('data', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where('token', $request->token)->first();
        DB::beginTransaction();
        try {
            if ($request->has('avatar')) {
                $img = Utils::uploadImageOri($request->avatar);
            } else {
                $img = $user->image;
            }
            //  dd($img);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = !$request->password ? $user->password : Hash::make($request->password);
            $user->role_id = $request->user_role;
            $user->image = $img;
            if ($user->save()) {
                DB::commit();
                return  response()->json(['message'=> "Successfully update user!", 'status' => true], 201);
            }
            DB::rollBack();
            return  response()->json(['message'=> "Failed add user!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add user!", 'status' => false], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($token)
    {
        $user = User::where('token', $token)->first();
        if ($user) {
            $user->status = 'deleted';
            $user->username = Str::uuid()->toString();
            $user->save();
            return redirect('users')->with('success', 'User deleted successfully');
        }
    }

    public function profile()
    {
        $user = Auth::user();
        $data = User::where('token', $user->token)->first();
        return view('admin.users.profile', compact('data'));
    }
}
