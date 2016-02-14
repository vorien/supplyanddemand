<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GoodsRoutesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GoodsRoutesTable Test Case
 */
class GoodsRoutesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GoodsRoutesTable
     */
    public $GoodsRoutes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.goods_routes',
        'app.users',
        'app.routes',
        'app.goods',
        'app.items',
        'app.grades',
        'app.distributions',
        'app.locations',
        'app.transfers',
        'app.warehouses',
        'app.goods_warehouses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GoodsRoutes') ? [] : ['className' => 'App\Model\Table\GoodsRoutesTable'];
        $this->GoodsRoutes = TableRegistry::get('GoodsRoutes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GoodsRoutes);

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
