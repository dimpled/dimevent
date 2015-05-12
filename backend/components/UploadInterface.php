<?php
namespace app\components;

interface  UploadInterface {
    public function saveFile($fileName,$realFileName,$ref);
}