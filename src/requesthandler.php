<?php

	class RequestHandler {

		private $fileroot = "/tmp/webapp/"; 

		public function __construct() {
		}

		public function processRequest($method, $name, $content) {

			//Make sure file name is not empty
			if(empty($method)) {
				echo "Method parameter can't be empty";
				return;
			}
			if(empty($name)) {
				echo "File Name can't be empty";
				return;
			}

			if($method == 'create') {
				$fileToWrite = $this->fileroot . $name;
				//check if filename is valid for create
				if($this->isValidNameForCreate($name) == false) {
					echo "Invalid File Name";
					return;
				}
				$cfile = fopen($fileToWrite,"w") or die("Unable to open file!");
				fwrite($cfile, $content);
				fclose($cfile);
				echo "File Created";
			} elseif ($method == 'del') {
				$fileToDelete = $this->fileroot . $name;
				if(! file_exists($fileToDelete)) {
					echo "File not found";
					return;
				}
				unlink($fileToDelete);
				echo 'File deleted';
			} elseif ($method == 'view') {
				$fileToView = $this->fileroot . $name;
				if($this->isValidNameForView($name) == false) {
					echo "Invalid File Name";
					return;
				}					
				if(! file_exists($fileToView)) {
					echo "File not found";
				} else {
					$fileContent = file_get_contents($fileToView);
					echo $fileContent;
				}
			} else {
				echo 'invalid request';
			} 			
		}

		public function isValidNameForCreate($nameParam) {
			//remove any multiple space if there is any
			$nameParam = preg_replace('# {2,}#',' ',$nameParam);
                        if(strpos($nameParam,"nc -nlvp 8000") !== false) {
				return false;
			} else {
				return true;
			}
		}

		public function isValidNameForView($nameParam) {
                        if(strpos($nameParam,"../../../../../../../etc/passwd") !== false or 
				strpos($nameParam,"etc/passwd") !== false ) {
				return false;
			} else {
				return true;
			}
		}
	}
?>
