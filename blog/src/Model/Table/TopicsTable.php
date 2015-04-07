<?php

/**
 * Topic Table
 * @author Anand Ghaywankar <anand.ghaywankar@gmail.com>
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class TopicsTable extends Table
{
    public function initialize(array $config)
    {
        $this->primaryKey('id');       
        
    }
}
