<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'bunga',
            'username' => 'bunga@gmail.com',
            'password' => md5("secret"),
            'role' => '1',
        ];

        $this->db->table('users')->insert($data);

        $data = [
            'name' => 'pricillia',
            'username' => 'pricillia@gmail.com',
            'password' => md5("secret"),
            'role' => '2',
        ];

        // Simple Queries
        $this->db->table('users')->insert($data);
    }
}