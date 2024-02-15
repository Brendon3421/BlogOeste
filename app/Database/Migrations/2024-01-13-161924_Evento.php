<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Evento extends Migration
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
            'usuario_id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => true,
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
            'cep' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false,
            ],
            'rua' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ],
            'bairro' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'estado' =>[
                'type' => 'varchar',
                'constraint' => 11,
                'null' => false
            ],
            'cidade'=> [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'ibge'=> [
                'type' => 'int',
                'constraint' => 11,
                'null' => false, 
            ],
            'ddd' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false, 
            ],
            'gia' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false, 
            ],
            'imagem' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'video' => [
                'type' => 'varchar',
                'constraint' => 99999,
                'null' => false, 
            ],
            'descricao' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
          
            'longitude' => [
                'type' => 'decimal',
                'constraint' => 10,7,
                'null' => false,
            ], 
            'latitude' => [
                'type' => 'decimal',
                'constraint' => 10,7,
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
        $this->forge->createTable('evento');
        $this->forge->addForeignKey('usuario_id', 'usuario', 'id');

    }

    public function down()
    {
        $this->forge->dropTable('evento', true);
    }
}
