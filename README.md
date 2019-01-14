# laravel-migration-comment

---

Laravel数据库迁移增加表注释功能。

## 使用方法

composer require rjyxz/laravel-migration-comment

将`use Illuminate\Support\Facades\Schema;`替换成`use Moments\Migration\Schema;`

## 实例

```php
use Moments\Migration\Schema;

public function up()
{
    Schema::create('Moments' . 'categories', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('parent_id')->default(0)->comment('父id');
        $table->string('title', 255)->nullable()->comment('标题');
        $table->string('keywords', 255)->nullable()->comment('SEO关键词');
        $table->string('description', 255)->nullable()->comment('SEO描述');
        $table->integer('order')->default(0)->comment('自定义排序');
        $table->tinyInteger('verify')->default(0)->comment('审核状态|-1:软删除|0:未审核|1:通过|2:不通过');
    
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
        $table->comment = '分类表';
    });
}
```

## 其他方式

```php
$table->charset = 'utf8 COMMENT="表注释代码"';
```
