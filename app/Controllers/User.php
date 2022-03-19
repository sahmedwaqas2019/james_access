<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
class User extends Controller
{
    // show users list
    public function index(){

        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('users/user_view', $data);
    }
    // add user form
    public function create(){
        helper(['form', 'url']);
        return view('users/add_user');
    }
 
    // insert data
    public function store() {
        $userModel = new UserModel();
        helper(['form', 'url']);

        if (! $this->validate([
            'name' => 'required',
            'email'    => 'required|valid_email',
            'phone' => 'required|min_length[10]',
            'mobile' => 'required|min_length[10]',
        ])) {
            return view('users/add_user', [
                'validation' => $this->validator,
            ]);
        } else {
            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'phone'  => $this->request->getVar('phone'),
                'mobile'  => $this->request->getVar('mobile'),
            ];
            $userModel->insert($data);
            return $this->response->redirect(site_url('users-list'));
        }
        
    }
    // show single user
    public function singleUser($id = null){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('users/edit_user', $data);
    }
    // update user data
    public function update(){
        $id = $this->request->getVar('id');
        if (! $this->validate([
            'name' => 'required',
            'email'    => 'required|valid_email',
            'phone' => 'required|min_length[10]',
            'mobile' => 'required|min_length[10]',
        ])) {
            $userModel = new UserModel();
            return view('users/edit_user', [
                'validation' => $this->validator,
                'user_obj' => $userModel->where('id', $id)->first()
            ]);
        } else {
            $userModel = new UserModel();
            
            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'phone'  => $this->request->getVar('phone'),
                'mobile'  => $this->request->getVar('mobile'),
            ];
            $userModel->update($id, $data);
            return $this->response->redirect(site_url('users-list'));
        }
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('users-list'));
    }    
}