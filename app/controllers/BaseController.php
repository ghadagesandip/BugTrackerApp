<?php
class BaseController extends Controller {

    protected $title = null;

    public function __construct(){
        $this->title = Route::currentRouteName();
        View::share('title',$this->title);
    }



    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }


}