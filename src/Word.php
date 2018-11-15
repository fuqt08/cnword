<?php

namespace fuqt08;

use Medoo\Medoo;

class Word
{
    /**
     * 查字相关信息
     * @param string $zi 汉字
     * @param bool $isBig5 是否繁体字 默认查简体字
     * @return bool|array|string
     */
    public static function find($zi, $isBig5 = true)
    {
        $config = [
            'database_type' => 'sqlite',
            'database_file' => __DIR__ . '/data/dict.db'
        ];
        $fieldList = ['zi', 'big5', 'bihua', 'bihua2', 'py', 'py2', 'shengmu', 'yunmu', 'bushou', 'wx', 'wubi'];
        $dataBase = new Medoo($config);
        $where = [
            'zi' => $zi
        ];
        if (false === $isBig5) {
            $where = [
                'big5' => $zi
            ];
        }
        $data = $dataBase->get('bw_cnword', $fieldList, $where);
        if (empty($data)) {
            return false;
        }
        return $data;
    }
}