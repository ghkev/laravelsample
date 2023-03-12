<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use Hash;

class UserDataController extends Controller
{
    //TO DISPLAY THE VIEW OF indexlogin.blade.php
    public function index()
    {
        return view('Users.indexlogin');
    }

    //TO DISPLAY THE VIEW OF createPage.blade.php
    public function registerPage()
    {
        return view('Users.createPage');
    }

    //TO DISPLAY THE VIEW OF dashboard.blade.php
    public function dashboard()
    {
        return view('Users.dashboard');
    }

    //TO DISPLAY THE VIEW OF updatePage.blade.php
    public function updatePage(){
        return view('Users.updatePage');
    }

    //TO DISPLAY THE VIEW OF userPage.blade.php with the data of the database from userdata table.
    public function userPage()
    {
        $tabledata = UserData::all();
        return view('Users.userPage', ['tbldata'=>$tabledata]);
    }

    //TO CREATE A USER AND INSERT THE DATA TO THE DATABASE.
    public function createUser(Request $request)
    {
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|email|unique:userdata',
            'username'=>'required',
            'password'=>'required|confirmed',

        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));

        $createdUser = UserData::insert([
            'name'=>$name,
            'email'=>$email,    
            'username'=>$username,
            'password'=>$password
        ]);

        if ($createdUser){

            return back()->with('success', 'Account created successfully!');

        }else {

            return back()-with('fail','Something went wrong!');
        }

    }

    //TO GET THE id FROM DATABASE AND DISPLAY THE DATA IN updatePage.blade.php 
    public function getUserId($id)
    {
        $createdUser = UserData::where('id', $id)->get();
        return view('Users.updatePage', ['cu'=>$createdUser]);
    }

    //TO UPDATE THE DATA FROM THE DATABASE.
    public function updateUser(Request $request)
    {
        
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|email|unique:userdata',
            'username'=>'required',
            'password'=>'required|confirmed'
        ]);

        $id = $request->id;
        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));

        $userUpdate = UserData::where('id', $id)->update([
            'name'=>$name,
            'email'=>$email,
            'username'=>$username,
            'password'=>$password
        ]);

        if ($userUpdate){

            return back()->with('success','Account updated successfully!');

        }else {
            
            return back()->with('fail','Something went wrong!');
        }
        
    }

    //TO DELETE THE DATA FROM DATABASE USING THE id.
    public function deleteUser($id)
    {
        $userDelete = UserData::where('id', $id)->delete();

        if ($userDelete){

            return back()->with('success','Deleted sucessfully!');

        }else {
            
            return back()->with('fail','Something went wrong!');
        }
        
    }

    //TO LOGIN THE DATA USING username & password.
    //MATCH FIRST THE username AND THEN MATCH THE password FIELD FROM ENCRYPTED password IN DATABASE.
    public function loginUser(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $logUser =  $request->input('username');
        $logPass = $request->input('password');
        $userData = UserData::where('username', $logUser)->first();
        
        if ($userData){
            
            if (Hash::check($logPass, $userData->password)){

                return view('Users.dashboard');

            }else {

                return back()->with('fail', 'Invalid username or password!');
            }

        }else { 

            return back()->with('fail', 'Invalid username or password!');
            
        }
        
    }

    //LOGOUT THE USER USING return redirect() FUNCTION.
    public function logoutUser()
    {
        return redirect('index');
    }

}
