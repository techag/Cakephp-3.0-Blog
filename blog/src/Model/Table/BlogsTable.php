<?php

/**
 * Blogs Model. 
 * Blogs has association with Comments, users, and Topics
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class BlogsTable extends Table {

    public function initialize(array $config) {
        $this->primaryKey('id');
        
        /**
         * Blogs hasMany Comments
         */
        $this->hasMany('Comments');
        
        /**
         * Belongs to Topics and Users
         */
        $this->belongsTo('Topics');
        $this->belongsTo('Users');       
        
    }

}
