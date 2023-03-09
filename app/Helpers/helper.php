<?php

if (!function_exists('saveOrUpdateModel')) {
    function saveOrUpdateModel($params, $model)
    {
        foreach ($params as $key => $param) {
            if ($key != '_token' && $key != 'files' && $key != '_method') {

                $model->$key = $param;

            }
        }

        $model->save();
        return $model;
    }
}
