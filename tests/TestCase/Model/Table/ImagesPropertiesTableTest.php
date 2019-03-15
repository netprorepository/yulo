<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagesPropertiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagesPropertiesTable Test Case
 */
class ImagesPropertiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagesPropertiesTable
     */
    public $ImagesProperties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.images_properties',
        'app.images',
        'app.properties',
        'app.categories',
        'app.yulo_categorytype',
        'app.agents',
        'app.users',
        'app.yulo_transactions',
        'app.states',
        'app.countries',
        'app.yulo_cities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ImagesProperties') ? [] : ['className' => ImagesPropertiesTable::class];
        $this->ImagesProperties = TableRegistry::get('ImagesProperties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ImagesProperties);

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
