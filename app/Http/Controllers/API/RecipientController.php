<?php

namespace App\Http\Controllers\API;

use App\Models\Recipient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipientRequest;
use Illuminate\Support\Facades\Auth;

class RecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipientRequest $request)
    {
        Recipient::create($request->except(['city', 'postcode']));
        return back()->with('msg', '收件者新增成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipient = Recipient::with('postcode')->findOrFail($id);
        return $recipient;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipientRequest $request, $id)
    {
        $recipient = Recipient::find($id);
        if(isset($request->default_r)&&$request->default_r==1){
            Recipient::where('user_id', Auth::user()->id)->update(['default_r'=>0]);
        }
        $recipient->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipient::destroy($id);
    }
}
