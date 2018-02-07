<?php

use yii\db\Migration;

class m180207_125128_orders extends Migration
{

    private static $fk_customer = 'fk-customer_id';
    private static $fk_product = 'fk-produt_id';
    private static $fk_order = 'fk-order_id';

    public function safeUp()
    {
        if ($this -> db -> schema -> getTableSchema('order', true) === null) {

            $this -> createTable('order', [
                'id'          => $this -> primaryKey(),
                'customer_id' => $this -> integer() -> notNull(),
                'date'        => $this -> dateTime()
            ]);
        }
        if ($this -> db -> schema -> getTableSchema('order_detail', true) === null) {

            $this -> createTable('order_detail', [
                'id'         => $this -> primaryKey(),
                'order_id'   => $this -> integer() -> notNull(),
                'product_id' => $this -> integer() -> notNull()
            ]);
        }

        $this -> addForeignKey(
                self::$fk_customer, 'order', 'customer_id', 'customer', 'id', 'NO ACTION'
        );

        $this -> addForeignKey(
                self::$fk_order, 'order_detail', 'order_id', 'order', 'id', 'CASCADE'
        );

        $this -> addForeignKey(
                self::$fk_product, 'order_detail', 'product_id', 'product', 'id', 'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this -> dropForeignKey(self::$fk_customer, 'order');
        $this -> dropForeignKey(self::$fk_order, 'order_detail');
        $this -> dropForeignKey(self::$fk_product, 'order_detail');

        if ($this -> db -> schema -> getTableSchema('order', true) === null) {
            $this -> dropTable('order');
        }
        if ($this -> db -> schema -> getTableSchema('order_detail', true) === null) {
            $this -> dropTable('order_detail');
        }
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m180207_125128_orders cannot be reverted.\n";

      return false;
      }
     */
}
