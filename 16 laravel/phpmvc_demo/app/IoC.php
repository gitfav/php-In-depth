<?php
namespace app;

use ReflectionClass;

class IoC
{
    // 获得一个类的实例对象
    public static function getInstance($className)
    {
        $params = self::getParams($className);

        $mainClass = new ReflectionClass($className);

        return $mainClass->newInstanceArgs($params);
    }

    /**
     * 获得类方法的参数列表
     */
    public static function getParams($className, $methodName = '__construct')
    {
        // http://php.net/manual/zh/class.reflectionclass.php
        $refClass = new ReflectionClass($className);
        $refClassArgs = [];

        // http://php.net/manual/zh/reflectionclass.hasmethod.php
        if ($refClass->hasMethod($methodName)) {

            // http://php.net/manual/zh/reflectionclass.getmethod.php
            $methodReflection = $refClass->getMethod($methodName);
            
            // http://php.net/manual/zh/reflectionfunctionabstract.getparameters.php
            $params = $methodReflection->getParameters();
            //var_dump($params);exit;

            foreach ($params as $key => $param) {
                // http://php.net/manual/zh/reflectionparameter.getclass.php
                // 当一个参数不是类，而是普通参数，则返回值是 null
                $argClass = $param->getClass();
                //var_dump($argClass);

                if ($argClass) {
                    // 递归处理参数类的参数

                    // http://php.net/manual/zh/reflectionparameter.getname.php
                    $argClassName = $argClass->getName();
                    
                    $_refClass = new ReflectionClass($argClassName);
                    $_refClassParams = self::getParams($argClassName);

                    // http://php.net/manual/zh/reflectionclass.newinstanceargs.php
                    $refClassArgs[] = $_refClass->newInstanceArgs($_refClassParams);
                } else {
                    // http://php.net/manual/zh/reflectionparameter.getdefaultvalue.php
                    $refClassArgs[] = $param->getDefaultValue();
                }
            }
            
        }

        return $refClassArgs;
    }
}