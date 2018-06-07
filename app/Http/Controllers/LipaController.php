<?php

namespace App\Http\Controllers;

use App\Lipa;
use Illuminate\Http\Request;
use STK;

class LipaController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
        'amount' => $request['amount'],
        'phone' => "254".substr($request['phone'], -9), 
        'ip' => $request->ip(),
        'bowserAgent' => $request->server('HTTP_USER_AGENT')
       ];

       $save_id = Lipa::create($data)->id;

       if ($save_id) {

            // fluent implementation
            $response = \STK::request($data['amount'])
                ->from($data['phone'])
                ->usingReference('f4u239fweu', 'Test Payment')
                ->push();

            $notification = array('message' => 'Request Successfully Accepted', 'alert-type' => 'success');
       } else {
            $notification = array('message' => 'Request Rejected', 'alert-type' => 'warning');
       }

       return  back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lipa  $lipa
     * @return \Illuminate\Http\Response
     */
    public function show(Lipa $lipa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lipa  $lipa
     * @return \Illuminate\Http\Response
     */
    public function edit(Lipa $lipa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lipa  $lipa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lipa $lipa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lipa  $lipa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lipa $lipa)
    {
        //
    }
}
