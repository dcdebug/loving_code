<?php
/**
 * Created by PhpStorm.
 * User: darry
 * Date: 2020-05-14
 * Time: 18:07
 */

namespace Doctrine\Common\Annotations;


class AnnotationReader implements  Reader
{


    protected  static $globalImports=[
        'ignoreannotation'=>'',//忽略的注解
    ];
    function getClassAnnotation(\ReflectionClass $class, $annotationName)
    {
        // TODO: Implement getClassAnnotation() method.
    }

    function getPropertyAnnotations(\ReflectionProperty $property)
    {
        // TODO: Implement getPropertyAnnotations() method.
    }

    function getPropertyAnnotation(\ReflectionProperty $property, $annotationName)
    {
        // TODO: Implement getPropertyAnnotation() method.
    }

    function getMethodAnnotation(\ReflectionMethod $method, $annotationName)
    {
        // TODO: Implement getMethodAnnotation() method.
    }

    function getMethodAnnotations(\ReflectionMethod $method)
    {
        // TODO: Implement getMethodAnnotations() method.
    }

    function getClassAnnotations(\ReflectionClass $class)
    {
        // TODO: Implement getClassAnnotations() method.
    }


}
