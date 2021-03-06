<?php

namespace Symfony\Component\Config\Definition;

class BooleanNodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getValidValues
     */
    public function testNormalize($value)
    {
        $node = new BooleanNode('test');
        $this->assertSame($value, $node->normalize($value));
    }

    public function getValidValues()
    {
        return array(
            array(false),
            array(true),
        );
    }

    /**
     * @dataProvider getInvalidValues
     * @expectedException Symfony\Component\Config\Definition\Exception\InvalidTypeException
     */
    public function testNormalizeThrowsExceptionOnInvalidValues($value)
    {
        $node = new BooleanNode('test');
        $node->normalize($value);
    }

    public function getInvalidValues()
    {
        return array(
            array(null),
            array(''),
            array('foo'),
            array(0),
            array(1),
            array(0.0),
            array(0.1),
            array(array()),
            array(array('foo' => 'bar')),
            array(new \stdClass()),
        );
    }
}

