<?php

namespace App\Http\Controllers;

use DummyFullModelClass;

use Illuminate\Support\Facades\Auth;
use App\Outbox;
use App\Inbox;
use Illuminate\Http\Request;

class OutboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\  $lain
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $outboxes = Outbox::all();
      return view('admin.outbox', compact('outboxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $inbox = Inbox::find($id);
        return view('admin.addOutbox', compact('inbox'));
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
        'description'=>'required',
      ]);

      $outbox = new Outbox([
          'description'=>$request->get('description'),
          'email'=>$request->get('email'),
          'user_id'=>Auth::id(),
          'post_id'=> $request->get('post_id'),
          'inbox_id' => $request->get('inbox_id')
      ]);

      $outbox->save();
      return redirect('/outbox');
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
