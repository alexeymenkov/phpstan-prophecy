<?php

namespace JanGregor\Prophecy\Reflection;


use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\MethodsClassReflectionExtension;
use Prophecy\Prophecy\ObjectProphecy;

class ProphecyMethodsClassReflectionExtension implements MethodsClassReflectionExtension
{
    public function hasMethod(ClassReflection $classReflection, string $methodName): bool
    {
        // don't know which class is prophesized here, so let's say yes to every method
        // must match class in MockBuilderType parent::__construct() equivalent
        return $classReflection->getName() === ObjectProphecy::class;
    }

    public function getMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        return new ObjectProphecyMethodReflection($classReflection, $methodName);
    }
}
