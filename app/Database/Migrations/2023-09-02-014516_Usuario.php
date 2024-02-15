<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'primary_key' => true, 
            ],
            'nome' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'senha' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'cpf' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'numero' => [
                'type' => 'varchar',
                'constraint' => 20,
                'null' => false,
            ],
            'data_nascimento' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'imagem' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ], 
            'genero_id' => [
                'type' => 'int',
                'constraint' => 11,
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
        $this->forge->createTable('usuario'); 
        $this->forge->addForeignKey('genero_id', 'genero', 'id'); 
    }

    public function down()
    {
        $this->forge->dropTable('usuario', true);
    }
}
