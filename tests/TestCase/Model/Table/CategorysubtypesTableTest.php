<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategorysubtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategorysubtypesTable Test Case
 */
class CategorysubtypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategorysubtypesTable
     */
    public $Categorysubtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categorysubtypes',
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
        $config = TableRegistry::exists('Categorysubtypes') ? [] : ['className' => CategorysubtypesTable::class];
        $this->Categorysubtypes = TableRegistry::get('Categorysubtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Categorysubtypes);

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
