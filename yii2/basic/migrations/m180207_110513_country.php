<?php

use yii\db\Migration;

class m180207_110513_country extends Migration
{

    private static $fk = 'fk-country-iso';

    public function safeUp()
    {
        if ($this -> db -> schema -> getTableSchema('country', true) === null) {

            $this -> createTable('country', [
                'id'   => $this -> primaryKey(),
                'iso'  => $this -> string(2) -> notNull() -> unique(),
                'name' => $this -> string(32) -> notNull()
            ]);
        }
        $this -> alterColumn('customer', 'country', 'integer');

        // add foreign key for table `customer`
        $this -> addForeignKey(
                self::$fk, 'customer', 'country', 'country', 'id', 'NO ACTION'
        );

        $this -> insert('country', [
            'iso'  => 'BE',
            'name' => 'Belgium',
        ]);
    }

    public function safeDown()
    {
        $this -> dropForeignKey(self::$fk, 'customer');

        $this -> alterColumn('customer', 'country', 'varchar(2)');

        if ($this -> db -> schema -> getTableSchema('country', true) === null) {
            $this -> dropTable('country');
        }
    }

}
