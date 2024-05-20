<?php

namespace App\Http\Controllers;

use App\Helpers\Utils;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::where('status', '!=', 'deleted')->get();
        return view('admin.banners.index', compact('data'));
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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        if ($validation->fails()) {
            return json_encode(['status' => false, 'message' => $validation->messages()]);
        }
        
        if ($request->has('image')) {
            $img = Utils::uploadImageOri($request->image);
        } else {
            $img = null;
        }

        DB::beginTransaction();
        try {
            $data = Banner::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $img,
                'status' => 'active'
            ]);

            if ($data) {
                DB::commit();
                return  response()->json(['message'=> "Successfully added banner!", 'status' => true], 201);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add banner!", 'status' => false], 200);
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
        $data = Banner::where('id', $id)->first();
        return view('admin.banners.edit', compact('data'));
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
        $item = Banner::where('id', $request->id)->first();
        DB::beginTransaction();
        try {
            if ($request->has('image')) {
                $img = Utils::uploadImageOri($request->image);
            } else {
                $img = $item->image;
            }
            $item->title = $request->title;
            $item->description = $request->description;
            $item->image = $img;
            if ($item->save()) {
                DB::commit();
                return  response()->json(['message'=> "Successfully update banner!", 'status' => true], 201);
            }
            DB::rollBack();
            return  response()->json(['message'=> "Failed add banner!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add banner!", 'status' => false], 200);
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
        $item = Banner::where('id', $id)->first();
        if ($item) {
            $item->status = 'deleted';
            $item->save();
            return redirect('banners')->with('success', 'Banner deleted successfully');
        }
    }
}
