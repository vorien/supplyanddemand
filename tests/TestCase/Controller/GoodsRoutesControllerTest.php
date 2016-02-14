<?php
namespace App\Test\TestCase\Controller;

use App\Controller\GoodsRoutesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\GoodsRoutesController Test Case
 */
class GoodsRoutesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.goods_routes',
        'app.users',
        'app.distributions',
        'app.locations',
        'app.regions',
        'app.routes',
        'app.steps',
        'app.transfers',
        'app.warehouses',
        'app.goods',
        'app.items',
        'app.grades',
        'app.goods_warehouses',
        'app.transports',
        'app.transport_types',
        'app.routes_transports',
        'app.location_types'
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
