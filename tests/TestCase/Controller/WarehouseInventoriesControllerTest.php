<?php
namespace App\Test\TestCase\Controller;

use App\Controller\WarehouseInventoriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\WarehouseInventoriesController Test Case
 */
class WarehouseInventoriesControllerTest extends IntegrationTestCase
{

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
        'app.route_inventories',
        'app.items',
        'app.types',
        'app.transfers',
        'app.steps',
        'app.grades',
        'app.transports',
        'app.routes_transports'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
