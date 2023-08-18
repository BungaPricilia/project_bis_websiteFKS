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
        ];

        // Simple Queries
        $this->db->table('users')->insert($data);
    }
}