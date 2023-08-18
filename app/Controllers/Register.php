<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Register extends ResourceController
{
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'tittle' => "Register",
        ];
        echo view('auth/register', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validate = $this->validate([
            'name' => 'required',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'password2' => 'required|matches[password]'
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('/register')->withInput();
        }

        $data = [
            "name" => $this->request->getPost('name'),
            "username" => $this->request->getPost('username'),
            "password" => md5($this->request->getPost('password')),
        ];

        $this->userModel->insert($data);
        
        $this->session->setFlashdata('success', 'Berhasil membuat user!');
        return redirect()->to('/Admin');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}