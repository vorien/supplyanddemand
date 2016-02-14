<?php
namespace App\Test\TestCase\Controller;

use App\Controller\WarehousesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\WarehousesController Test Case
 */
class WarehousesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.warehouses',
        'app.users',
        'app.distributions',
        'app.locations',
        'app.regions',
        'app.routes',
        'app.route_inventories',
        'app.items',
        'app.types',
        'app.location_inventories',
        'app.grades',
        'app.transfers',
        'app.steps',
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
