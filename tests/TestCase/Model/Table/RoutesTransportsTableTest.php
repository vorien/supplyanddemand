<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutesTransportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutesTransportsTable Test Case
 */
class RoutesTransportsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutesTransportsTable
     */
    public $RoutesTransports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.routes_transports',
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
        $config = TableRegistry::exists('RoutesTransports') ? [] : ['className' => 'App\Model\Table\RoutesTransportsTable'];
        $this->RoutesTransports = TableRegistry::get('RoutesTransports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RoutesTransports);

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
