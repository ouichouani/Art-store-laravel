<?php

namespace App\Http\Controllers;

use App\Mail\WelcomMail;
use App\Mail\DeleteAccountMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User ;
use Illuminate\Support\Facades\Mail;

class usersController extends Controller
{

    public function index(Request $request) // i will use this to display all users to admin
    {
        $user = Auth::user();
        if(Auth::check()){
            if($user->is_admin){
                $users = User::all() ;
                return view('users.main', compact('users')); 
            }
        }
        $users = [] ;
        return view('users.main', compact('users')); 
    }

    public function create(Request $request )
    {
        return view('users.createUser' ) ;
    }

    public function store(Request $request)
    {

        $dataValidation = $request->validate([
            'name' => 'required|max:100|min:3' ,
            'email' => 'required|email|unique:users,email' ,
            'password' => 'required|confirmed' ,
            'img'=>'nullable|mimes:jpeg,png,jpg,gif ',
        ]);

        if($request->hasFile('img')){
            $img     = $request->file('img');
            $imgName = time().'_'.$img->getClientOriginalName() ;
            $img->move(public_path('img') ,$imgName );
        }else{
            $imgName = 'default.jpg' ;
        }

        User::create([
        'name'    =>$dataValidation['name'],
        'email'   =>$dataValidation['email'],
        'img'     =>$imgName,
        'password'=>$dataValidation['password'],
        'gender'  => $request->input('gender'),
        'sold'    => 200 ,
        'is_admin'=> 0 ,
        ]);

        $user = User::firstWhere('email' , $request->input('email') );
        $id = $user->user_id ;
        Auth::login($user);
        Mail::to($user->email)->send(new WelcomMail($user->name));
        return redirect()->route('user.show' , $id) ; //here we need $user
    }

    public function show($id) //it need the id session
    {
        $user = Auth::user() ;
        return view('users.profaile', compact('user')) ;
    }
    
    public function edit() //it need the id session
    {
        $user = Auth::user() ;
        return view('users.edit' , compact('user')) ;
    }

    public function update(Request $request) // delet the old picture when we change it
    {   
        $user = User::findOrFail(Auth::user()->user_id) ;
        $datavalidation = $request->validate([
            'name_input' => 'required|max:255|min:3' ,
            'password_input' => 'required|max:255|min:3' ,
            'img_input' => 'nullable|mimes:jpeg,png,jpg,gif' ,
        ]);

        if(Auth::check()){

            $user->name = $datavalidation['name_input'] ;
            if(!empty($datavalidation['password_input'])){$user->password = $datavalidation['password_input'] ;}

            if($request->hasFile('img_input')){

                $img = $request->file('img_input') ; 
                $nameImg = time(). '_' .$img->getClientOriginalName() ;
                $request->img_input->move(public_path('img' ),$nameImg);
                $user->img = $nameImg ;
                    
            }elseif(is_null($request->input('keep_img'))){$user->img = 'default.jpg' ;}
            $user->save();
            return redirect()->route('user.show' , $user)->with("success" , 'the update was succesful');
        }
    }

    public function destroy(string $id) // it will be used by admin
    {
        
        if(Auth::user()->is_admin || Auth::user()->user_id == $id ){
            $user = User::findOrFail($id) ;            
            $user->delete() ;
            Mail::to($user->email)->send(new DeleteAccountMail($user));
            if(Auth::user()->is_admin ){
                return redirect()->route('user.usersList')->with(['deleted_success' => 'the account deleted succesfuly']) ;
            }else{
                Auth::logout() ;
                return redirect('/')->with(['deleted_success' => 'the account deleted succesfuly']);
            }
        }else{
            return redirect()->back()->with(['deleted_error' => 'you don\'t have the right to delete this account ']); 
        }
    }

    public function LoginFrom(Request $request)
    {
        return view('users.login') ;
    }

    public function login(Request $request)
    {
        $dataValidation = $request->validate([
            'email' => 'required|email', 
            'password' => 'required',
        ]);

        $user = User::firstWhere('email', $dataValidation['email']) ;
        if($user){
            if($user->password === $dataValidation['password']){
                Auth::login($user);
                return redirect()->route('user.show' , $user) ; 
            }else{
                return redirect()->route('LoginFrom')->with('error' , 'incorrect password')->withInput();
            }
        }else{
            return redirect()->route('LoginFrom')->with('error' , 'incorrect email')->withInput();
        }
    }
    
    public function logout(Request $request) 
    {
        Auth::logout() ;        
        return view('users.login') ;
    }

    public function info() 
    {
        $user = Auth::user();
        return view('users.info' , compact('user')) ;
    }

}

