<?php

namespace App\Traits;

trait HelpersTrait {
    function customUploadFile($fileAttr, $path = "")
    {
        $upload_dir = 'uploads/';

        if (request()->file($fileAttr)->isValid()) {
            if (!file_exists(public_path($upload_dir . $path))) {
                mkdir(public_path($upload_dir . $path), 0777, true);
            }

            $file = request()->file($fileAttr);
            //$name = $file->getClientOriginalName();
            $name = microtime(true) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($upload_dir . $path), $name);

            return $path . '/' . $name;
        }

        return false;
    }
}