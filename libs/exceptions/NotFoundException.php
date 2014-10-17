<?php
/**
 * Created by PhpStorm.
 * ClassName: ${NAME}
 * User: JAN
 * Date: 14-10-15
 * Time: 下午12:10
 * Link: http://blog.segmentfault.com/janhuang
 */

namespace Libs\Exceptions;

class NotFoundException extends \Exception
{
    public function setException($error)
    {
        echo $error;
    }
}