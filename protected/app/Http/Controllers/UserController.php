<?php

namespace App\Http\Controllers;

use App\Helpers\Utils;
use App\Models\MasterPrivilege;
use App\Models\User;
use App\Models\user_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use function PHPUnit\Framework\at;

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
        $total = count($data);
        $roles = MasterPrivilege::where('status', '!=', 'deleted')->where('id', '!=', 6)->get();
        return view('admin.users.index', compact('data', 'roles','total'));
    }
    public function deleted()
    {
        $data = User::where('status','deleted')->get();
        $roles = MasterPrivilege::where('status', '!=', 'deleted')->where('id', '!=', 6)->get();
        return view('admin.users.deleted', compact('data', 'roles'));
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
            // return json_encode(['status' => false, 'message' => $validation->messages()]);
            return json_encode(['status' => false, 'message' => "error controller"]);
        }


        $check = User::where('username', $request->username)->first();
        if ($check) {
            return response()->json(['message' => "Username is used!", 'status' => false], 200);
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
            $get = User::where('username',$request->username)->first();
            Utils::addLog($get->token,$get->username,"Create User", "Create a user with name = " . $request->name . " and username = " . $request->username);

            if ($user) {
                DB::commit();
                return response()->json(['message' => "Successfully added user!", 'status' => true], 201);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => "Failed add user!", 'status' => false], 200);
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
        if($request->alasan == NULL){
            return response()->json(['message' => "Reason is mandatory!", 'status' => false], 200);
        }
        DB::beginTransaction();
        try {
            $description = [];
            if ($request->has('avatar')) {
                $img = Utils::uploadImageOri($request->avatar);
            } else {
                $img = $user->image;
            }
            //  dd($img);
            if ($user->name != $request->name) {
                array_push($description, "~ Edit User " . $user->token . " Name from = " . $user->name . " into = " . $request->name);
                $user->name = $request->name;
            } else {
                $user->name;
            }
            if ($user->username != $request->username) {
                array_push($description, "~ Edit User " . $user->token . " Username from = " . $user->username . " into = " . $request->username);
                $user->username = $request->username;
            } else {
                $user->name;
            }
            if ($user->email != $request->email) {
                array_push($description, "~ Edit User " . $user->token . " Email from = " . $user->email . " into = " . $request->email);
                $user->email = $request->email;
            } else {
                $user->email;
            }
            if ($user->role_id != $request->user_role) {
                array_push($description, "~ Edit User " . $user->token . " Role from = " . $user->role_id . " into = " . $request->user_role);
                $user->role_id = $request->user_role;
            } else {
                $user->role_id;
            }
            if ($user->image != $img) {
                array_push($description, "~ Edit User " . $user->token . " Image");
                $user->image = $img;
            } else {
                $user->image;
            }
            if ($request->password != NULL) {
                array_push($description, "~ Edit User " . $user->token . " Password");
            }
            $user->password = !$request->password ? $user->password : Hash::make($request->password);
            // info(implode(" ",$description));
            if ($user->save()) {
                Utils::addLog($request->token,$user->username,"Update User", $request->alasan);
                // foreach ($description as $val) {
                // }
                DB::commit();
                return response()->json(['message' => "Successfully update user!", 'status' => true], 201);
            }
            DB::rollBack();
            return response()->json(['message' => "Failed add user!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => "Failed add user!", 'status' => false], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$token)
    {
        $user = User::where('token', $token)->first();
        if ($user) {
            $user->status = 'deleted';
            $user->password = Hash::make("CASHLEZ2024");
            // $user->username = Str::uuid()->toString();
            Utils::addLog($token,$user->username,"Delete User", $request->alasan);
            $user->save();
            return redirect('users')->with('msg', 'User deleted successfully');
            // return response()->json(['message' => "Success Delete User!", 'status' => true], 200);
        }
    }

    public function activate(Request $request,$token)
    {
        $user = User::where('token', $token)->first();
        if ($user) {
            $user->status = 'active';
            $user->password = Hash::make($request->password);
            // $user->username = Str::uuid()->toString();
            Utils::addLog($token,$user->username,"Reactivation User", $request->alasan);
            $user->save();
            return redirect('users')->with('msg', 'Reactivation User successfully');
            // return response()->json(['message' => "Success Delete User!", 'status' => true], 200);
        }
    }

    public function profile()
    {
        $user = Auth::user();
        $data = User::where('token', $user->token)->first();
        return view('admin.users.profile', compact('data'));
    }

    public function logs(){
        $data = user_log::orderBy('created_at','desc')->get();
        return view('admin.users.logs', compact('data'));
    }
}
