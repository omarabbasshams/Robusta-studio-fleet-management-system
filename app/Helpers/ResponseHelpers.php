<?php

/**
 * Response on success data
 *
 * @param array $data
 * @param integer $code
 * @return Response
 */
function responseSuccessData($data, $code = 200)
{
    return response()->json([
        'status' => 'success',
        'data' => $data,
    ], $code);
}



/**
 * Response on success data
 *
 * @param array $data
 * @param integer $code
 * @return Response
 */
function responseErrorData($data, $code = 200)
{
    return response()->json([
        'status' => 'error',
        'data' => $data,
    ], $code);
}






