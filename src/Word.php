<?php

namespace fuqt08;

use Medoo\Medoo;

class Word
{

    public static function find($zi)
    {
        $config = [
            'database_type' => 'sqlite',
            'database_file' => __DIR__ . '/data/dict.db'
        ];
        $dataBase = new Medoo($config);
        $data = $dataBase->get('bw_cnword', '*', ['zi' => $zi]);
        if (empty($data)) {
            return false;
        }
        return $data;
    }
}