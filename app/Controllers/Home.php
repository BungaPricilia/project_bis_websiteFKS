<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    protected $productModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }
    public function index()
    {
        $productdata = $this->productModel->findAll();
        $jumlah_baris = $this->productModel->countAll(); // Menghitung jumlah baris pada tabel

        // Mengambil data produk yang telah diurutkan berdasarkan jumlah secara descending (terbanyak dulu)
        // dan dibatasi hanya 10 data produk yang paling banyak
        $jumlah_per_product = $this->productModel->select('COUNT(id) AS jumlah, product')
            ->groupBy('product')
            ->orderBy('jumlah', 'DESC')
            ->limit(10)
            ->findAll();
       

            //untuk menghitung total quantity
            $productModel = new ProductModel();
            $products = $productModel->findAll(); // Mengambil semua data produk
            $totalQuantity = 0; // Inisialisasi total quantity dengan nilai 0
        
            foreach ($products as $product) {
                $totalQuantity += $product['quantity']; // Menambahkan nilai quantity ke total quantity
            }
            //untuk menghitung total quantity
            $products1 = $productModel->findAll(); // Mengambil semua data produk
            $totalPrice = 0; // Inisialisasi total quantity dengan nilai 0
        
            foreach ($products1 as $product1) {
                $totalPrice += $product1['price']; // Menambahkan nilai quantity ke total quantity
            }

            //untuk memfilter perbulan
            
        $data = [
            'tittle' => "Dashboard",
            'umkmdata' => $productdata,
            'jumlah' => $jumlah_baris,
            'thread_per_product' => $jumlah_per_product,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
        ];

        return view('home', $data);
    }
}