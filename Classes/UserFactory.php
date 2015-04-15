<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 11:16 AM
 */

class UserFactory {

    private static $instance;

    private function __construct(){

    }

    static function create(){

        return new User();
    }

}