<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;

class Product extends BaseController
{
	function __construct()
    {
        $this->CommonModel = new \App\Models\CommonModel();
		$this->data = [];
    }
    
	public function list()
	{
		$this->data['title'] = "Product List";
		return view('admin/main', $this->data);
    }

	//--------------------------------------------------------------------

}
