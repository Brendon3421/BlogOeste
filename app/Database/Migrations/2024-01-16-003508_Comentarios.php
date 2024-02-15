<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comentarios extends Migration
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
            'evento_id' =>[
                'type' => 'int',
                'constraint' => 11,
                'null'=> null
            ],
            'nome' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ],
            'descricao' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ],
            'imagem' => [
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
            $this->forge->createTable('comentarios');
            $this->forge->addKey('evento_id','evento','id');

    }

    public function down()
    {
        $this->forge->dropTable('comentarios');
    }
}
