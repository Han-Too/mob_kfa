<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bank::where('status', '!=', 'deleted')->get();
        return view('admin.banks.index', compact('data'));
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
            'code' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {
            return json_encode(['status' => false, 'message' => $validation->messages()]);
        }

        DB::beginTransaction();
        try {
            $data = Bank::create([
                'code' => $request->code,
                'name' => $request->name,
                'status' => 'active'
            ]);

            if ($data) {
                DB::commit();
                return  response()->json(['message'=> "Successfully added bank!", 'status' => true], 201);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add bank!", 'status' => false], 200);
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
        $data = Bank::where('id', $id)->first();
        return view('admin.banks.edit', compact('data'));
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
        $item = Bank::where('id', $request->id)->first();
        DB::beginTransaction();
        try {
            $item->code = $request->code;
            $item->name = $request->name;
            if ($item->save()) {
                DB::commit();
                return  response()->json(['message'=> "Successfully update bank!", 'status' => true], 201);
            }
            DB::rollBack();
            return  response()->json(['message'=> "Failed add bank!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add bank!", 'status' => false], 200);
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
        $item = Bank::where('id', $id)->first();
        if ($item) {
            $item->status = 'deleted';
            $item->save();
            return redirect('banks')->with('success', 'Bank deleted successfully');
        }
    }
}
