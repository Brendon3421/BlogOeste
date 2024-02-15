<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estado extends Migration
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

       ]);
       $this->forge->addKey('id', true);
       $this->forge->createTable('estado');

    }

    public function down()
    {
        $this->forge->dropTable('estado', true);
    }
}
