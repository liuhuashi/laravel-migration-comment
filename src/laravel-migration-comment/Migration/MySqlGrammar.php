<?php
/**
 * Created by PhpStorm.
 * User: moments
 * Date: 2018/1/3
 * Time: 下午7:59
 */

namespace Moments\Migration;

use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\MySqlGrammar as BaseMySqlGrammar;
use Illuminate\Support\Fluent;

class MySqlGrammar extends BaseMySqlGrammar
{
    /**
     * @param Blueprint $blueprint
     * @param Fluent $command
     * @param Connection $connection
     * @return string
     * Compile a create table command. 增加表注释功能
     */
    public function compileCreate(Blueprint $blueprint, Fluent $command, Connection $connection)
    {
        // 调用父类方法
        $sql = parent::compileCreate($blueprint, $command, $connection);

        // 如果定义了表注释
        if (isset($blueprint->comment)) {
            $blueprint->comment = str_replace("'", "\'", $blueprint->comment);
            $sql .= " comment = '" . $blueprint->comment . "'";
        }

        // 返回处理后的sql语句
        return $sql;
    }
}