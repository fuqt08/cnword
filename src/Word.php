<?php

namespace fuqt08;

use Medoo\Medoo;

class Word
{
    /**
     * 查字相关信息
     * @param $zi
     * @return bool|array|string
     */
    public static function find($zi, $field = '')
    {
        $config = [
            'database_type' => 'sqlite',
            'database_file' => __DIR__ . '/data/dict.db'
        ];
        $fieldList = ['zi', 'big5', 'bihua', 'bihua2', 'py', 'py2', 'shengmu', 'yunmu', 'bushou', 'wx', 'wubi'];
        $dataBase = new Medoo($config);
        $data = $dataBase->get('bw_cnword', $fieldList, ['zi' => $zi]);
        if (empty($data)) {
            return false;
        }
        if (in_array($field, $fieldList)) {
            return $data[$field];
        }
        return $data;
    }
}