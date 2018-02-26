<?php

namespace App\Services;

use App\Core\Config;

class FoldersServices
{
    public function getFolders()
    {
        $structure = $this->scanFoldersStructure(Config::get('default_storage'));
        $folders = $this->getParentFolders($structure);
        return $folders;
    }

    private function scanFoldersStructure($dir)
    {

        $result = array();

        $cdir = scandir($dir);
        foreach ($cdir as $key => $value)
        {
            if (!in_array($value,array(".","..")))
            {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
                {
                    $result[$value] = $this->scanFoldersStructure($dir . DIRECTORY_SEPARATOR . $value);
                }
            }
        }
        return $result;
    }

    private function getParentFolders(array $structure)
    {
        $arr = [];
        foreach ($structure as $key => $array){
            $name = explode('_', $key);
            $arr[$name[1]]['name'] = $name[0];

            if(!empty($array)) $arr[$name[1]]['not_empty'] = 1;
        }
        return $arr;
    }

}