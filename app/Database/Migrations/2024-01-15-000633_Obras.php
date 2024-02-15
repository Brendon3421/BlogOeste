<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obras extends Migration
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
            'processo' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'anodeatucao' => [
                'type' => 'date',

                'null' => false, 
            ],
            'tipodeprocesso' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'undidadetecnicaresponsavel' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'unidadedresponsavelaigr' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'relator' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'estado_id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false, 
            ],
            'assuntoprocesso' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'unidadesjurisdicionadas' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'trasparenciaativa' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false, 
            ],
            'valor' => [
                'type' => 'float',
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
        $this->forge->createTable('obras');
        $this->forge->addKey('usuario_id', 'usuario', 'id');
        $this->forge->addKey('estado_id', 'estado', 'id');

    }

    public function down()
    {
        $this->forge->dropTable('obras', true);
    }
}
