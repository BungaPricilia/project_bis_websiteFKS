<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Login extends ResourceController
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
            'tittle' => "Login",
        ];

        echo view('auth/login', $data);
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
            'username' => 'required',
            'password' => 'required|min_length[6]'
        ]);
        if (!$validate) {
            $this->session->setFlashdata("errors", $this->validator->listErrors());
            return redirect()->to('/login')->withInput();
        }
        $username = $this->request->getPost('username');
        $password = (string) $this->request->getPost('password');

        $user = $this->userModel
            ->where('username', $username)
            ->first();

            if (md5($password) != $user['password']) {
                $data = [
                    'error' => 'Username atau Password salah'
                ];
                return redirect()->to('/login')->withInput();
                // throw new \Exception("Credentials is invalid!");
            }

            if ($user['role'] == 2) {
                $this->session->setFlashdata('success', "Selamat datang " . $user['name']);
                $this->session->set([
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ]);
                $this->session->set('loggedIn', true);
                return redirect()->to('/Admin');
            }
            $this->session->setFlashdata('success', "Selamat datang " . $user['name']);
            $this->session->set([
                'id' => $user['id'],
                'name' => $user['name'],
                'username' => $user['username'],
                'role' => $user['role']
            ]);
            $this->session->set('loggedIn', true);
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