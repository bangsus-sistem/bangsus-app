<?php

namespace App\Utils\Database;

class MetaParser
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $returnObject
     * @return Object|array
     */
    public static function meta($request, bool $returnObject = true)
    {
        $meta = [
            'sort' => $request->query('sort'),
            'order' => $request->query('order', 'asc'),
            'count' => $request->query('count', 10),
        ];

        return $returnObject ? (object) $meta : $meta;
    }
}
