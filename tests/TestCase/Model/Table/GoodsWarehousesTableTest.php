<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GoodsWarehousesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GoodsWarehousesTable Test Case
 */
class GoodsWarehousesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GoodsWarehousesTable
     */
    public $GoodsWarehouses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.goods_warehouses',
        'app.users',
        'app.goods',
        'app.items',
        'app.grades',
        'app.distributions',
        'app.locations',
        'app.transfers',
        'app.routes',
        'app.goods_routes',
        'app.warehouses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GoodsWarehouses') ? [] : ['className' => 'App\Model\Table\GoodsWarehousesTable'];
        $this->GoodsWarehouses = TableRegistry::get('GoodsWarehouses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GoodsWarehouses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
