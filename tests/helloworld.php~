<?php

namespace vendor\project\tests\units;

require_once '/var/www/atoum/mageekguy.atoum.phar';

include '/var/www/simulatorEnergy/helloworld.php';

use \mageekguy\atoum;
use \vendor\project;

class helloWorld extends atoum\test
{
    public function testSay()
    {
        $helloWorld = new project\helloWorld();

        $this->string($helloWorld->say())->isEqualTo('Hello World!')
        ;
    }
}