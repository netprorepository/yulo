<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YuloListingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YuloListingTable Test Case
 */
class YuloListingTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\YuloListingTable
     */
    public $YuloListing;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.yulo_listing',
        'app.listings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('YuloListing') ? [] : ['className' => YuloListingTable::class];
        $this->YuloListing = TableRegistry::get('YuloListing', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->YuloListing);

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
