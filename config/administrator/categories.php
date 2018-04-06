<?php

use App\Models\Category;
use App\Models\User;

return [
    //页面标题
    'title'       => '话题类别',

    //模型单数,用作页面 新建
    'single'      => '话题类别',

    //数据模型,用过数据的curd
    'model'       => Category::class,

    //设置当前页面的访问权限,通过返回布尔值控制权限
    //返回 true 即通过权限验证, false 则无法访问并从 menu 中隐藏
    'permission'  => function() {
        return Auth::user()->hasRole('Founder');
    },

    //字段负责渲染 数据表格,由无数的 列 组成
    'columns'     => [

        // 列的标示，这是一个最小化『列』信息配置的例子，读取的是模型里对应
        // 的属性的值，如 $model->id
        'id'          => [
            'title' => 'ID',
        ],
        'name'        => [
            'title'    => '名称',
            'sortable' => false,
        ],
        'description' => [
            'title'    => '描述',
            'sortable' => false,
        ],

        'operation' => [
            'title'    => '管理',
            'sortable' => false,
        ],
    ],

    // 『模型表单』设置项
    'edit_fields' => [
        'name'        => [
            'title' => '名称',
        ],
        'description' => [
            'title' => '描述',
        ],

    ],

    // 『数据过滤』设置
    'filters'     => [
        'id'   => [

            // 过滤表单条目显示名称
            'title' => '分类 ID',
        ],
        'name' => [
            'title' => '名称',
        ],
    ],

    'rules'=>[
        'name'=>'required|min:1|unique:categories'
    ],


];