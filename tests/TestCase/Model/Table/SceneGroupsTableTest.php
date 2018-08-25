<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SceneGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SceneGroupsTable Test Case
 */
class SceneGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SceneGroupsTable
     */
    public $SceneGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.scene_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SceneGroups') ? [] : ['className' => SceneGroupsTable::class];
        $this->SceneGroups = TableRegistry::getTableLocator()->get('SceneGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SceneGroups);

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
