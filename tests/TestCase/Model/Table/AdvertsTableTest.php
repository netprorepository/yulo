<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvertsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvertsTable Test Case
 */
class AdvertsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvertsTable
     */
    public $Adverts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adverts',
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
        $config = TableRegistry::exists('Adverts') ? [] : ['className' => AdvertsTable::class];
        $this->Adverts = TableRegistry::get('Adverts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adverts);

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
