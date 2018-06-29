<?

class Admin_Controller extends CI_Controller
{
	protected $table ;
    protected $data = [];
    protected $redirect ;
    

    public function __construct()
    {
        parent::__construct();

		
        if (!$this->ion_auth->is_admin())
        redirect( base_url());
		
		$this->load->library('Orderstatus');
    }


    public function show_header($meta = NULL )
    {
    	
    	$this->load->library("menu/Admin");
		$this->load->view('admin/header',
		[
			'menu'=>$this->admin->menu(),
			
		]
		
		);
        
    }


}