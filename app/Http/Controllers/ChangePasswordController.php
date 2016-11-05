<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return view('changepassword');
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

    public function authchangepass()
    {
        if(Auth::attempt(['password' => $password])){

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Hash::check( $request->input('oldpassword') , Auth::user()->password )){
            if($request->input('newpassword') == $request->input('newpassword_confirmation')){
                \App\User::where('email',Auth::user()->email)
                        ->update (['password' => bcrypt($request->input('newpassword'))]);
                return view('home');
            }   
            else{
                // --------------- Error when New password not match
                Session::flash('checkerror', 'Check input is incorrect.');
                return redirect('changepassword');
            }
        }
        else{
            //------------------ Error when old password not match
            Session::flash('oldpasserror', 'Old password doesn\'t match.');
            return redirect('changepassword');
        }
        /*
        echo bcrypt($request->input('oldpassword'))." qwertyuiop  ".Auth::user()->password;
        if((bcrypt($request->input('oldpassword')) == Auth::user()->password) && ($request->input('newpassword') == $request->input('newpassword_confirmation'))){*/
            /*$validator = Validator::make($request->all(), [
                'newpassword' => 'required|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect('post/create')
                            ->withErrors($validator)
                            ->withInput();
            }*/
            /*else{*/

               /* \DB::table('users')->where('email',Auth::user()->email)
                        ->update (['password' => bcrypt($request->input('newpassword'))]);*/
            /*}*/
       /* }*/
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
