<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvertisersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvertisersTable Test Case
 */
class AdvertisersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvertisersTable
     */
    public $Advertisers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.advertisers',
        'app.users',
        'app.agents',
        'app.states',
        'app.countries',
        'app.yulo_cities',
        'app.subscriptions',
        'app.plans',
        'app.yulo_usersplan',
        'app.properties',
        'app.categories',
        'app.yulo_categorytype',
        'app.categorytypes',
        'app.categorysubtypes',
        'app.cities',
        'app.yulo_areas',
        'app.images',
        'app.images_properties',
        'app.yulo_transactions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Advertisers') ? [] : ['className' => AdvertisersTable::class];
        $this->Advertisers = TableRegistry::get('Advertisers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Advertisers);

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
