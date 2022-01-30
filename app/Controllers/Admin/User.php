<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;

class User extends BaseController
{
	function __construct()
    {
        $this->CommonModel = new \App\Models\CommonModel();
		$this->data = [];
    }
    
	public function list()
	{
		$queryParam = [
			'primary_id' => 'user_id',
			'select' => 'user_id,last_name,first_name,email_id',
			'where' => ['type'=>'C']
		];
		$allusers = $this->CommonModel->getAll('users',$queryParam);
		if (!empty($allusers)) {
			$allusersHeader = getArrayHeaders($allusers);
			$allusersHeaderJapanese = [
				'ユーザーID',
				'変更',
				'名',
				'メールアドレス'
			];
		}
		$this->data['title'] = "User List";
		$this->data['contentview'] = "user/userlist";
		$this->data['contentdata']['allusers'] = $allusers;
		$this->data['contentdata']['allusersHeader'] = $allusersHeader;
		echo view('admin/main', $this->data);
    }

	public function add()
	{
		$queryParam = [
			'primary_id' => 'user_id',
			'select' => 'user_id,last_name,first_name,email_id',
			'where' => ['type'=>'C']
		];
		$allusers = $this->CommonModel->getAll('users',$queryParam);
		if (!empty($allusers)) {
			$allusersHeader = getArrayHeaders($allusers);
			$allusersHeaderJapanese = [
				'ユーザーID',
				'変更',
				'名',
				'メールアドレス'
			];
		}
		$this->data['title'] = "User Add";
		$this->data['contentview'] = "user/useradd";
		$this->data['contentdata']['allusers'] = $allusers;
		$this->data['contentdata']['allusersHeader'] = $allusersHeader;
		echo view('admin/main', $this->data);
    }

	//--------------------------------------------------------------------

}
