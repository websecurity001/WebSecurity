<?php

	class RequestHandler {

		private $fileroot = "/tmp/webapp/"; 

		public function __construct() {
			if(! file_exists($this->fileroot)) {
				shell_exec("mkdir -p " . $this->fileroot);
			}
		}

		public function processRequest($method, $name, $content) {

			//Make sure file name is not empty
			if(empty($method)) {
				echo "Empty method parameter";
				return;
			}
			if(empty($name)) {
				echo "File Name can't be empty";
				return;
			}

			if($method == 'view') {
				$this->view($method, $name, $content);
			} elseif ($method == 'create') {
				$this->create($method, $name, $content);
			} elseif ($method == 'del') {
				$this->delete($method, $name, $content);
			} else {
				echo "Invalid Method";
			}
			
		}

		public function view($method, $name, $content) {
			$fileToView = $this->fileroot . $name;
			//Removed escape
			$escaped_command = "cat " . $fileToView;
			echo shell_exec($escaped_command);			
		}

		public function create($method, $name, $content) {

			$name = escapeshellcmd($name);
			$fileToWrite = $this->fileroot . $name;
			$command = "echo " . $content . " > " . $fileToWrite;
			shell_exec($command);
			echo "File Created";
		}

		public function delete($method, $name, $content) {
			$name = escapeshellcmd($name);
			$fileToDelete = $this->fileroot . $name;
			shell_exec("rm " . $fileToDelete);
			echo "File Deleted";
		}

	}
?>
