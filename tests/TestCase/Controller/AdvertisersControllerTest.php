<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AdvertisersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AdvertisersController Test Case
 */
class AdvertisersControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
