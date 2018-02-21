<?php

use yii\db\Migration;

class m180221_131339_user extends Migration
{

    public function safeUp()
    {
        if ($this -> db -> schema -> getTableSchema('user', true) === null) {

            $this -> createTable('user', [
                'id'       => $this -> primaryKey(),
                'username' => $this -> string(32) -> notNull(),
                'password' => $this -> string(32) -> notNull(),
                'auth_key' => $this -> string(64)
            ]);
        }

        $this -> insert('user', [
            'username' => 'Bert',
            'password' => '3de0746a7d2762a87add40dac2bc95a0'
        ]);
    }

    public function safeDown()
    {
        if ($this -> db -> schema -> getTableSchema('user', true) === null) {
            $this -> dropTable('user');
        }
        return true;
    }

}
