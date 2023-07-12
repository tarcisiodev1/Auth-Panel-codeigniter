<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'profile' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 100,
            ],

            'password' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 255,
            ],
            'avatar' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('user');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
