<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Reason::where('status', '!=', 'deleted')->get();
        return view('admin.reasons.index', compact('data'));
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
            'type' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {
            return json_encode(['status' => false, 'message' => $validation->messages()]);
        }

        DB::beginTransaction();
        try {
            $data = Reason::create([
                'title' => $request->title,
                'type' => $request->type,
                'status' => 'active'
            ]);

            if ($data) {
                DB::commit();
                return  response()->json(['message'=> "Successfully added reason!", 'status' => true], 201);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add reason!", 'status' => false], 200);
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
        $data = Reason::where('id', $id)->first();
        return view('admin.reasons.edit', compact('data'));
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
        $item = Reason::where('id', $request->id)->first();
        DB::beginTransaction();
        try {
            $item->title = $request->title;
            $item->type = $request->type;
            if ($item->save()) {
                DB::commit();
                return  response()->json(['message'=> "Successfully update reason!", 'status' => true], 201);
            }
            DB::rollBack();
            return  response()->json(['message'=> "Failed add reason!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add reason!", 'status' => false], 200);
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
        $item = Reason::where('id', $id)->first();
        if ($item) {
            $item->status = 'deleted';
            $item->save();
            return redirect('reasons')->with('success', 'Reason deleted successfully');
        }
    }
}
