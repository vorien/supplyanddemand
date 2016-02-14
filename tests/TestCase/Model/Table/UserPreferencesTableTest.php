<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserPreferencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserPreferencesTable Test Case
 */
class UserPreferencesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserPreferencesTable
     */
    public $UserPreferences;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_preferences',
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
        $config = TableRegistry::exists('UserPreferences') ? [] : ['className' => 'App\Model\Table\UserPreferencesTable'];
        $this->UserPreferences = TableRegistry::get('UserPreferences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserPreferences);

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
