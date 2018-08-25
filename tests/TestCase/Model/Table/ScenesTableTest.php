<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScenesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScenesTable Test Case
 */
class ScenesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ScenesTable
     */
    public $Scenes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.scenes',
        'app.voices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Scenes') ? [] : ['className' => ScenesTable::class];
        $this->Scenes = TableRegistry::getTableLocator()->get('Scenes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Scenes);

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
}
