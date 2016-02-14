<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RoutesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RoutesController Test Case
 */
class RoutesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.routes',
        'app.users',
        'app.distributions',
        'app.locations',
        'app.regions',
        'app.location_inventories',
        'app.items',
        'app.types',
        'app.route_inventories',
        'app.grades',
        'app.transfers',
        'app.steps',
        'app.warehouses',
        'app.routes_transports',
        'app.transports'
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
