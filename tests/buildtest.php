<?php

	use PHPUnit\Framework\TestCase;

	class buildTest extends TestCase
	{

		/**
		 * @small
		 */
		public function testCreate() {
			$requestHandler = new RequestHandler();
			$this->expectOutputString('File Created');

			//Bad request. Use it after commenting the escapeshellcmd line in create method. 
			//$requestHandler->processRequest("create","data.txt; nc -nlvp 8000","Hello World");

			//Good request
			$requestHandler->processRequest("create","data.txt","Hello World");
		}

		/**
		 * @small
		 */
		public function testView() {
			$requestHandler = new RequestHandler();

			//Bad Request
			$requestHandler->processRequest("view","../../../../../../../etc/passwd","");

			//Good request
			//$requestHandler->processRequest("view","data.txt","");

			//Validate that the content of output does not contains content
			//from /etc/passwd file.
			$output = ob_get_contents();
			$this->assertThat($output, $this->logicalNot($this->stringContains('root:x:0:0:root:')));
		}

		/**
		 * @small
		 */
		public function testDelete() {
			$requestHandler = new RequestHandler();
			$this->expectOutputString('File Deleted');
			$requestHandler->processRequest("del","data.txt","");
		}

		/**
		 * @small
		 */
		public function testInvalidMethod() {
			$requestHandler = new RequestHandler();
			$this->expectOutputString('Invalid Method');
			$requestHandler->processRequest("something","data.txt","Hello World");
		}

	}




?>
