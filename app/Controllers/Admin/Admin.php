<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;

class Admin extends BaseController
{
	function __construct()
    {
        $this->CommonModel = new \App\Models\CommonModel();
		$this->data = [];
    }
	public function index()
	{
		$this->data['title'] = "DashBaord";
		return view('admin/main', $this->data);
	}

	public function login()
	{
		$data = [];
        $session = session();
        if (!empty($session->get('username'))) {
            $bse_url = base_url();
            header("Location: $bse_url/admin");
            exit();
        }
        if (!empty($_POST)) {
            $msg = "";
            $username = !empty($_POST['username']) ? $_POST['username'] : '';
            $pass = !empty($_POST['password']) ? $_POST['password'] : '';
            $pass = md5($pass);
            $dataWhere['whereSpecific'] = "(username = '$username'  OR  email_id ='$username' )";
            $dataWhere['where']['password'] = $pass;
			$dataWhere['where']['type'] = 'A';
            // $dataWhere['pe']= 1;
            $userdata = $this->CommonModel->getAll('users', $dataWhere);
            $userdata = !empty($userdata) ? current($userdata) : '';
            if (!empty($userdata)) {
                $userSessionData['username'] = $userdata->username;
                $userSessionData['user_id'] = $userdata->user_id;
                $userSessionData['userlevel'] = $userdata->userlevel;
                $userSessionData['first_name'] = $userdata->first_name;
				$userSessionData['last_name'] = $userdata->last_name;
                $session->set($userSessionData);
            } else {
                $msg = "Invalid Credentials";
            }
        }

        $session = session();
        if (!empty($session->get('username')) && $session->get('userlevel') > 7) {
            $bse_url = base_url();

            header("Location: $bse_url/admin");
            exit();
        }
        if (!empty($session->get('username')) && $session->get('userlevel') < 7) {
            $msg = "Not a admin user";
        }

        $data = [
            'title' => 'Login Page',
            'msg' => $msg,
        ];
		$data['title'] = "Admin User Login";
		return view('admin/common/login',$data);
	}

	public function logout()
    {
        $session = session();
        $session->destroy();
        $bse_url = base_url();
        header("Location: $bse_url/admin");
        exit();
    }

	//--------------------------------------------------------------------

}
