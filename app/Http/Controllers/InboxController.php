<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;
use App\Inbox;

class InboxController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $inboxes = Inbox::all();
      return view('admin.inbox', compact('inboxes'));
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
      $request->validate([
        'name'=>'required',
        'email' =>'required',
        'call_numb' => 'required'
      ]);
        $inbox = new Inbox([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'call_numb' => $request->get('call_numb'),
        'post_id' => $request->get('post_id')]);
      
      $inbox->save();
      
      Mail::to($request->get('email'))->send(new VerificationMail()); 
      
      return redirect('/')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
