<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutesTable Test Case
 */
class RoutesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutesTable
     */
    public $Routes;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Routes') ? [] : ['className' => 'App\Model\Table\RoutesTable'];
        $this->Routes = TableRegistry::get('Routes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Routes);

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
