<?php
/**
 * Created by PhpStorm.
 * User: moments
 * Date: 2018/1/3
 * Time: 下午7:48
 */

namespace Moments\Migration;


use Illuminate\Support\Facades\Facade;

class Schema extends Facade
{
    /**
     * @return mixed
     * Get a schema builder instance for the default connection.
     */
    protected static function getFacadeAccessor()
    {
        // 取数据库连接实例
        $connection = static::$app['db']->connection();

        // 如果是mysql连接,则修改其解析模式
        if (get_class($connection) === 'Illuminate\Database\MySqlConnection') {
            $connection->setSchemaGrammar(new MySqlGrammar());
        }

        // 返回构造器
        return $connection->getSchemaBuilder();
    }
}