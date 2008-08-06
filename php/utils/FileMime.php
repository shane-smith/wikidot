<?php
/**
 * Wikidot - free wiki collaboration software
 * Copyright (c) 2008, Wikidot Inc.
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
 * For more information about licensing visit:
 * http://www.wikidot.org/license
 * 
 * @category Wikidot
 * @package Wikidot
 * @version $Id$
 * @copyright Copyright (c) 2008, Wikidot Inc.
 * @license http://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License
 */

class FileMime {

	protected $mime = null;
	protected $contents = "";
	
	protected $mimeMap = array(
		"css"	=> "text/css",
		"html"	=> "text/html",
	);
	
	static protected function execFile($params, $file) {
		$file = escapeshellarg("$file");
		$retval = 0;
		exec("file $params $file", $output, $retval);
		if ($retval == 0) {
			return join("\n", $output);
		} else {
			return null;
		}
	}
	
	static public function mime($file) {
		return self::execFile("-i -b", $file);
	}
	
	static public function description($file) {
		return self::execFile("-b", $file);
	}
}