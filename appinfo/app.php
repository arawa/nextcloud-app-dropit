<?php
/**
 * @copyright Copyright (c) 2017, Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

use OCA\DropIt\Hooks\DeleteHook;

$app = \OC::$server->query(\OCA\DropIt\AppInfo\Application::class);

\OCA\Files\App::getNavigationManager()->add(function () {
	$l = \OC::$server->getL10N('dropit');
	return [
		'id' => 'dropit',
		'appname' => 'dropit',
		'icon' => 'dropit',
		'script' => 'list.php',
		'order' => 1,
		'name' => $l->t('DropIt'),
		'classes' => 'pinned',
	];
});

// Rajouter ici l'appel hook::connect
// On se branche sur le Hook pour supprimer le fichier après son départage
\OC_Hook::connect(\OCP\Share::class, "post_unshare", DeleteHook::class, "delete");

//filesource : id dans la table file_cache (identifie le fichier source)
//filetarget : nom du fichier pour l'user avec lequel on a partagé

//chercher une fonction qui me donne le chemin d'un fichier passé en paramètre
//ensuite, utiliser unlink() de Storage.php dans mon hook pour supprimer un fichier