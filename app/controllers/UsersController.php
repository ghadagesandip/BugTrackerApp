<?php

class UsersController extends \BaseController{

    public $layout ='layouts.default';

    protected $user;

    public function __construct(User $user){
        parent::__construct();
        $this->user = $user;
    }


    public function login(){
        return View::make('users.login');
    }



    public function register(){
        $roles = Role::getRoleList();
        return View::make('users.register',compact('roles'));
    }

    public function logout(){
        Auth::logout();
        Session::flash('success-message','You are logged out succesfully');
        return Redirect::to('login');
    }



    public function authenticate(){
        $usernameAttempt = Auth::attempt(array('username'=>Input::get('username'),'password'=>Input::get('password')));
        $emailAttempt = Auth::attempt(array('email'=>Input::get('email'),'password'=>Input::get('password')));
        if($usernameAttempt||$emailAttempt){
            Session::put('user',Auth::user());
            return Redirect::to('/dashboard');
        }else{
            Session::flash('message','Invalid username and password');
            return Redirect::to('/login');
        }
    }



    public function index(){
        $users =  $this->user->paginate();
        $this->layout->content = View::make('users.index',compact('users'));
    }




    public function create(){
       $roles = Role::getRoleList();
       $this->layout->content = View::make('users.create',compact('roles'));
    }


    public function dashboard(){
        $this->layout->title ="Dashboard";
        $this->layout->content = View::make('users.dashboard');
    }


    public function store(){
        if(!$this->user->fill(Input::all())->isValid()){
            Session::flash('message','Validation failed');
            return Redirect::back()->withErrors($this->user->errors)->withInput();
        }else{
            $this->user->save();
            Session::flash('message','User created');
            return Redirect::to('/users');
        }

    }
}