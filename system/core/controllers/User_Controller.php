<?

class User_Controller extends CI_Controller
{
	


	public function __construct($meta = NULL)
	{

		parent::__construct();

		if(!$this->ion_auth->logged_in())
			redirect(base_url('auth'));

	}

	

}