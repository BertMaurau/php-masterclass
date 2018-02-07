<?php

use yii\db\Migration;

class m180207_124939_product extends Migration
{

    public function safeUp()
    {
        if ($this -> db -> schema -> getTableSchema('product', true) === null) {

            $this -> createTable('product', [
                'id'    => $this -> primaryKey(),
                'name'  => $this -> string(32) -> notNull(),
                'price' => $this -> float()
            ]);
        }
    }

    public function safeDown()
    {
        if ($this -> db -> schema -> getTableSchema('product', true) === null) {
            $this -> dropTable('product');
        }
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m180207_124939_product cannot be reverted.\n";

      return false;
      }
     */
}
