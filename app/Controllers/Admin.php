<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Admin extends BaseController
{
    protected $productModel;
    protected $session;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->session = \Config\Services::session();
        $this->session->start();

        // Inisialisasi sesi produk jika belum ada
        if (!$this->session->get('products')) {
            $this->session->set('products', []);
        }
    }

    public function index()
    {
        
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $product = $this->productModel->search($keyword);
        } else {
            $product = $this->productModel->orderBy('id', 'DESC');
        }

        $data = [
            'tittle' => "Data List",
            'product' => $product->paginate(50, 'products'),
            'pager' => $this->productModel->pager
        ];
        
        $userRoleId = $this->session->get('role');
        if ($userRoleId == 1) {
            return view('product/index', $data);
        } else {
            return view('productadmin/index', $data);
        }
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
    public function create()
    {
        $data = [
            'tittle' => "Add Data"
        ];

        $userRoleId = $this->session->get('role');
        if ($userRoleId == 1) {
            return view('product/new', $data);
        } else {
            return view('productadmin/new', $data);
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function save()
    {
        if (
            !$this->validate([
                'subdistid' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Id Tidak boleh kosong'
                    ]
                ],
                'customer' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Tidak boleh kosong'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Tidak boleh kosong'
                    ]
                ],
                'product' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Product Tidak boleh kosong'
                    ]
                ],
                'invoice' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'tanggal Invoice Tidak boleh kosong'
                    ]
                ],
                'quantity' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'quantity Tidak boleh kosong'
                    ]
                ],
                'price' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Price Tidak boleh kosong'
                    ]
                ]
            ])
        ) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            "subdistid" => $this->request->getPost('subdistid'),
            "customer" => $this->request->getPost('customer'),
            "alamat"  => $this->request->getPost('alamat'),
            "product" => $this->request->getPost('product'),
            "invoice" => $this->request->getPost('invoice'),
            "quantity" => $this->request->getPost('quantity'),
            "price" => $this->request->getPost('price'),
            "totalprice" => $this->request->getPost('totalprice'),
        ];
        $this->productModel->insert($data);
        session()->setFlashdata('success', 'Data Berhasil di-upload');
        return redirect()->to('/Admin/Tabel');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $this->productModel = new ProductModel();
        
        $data = [
            'tittle' => "Edit Data",
            'Admin' => $this->productModel->getProductData($id)
        ];
        $userRoleId = $this->session->get('role');
        if ($userRoleId == 1) {
            return view('product/edit', $data);
        } else {
            return view('productadmin/edit', $data);
        }

    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id)
    {
        $data = [
            "subdistid" => $this->request->getPost('subdistid'),
            "customer" => $this->request->getPost('customer'),
            "alamat"  => $this->request->getPost('alamat'),
            "product" => $this->request->getPost('product'),
            "invoice" => $this->request->getPost('invoice'),
            "quantity" => $this->request->getPost('quantity'),
            "price" => $this->request->getPost('price'),
            "totalprice" => $this->request->getPost('totalprice'),
        ];
        $this->productModel->update($id, $data);
        session()->setFlashdata('success', 'Data Berhasil di-update');
        return redirect()->to('/Admin/Tabel');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/Admin/Tabel');
    }

    public function exportToCSV()
    {
        // Mengambil data dari model atau sumber data lainnya
        $umkm = $this->productModel->findAll();

        // Nama file CSV yang akan dihasilkan
        $filename = 'data_customer' . '.csv';

        // Membuka file CSV dan menulis data
        $file = fopen($filename, 'w');
        fputcsv(
            $file,
            array(
                'SubdistID',
                'Customer Name',
                'Alamat',
                'Product Name',
                'Invoice Date',
                'Quantity',
                'Unit Price',
                'Total Price'
            )
        ); // Menulis header kolom

        foreach ($umkm as $row) {
            fputcsv(
                $file,
                array(
                    $row['subdistid'], $row['customer'], $row['alamat'], $row['product'], 
                    $row['invoice'], $row['quantity'], $row['price'], $row['totalprice']
                )
            ); // Menulis data
        }

        // Menutup file CSV
        fclose($file);

        // Mengirimkan file CSV sebagai respons ke browser
        return $this->response->download($filename, null)->
            setFileName($filename)->setContentType('application/csv')->setHeader('Expires', '0');
    }

}