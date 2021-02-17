<?php

namespace App\Libs\Http;

class JsonResponseBuilder
{
    /**
     * @param  mixed  $data
     * @return \Illuminate\Http\Response
     */
    public function success($data)
    {
        return response()->json($data, 200);
    }

    /**
     * @param  mixed  $data
     * @return \Illuminate\Http\Response
     */
    public function created($data)
    {
        return response()->json($data, 201);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function noContent()
    {
        return response()->noContent();
    }
}
