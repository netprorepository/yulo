<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategorytypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategorytypesTable Test Case
 */
class CategorytypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategorytypesTable
     */
    public $Categorytypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categorytypes',
        'app.categories',
        'app.properties',
        'app.states',
        'app.countries',
        'app.agents',
        'app.users',
        'app.yulo_transactions',
        'app.yulo_cities',
        'app.cities',
        'app.yulo_areas',
        'app.images',
        'app.images_properties',
        'app.yulo_categorytype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Categorytypes') ? [] : ['className' => CategorytypesTable::class];
        $this->Categorytypes = TableRegistry::get('Categorytypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Categorytypes);

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
