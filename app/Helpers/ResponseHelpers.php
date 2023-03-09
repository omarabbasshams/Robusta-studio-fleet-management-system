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
        'message' => $data,
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
        'message' => $data,
    ], $code);
}


function validationErrors($errors, $code = 400)
{
    return response()->json([
        'status' => 'validations_errors',
        'message' => $errors,
    ], $code);
}






