<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "subdistid" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "customer" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "alamat" => [
                "type"=> "VARCHAR",
                "constraint" => "1000",
            ],
            "product" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "invoice" => [
                'type' => 'DATE',
                'null' => true,
            ],
            "quantity" => [
                "type"=> "INT",
                "null" => true,
                "default" => null,
            ],
            "price" => [
                "type"=> "INT",
                "null" => true,
                "default" => null,
            ],
            "totalprice" => [
                "type" => "INT",
                "null" => true,
                "default" => null,
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('products', true); //If NOT EXISTS create table products
    }

    public function down()
    {
        $this->forge->dropTable('products', true); //If Exists drop table products
    }
}