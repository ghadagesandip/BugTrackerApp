<?php

class UsersController extends \BaseController{

    public $layout ='layouts.default';

    protected $user;

    public function __construct(User $user){
        parent::__construct();
        $this->user = $user;
        $this->beforeFilter('csrf', array('on' => 'post','PUT'));
        $this->beforeFilter('auth',array('except' => array('login','authenticate','getUsers','forgotPassword','sendForgotPasswordEmail')));
    }


    public function login(){
        if(Auth::check()){
            return Redirect::to('/dashboard');
        }
        $this->title =" Login";
        return View::make('users.login');
    }



    public function getUsers(){
        $users  = User::with('role')->get();
        return Response::json($users);
    }



    public function register(){
        $roles = Role::getRoleList();
        return View::make('users.register',compact('roles'));
    }


    public function forgotPassword(){
        $this->layout->title="Forgot Password";
        $this->layout->content = View::make('users.forgot_password');
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
            $event = Event::fire('auth.login', array(Auth::user()));
            return Redirect::to('/dashboard');
        }else{
            Session::flash('message','Invalid username and password');
            return Redirect::to('/login');
        }
    }



    public function index(){
        $this->layout->title="Users";
        $users =  $this->user->paginate();
        $this->layout->content = View::make('users.index',compact('users'));
    }




    public function create(){
       $roles = Role::getRoleList();
       $this->layout->content = View::make('users.create',compact('roles'));
    }




    public function edit($id){
        $this->layout->title = 'Update User';
        $user = $this->user->find($id);
        $roles = Role::getRoleList();
        $this->layout->content =  View::make('users.edit',compact('roles','user'));
    }




    public function show($id){
        $this->layout->title = "View User";
        $user = $this->user->find($id);
        $this->layout->content = View::make('users.show',compact('user'));
    }




    public function profile(){
        $this->layout->title = "Profile";
        $user = $this->user->with('role')->find(Auth::user()->id);
        $this->layout->content = View::make('users.profile',compact('user'));
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



    public function update($id){
        if(!$this->user->fill($data = Input::all())->isValid($id)){

            Session::flash('message','Validation error occured');
            return Redirect::back()->withErrors($this->user->errors)->withInput();
        }else{
            $this->user->find($id)->update($data);
            Session::flash('message','User updated');
            return Redirect::to('/users');
        }
    }



    public function sendForgotPasswordEmail(){
        if(!$this->user->fill(Input::all())->isValid()){
            Session::flash('message','Validation error occured');
            return Redirect::back()->withErrors($this->user->errors)->withInput();
        }else{
            $user = User::where('email','=',Input::get('user_email'))->get();                       ;
            Mail::send('emails.welcome', array(), function($message)
            {
                Session::flash('message','Sent email');
                $message->to('ghadagesandip@gmail.com', 'Sandy')
                    ->subject('Welcome to Cribbb!');
            });
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        if($this->user->destroy($id)){
            Session::flash('message',' User deleted successfully');
        }else{
            Session::flash('message','Could not detele user, please try again');
        }
        return Redirect::back();
    }
}
