<?php
/**
 * Created by PhpStorm.
 * User: darry
 * Date: 2020-05-14
 * Time: 18:13
 */

namespace Doctrine\Common\Annotations\Annotation;



final  class IgnoreAnnotation
{


    public $names;

    /**
     * Constructer
     * IgnoreAnnotation constructor.
     * @param array $values
     */
    public function __construct(array $values)
    {
        if(is_string($values['value'])){
            $values['value'] = [$values['value']];
        }

        if(!is_array($values['value'])){
            throw new \RuntimeException(sprintf('@IgnoreAnnotation expects either a string name, or an array of strings, but got %s.', json_encode($values['value'])));
        }
        $this->names = $values['value'];

    }
}
