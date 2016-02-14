<?php
namespace App\Test\TestCase\Controller;

use App\Controller\GoodsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\GoodsController Test Case
 */
class GoodsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.goods',
        'app.users',
        'app.distributions',
        'app.locations',
        'app.regions',
        'app.routes',
        'app.steps',
        'app.transfers',
        'app.warehouses',
        'app.goods_warehouses',
        'app.goods_routes',
        'app.transports',
        'app.transport_types',
        'app.routes_transports',
        'app.location_types',
        'app.grades',
        'app.items'
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
