<?php

namespace Features\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'banner';

    const POSITION = [
        '1' => '首页顶部'
    ];

    const TYPE = [
        '1' => '不跳转',
        '2' => '跳转内链',
        '3' => '跳转外链'
    ];

    const SWITCH = [
        '0' => '关闭',
        '1' => '开启'
    ];

}
