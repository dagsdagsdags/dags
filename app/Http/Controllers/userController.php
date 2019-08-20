<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\accountValidator;
use App\Account;

class userController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      protected $account;

    public function __construct()
    {
        $this->account = new Account();
    }
    public function index(request $request)
    {
        //$udatas = Account::latest()->paginate(5);
        $s = $request->input('s');

        $udatas = Account::GetUser($s)->paginate(5);
        //  $udatas = Account::latest()
        //  ->search($s)
        //  ->paginate(5);
        return view('userData.index', compact('udatas' , 's'))
        ->with('i' ,(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userData.create');
    }

    // public function search(accountValidator $request)
    // {
    //   $s = $request->input('s');
    //   $acc = Account::latest()
    //     ->search($s)
    //     ->paginate(5);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(accountValidator $request)
    {
        //$account->newUser($request->all());
        $msg = $this->account->UpdtOrCrte($request->all());
        return redirect()->route('Data.index')
        ->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data = $this->account->showData($id);
         return view('userData.detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Account::find($id);
        return view('userData.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(accountValidator $request, $id)
    {
      $msg = $this->account->updateUser($request->all(),$id);
      return redirect()->route('Data.index')
      ->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $msg = $this->account->deleteUser($id);
        return redirect()->route('Data.index')
        ->with('success', $msg);
    }
}
