<?php

namespace App\Http\Controllers;

use App\Models\MasterPrivilege;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasterPrivilege::where('status', '!=', 'deleted')->get();
        return view('admin.privileges.index', compact('data'));
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
            'title' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {
            return json_encode(['status' => false, 'message' => $validation->messages()]);
        }

        DB::beginTransaction();
        try {
            $privilege = MasterPrivilege::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => 'active'
            ]);

            if ($privilege) {
                DB::commit();
                return  response()->json(['message'=> "Successfully added privilege!", 'status' => true], 201);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add privilege!", 'status' => false], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MasterPrivilege::where('id', $id)->first();
        return view('admin.privileges.edit', compact('data'));
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
        $item = MasterPrivilege::where('id', $request->id)->first();
        DB::beginTransaction();
        try {
            $item->title = $request->title;
            $item->description = $request->description;
            if ($item->save()) {
                DB::commit();
                return  response()->json(['message'=> "Successfully update privilege!", 'status' => true], 201);
            }
            DB::rollBack();
            return  response()->json(['message'=> "Failed add privilege!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add privilege!", 'status' => false], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $privilege = MasterPrivilege::where('id', $id)->first();
        if ($privilege) {
            $privilege->status = 'deleted';
            $privilege->save();
            return redirect('privileges')->with('success', 'Privilege deleted successfully');
        }
    }
}
