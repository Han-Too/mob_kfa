<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categories::where('status', '!=', 'deleted')->get();
        return view('admin.categories.index', compact('data'));
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
            'category' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {
            return json_encode(['status' => false, 'message' => $validation->messages()]);
        }

        DB::beginTransaction();
        try {
            $data = Categories::create([
                'code' => $request->code,
                'category' => $request->category,
                'status' => 'active'
            ]);

            if ($data) {
                DB::commit();
                return  response()->json(['message'=> "Successfully added category!", 'status' => true], 201);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add category!", 'status' => false], 200);
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
        $data = Categories::where('id', $id)->first();
        return view('admin.categories.edit', compact('data'));
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
        $item = Categories::where('id', $request->id)->first();
        DB::beginTransaction();
        try {
            $item->code = $request->code;
            $item->category = $request->category;
            if ($item->save()) {
                DB::commit();
                return  response()->json(['message'=> "Successfully update category!", 'status' => true], 201);
            }
            DB::rollBack();
            return  response()->json(['message'=> "Failed add category!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add category!", 'status' => false], 200);
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
        $item = Categories::where('id', $id)->first();
        if ($item) {
            $item->status = 'deleted';
            $item->save();
            return redirect('categories')->with('success', 'Category deleted successfully');
        }
    }
}
