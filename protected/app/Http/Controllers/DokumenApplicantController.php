<?php

namespace App\Http\Controllers;

use App\Models\DokumenApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DokumenApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DokumenApplicant::where('status', '!=', 'deleted')->get();
        return view('admin.documents.index', compact('data'));
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
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {
            return json_encode(['status' => false, 'message' => $validation->messages()]);
        }

        DB::beginTransaction();
        try {
            $data = DokumenApplicant::create([
                'code' => $request->code,
                'title' => $request->title,
                'type' => $request->type,
                'is_mandatory' => isset($request->mandatory) ? true : false,
                'status' => 'active'
            ]);

            if ($data) {
                DB::commit();
                return  response()->json(['message'=> "Successfully added document!", 'status' => true], 201);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add document!", 'status' => false], 200);
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
        $data = DokumenApplicant::where('id', $id)->first();
        return view('admin.documents.edit', compact('data'));
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
        $item = DokumenApplicant::where('id', $request->id)->first();
        DB::beginTransaction();
        try {
            $item->code = $request->code;
            $item->title = $request->title;
            $item->type = $request->type;
            $item->is_mandatory = isset($request->mandatory) ? true : false;
            if ($item->save()) {
                DB::commit();
                return  response()->json(['message'=> "Successfully update document applicant!", 'status' => true], 201);
            }
            DB::rollBack();
            return  response()->json(['message'=> "Failed add document applicant!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message'=> "Failed add document applicant!", 'status' => false], 200);
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
        $item = DokumenApplicant::where('id', $id)->first();
        if ($item) {
            $item->status = 'deleted';
            $item->save();
            return redirect('documents')->with('success', 'Document Applicant deleted successfully');
        }
    }
}
