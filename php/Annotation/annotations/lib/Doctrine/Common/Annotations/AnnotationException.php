<?php
/**
 * Created by PhpStorm.
 * User: darry
 * Date: 2020-05-14
 * Time: 18:46
 */

namespace Doctrine\Common\Annotations;


use Throwable;

class AnnotationException extends \Exception
{


    public static function syntaxError($message)
    {
        return new self('[Syntax Error] ' . $message);
    }

    public static function semanticalError($message)
    {
        return new self('[Semantical Error] ' . $message);
    }

    public static function creationError($message)
    {
        return new self('[creation Error]' . $message);
    }

    public static function typeError($message){
        return new self('[type Error]'.$message);
    }

    public static function semanticalErrorConstants($identifier,$context = null){
        return self::semanticalError(sprintf(
            "Couldn't find constant %s%s.",
            $identifier,
            $context ? ', ' . $context : ''
        ));
    }

    /**
     * @param $attributeName
     * @param $annotationName
     * @param $context
     * @param $expected
     * @param $actual
     * @return AnnotationException
     */
    public static function attributeTypeError($attributeName, $annotationName, $context, $expected, $actual){
        return self::typeError(sprintf(
            'Attribute "%s" of @%s declared on %s expects %s, but got %s.',
            $attributeName,
            $annotationName,
            $context,
            $expected,
            is_object($actual) ? 'an instance of ' . get_class($actual) : gettype($actual)
        ));
    }

    public static function requiredError($attributeName, $annotationName, $context, $expected){
        return self::typeError(sprintf(
            'Attribute "%s" of @%s declared on %s expects %s. This value should not be null.',
            $attributeName,
            $annotationName,
            $context,
            $expected
        ));
    }

    public static function enumeratorError($attributeName,$annotationName,$context, $available, $given){
        return new self(sprintf(
            '[Enum Error] Attribute "%s" of @%s declared on %s accept only [%s], but got %s.',
            $attributeName,
            $annotationName,
            $context,
            implode(', ', $available),
            is_object($given) ? get_class($given) : $given
        ));
    }

    public static function optimizerPlusSaveComments(){
        return new self(
            "You have to enable opcache.save_comments=1 or zend_optimizerplus.save_comments=1."
        );
    }

    public static function optimizerPlusLoadComments(){
        return new self(
            "You have to enable opcache.load_comments=1 or zend_optimizerplus.load_comments=1."
        );
    }
}
