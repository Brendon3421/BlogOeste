<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categoria extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'auto_increment' => true,
                'unique' => true,
            ],
            'nome' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => null,
            ],
            'updated_at' => [
            'type' => 'datetime', 
            'null' => true
        ],
            'deleted_at' => [
            'type' => 'datetime', 
            'null' => true
        ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('categoria');
    }

    public function down()
    {
        $this->forge->dropTable('categoria', true);
    }
}
