<?php
class Admin_Controller extends CI_Controller {

    //Class-wide variable to store user object in.
    protected $the_user;

    public function __construct() {

        parent::__construct();

        //Check if user is in admin group
        if ( $this->ion_auth->is_admin() ) {

            //Put User in Class-wide variable
            $this->the_user = $this->ion_auth->user()->row();

            //Store user in $data
            $data->the_user = $this->the_user;

            //Load $the_user in all views
            $this->load->vars($data);
        }
        else {
            redirect('/');
        }
    }
	
	
}

class User_Controller extends CI_Controller {

    protected $the_user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->in_group('user')) {
            $this->the_user = $this->ion_auth->user()->row();
            $data->the_user = $this->the_user;
            $this->load->vars($data);
        }
        else {
            redirect('/');
        }
    }
}


class Common_Auth_Controller extends CI_Controller {

    protected $the_user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->logged_in()) {
            $this->the_user = $this->ion_auth->user()->row();
            $data->the_user = $this->the_user;
            $this->load->vars($data);
        }
        else {
            redirect('/');
        }
    }
}