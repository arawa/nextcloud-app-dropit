<?php

namespace OCA\DropIt\Hooks;

use OCA\Files_Trashbin\Trashbin;

class DeleteHook {
    /**
     * Deletes the file once it will be unshared
     * 
     * @param $hookParams The file informations
     */
    public static function delete($hookParams) {
        Trashbin::move2trash("/DropIt/" . $hookParams['fileTarget']);
    }
}