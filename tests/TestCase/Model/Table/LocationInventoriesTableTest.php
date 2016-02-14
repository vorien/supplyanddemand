<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LocationInventoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LocationInventoriesTable Test Case
 */
class LocationInventoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LocationInventoriesTable
     */
    public $LocationInventories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.location_inventories',
        'app.users',
        'app.distributions',
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
        $config = TableRegistry::exists('LocationInventories') ? [] : ['className' => 'App\Model\Table\LocationInventoriesTable'];
        $this->LocationInventories = TableRegistry::get('LocationInventories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LocationInventories);

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
