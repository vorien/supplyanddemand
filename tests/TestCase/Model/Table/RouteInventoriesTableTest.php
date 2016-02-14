<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RouteInventoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RouteInventoriesTable Test Case
 */
class RouteInventoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RouteInventoriesTable
     */
    public $RouteInventories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.route_inventories',
        'app.users',
        'app.distributions',
        'app.locations',
        'app.regions',
        'app.routes',
        'app.steps',
        'app.transfers',
        'app.items',
        'app.types',
        'app.location_inventories',
        'app.grades',
        'app.transports',
        'app.routes_transports',
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
        $config = TableRegistry::exists('RouteInventories') ? [] : ['className' => 'App\Model\Table\RouteInventoriesTable'];
        $this->RouteInventories = TableRegistry::get('RouteInventories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RouteInventories);

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
