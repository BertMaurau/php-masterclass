<?php

namespace Step\Acceptance;

class OrderOperatorSteps extends \AcceptanceTester
{

    /**
     * Check if running the right page
     */
    public function amInAddOrderUi()
    {
        $I = $this;
        $I -> amOnPage('/order/create');
        $I -> see('Create Order');
    }

    /**
     * Populate the order fields with faker data
     * @param array $fieldsData
     */
    public function fillOrderForm($fieldsData)
    {
        $I = $this;
        foreach ($fieldsData as $key => $value) {
            $I -> fillField($key, $value);
        }
    }

    /**
     * Submit the order
     */
    public function submitOrderForm()
    {
        $I = $this;
        $I -> click('Create');
    }

    /**
     * Check if the submit redirected to the view page
     * @param array $order
     */
    public function validateOrderCreation($order)
    {
        $I = $this;
        $I -> seeInCurrentUrl('/order/');
    }

    /**
     * Check if the page views the newly created ID
     * @param array $order
     */
    public function checkId($order)
    {
        $I = $this;
        // how to check for returned id?
        //$I -> see((string) $order['Order[customer_id]']);
        //$I -> see('Not Found (#404)');

        $I -> seeInDatabase('order', array('customer_id' => $order['Order[customer_id]'], 'date' => $order['Order[date]']));
    }

    public function checkMissingId($order)
    {
        $I = $this;
        // how to check for returned id?
        //$I -> see((string) $order['Order[customer_id]']);
        //$I -> see('Not Found (#404)');

        $I -> dontSeeInDatabase('order', array('customer_id' => $order['Order[customer_id]'], 'date' => $order['Order[date]']));
    }

    /**
     * Generate a random order with fake data
     * @return array
     */
    public function mockOrder()
    {
        $faker = \Faker\Factory::create();
        return [
            'Order[customer_id]' => $faker -> numberBetween($min = 1000, $max = 9000),
            'Order[date]'        => $faker -> date('Y-m-d'),
        ];
    }

    public function mockBadOrder()
    {
        $faker = \Faker\Factory::create();
        return [
            'Order[customer_id]' => $faker -> randomLetter,
            'Order[date]'        => $faker -> randomLetter,
        ];
    }

}
