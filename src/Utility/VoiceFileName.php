<?php

namespace App\Utility;

use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class VoiceFileName {

    public static $personalities = null;
    
    static function get($personality_id, $scene) {
        
        $path = self::getPersonality( $personality_id )->path;
        
        $src = sprintf('/wav/%s/a%02d_%s.wav', $path, $personality_id, $scene);
        return Router::url($src, true);
    }
    
    static function getPersonality( $personality_id ){
        return Hash::get(Hash::extract(self::getPersonarities(),"{n}[id={$personality_id}]"),0);
    }
    
    static function getPersonarities(){
        if( self::$personalities === null ){
            self::$personalities = TableRegistry::get('Personalities')->find()
                    ->toArray();
        }
        
        return self::$personalities;
    }

}
