<?php

namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Utility\Hash;

/**
 * Paginator cell
 */
class PaginatorCell extends Cell {

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize() {
        
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display() {
        if ($this->request->getParam('controller') == 'Scenes' && $this->request->getParam('action') == 'index') {
            $current_category = Hash::get($this->request->getParam('pass'), 0);
        } else {
            $current_category = null;
        }

        $categories = $this->loadModel('Categories')->find();
        $this->set(compact('categories', 'current_category'));
    }

}
