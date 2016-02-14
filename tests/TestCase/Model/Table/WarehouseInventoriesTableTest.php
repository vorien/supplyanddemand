<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WarehouseInventoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WarehouseInventoriesTable Test Case
 */
class WarehouseInventoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WarehouseInventoriesTable
     */
    public $WarehouseInventories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.warehouse_inventories',
        'app.users',
        'app.distributions',
        'app.warehouses',
        'app.locations',
        'app.regions',
        'app.routes',
        'app.steps',
        'app.transfers',
        'app.items',
        'app.types',
        'app.route_inventories',
        'app.grades',
        'app.transports',
        'app.routes_transports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WarehouseInventories') ? [] : ['className' => 'App\Model\Table\WarehouseInventoriesTable'];
        $this->WarehouseInventories = TableRegistry::get('WarehouseInventories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WarehouseInventories);

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
