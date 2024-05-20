<?php

namespace App\Http\Controllers;

use App\Models\PaymentFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PaymentFeature::where('status', '!=', 'deleted')->get();
        return view('admin.payments.index', compact('data'));
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
            'payment' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {
            return json_encode(['status' => false, 'message' => $validation->messages()]);
        }

        DB::beginTransaction();
        try {
            $data = PaymentFeature::create([
                'code' => $request->code,
                'payment' => $request->payment,
                'status' => 'active'
            ]);

            if ($data) {
                DB::commit();
                return  response()->json(['message' => "Successfully added payment feature!", 'status' => true], 201);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message' => "Failed add payment feature!", 'status' => false], 200);
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
        $data = PaymentFeature::where('id', $id)->first();
        return view('admin.payments.edit', compact('data'));
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
        $item = PaymentFeature::where('id', $request->id)->first();
        DB::beginTransaction();
        try {
            $item->code = $request->code;
            $item->payment = $request->payment;
            if ($item->save()) {
                DB::commit();
                return  response()->json(['message' => "Successfully update payment features!", 'status' => true], 201);
            }
            DB::rollBack();
            return  response()->json(['message' => "Failed add payment features!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return  response()->json(['message' => "Failed add payment features!", 'status' => false], 200);
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
        $item = PaymentFeature::where('id', $id)->first();
        if ($item) {
            $item->status = 'deleted';
            $item->save();
            return redirect('payments')->with('success', 'Payment Feature deleted successfully');
        }
    }
}
