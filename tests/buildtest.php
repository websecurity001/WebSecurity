<?php

	use PHPUnit\Framework\TestCase;

	class buildTest extends TestCase
	{
		/**
		 * @small
		 */
		public function testValidNameForCreate() {
			sleep(2);
			$name = "text.txt";
			$requestHandler = new RequestHandler();
			$this->assertSame($requestHandler-> isValidNameForCreate($name),true);
		}

		/**
		 * @small
		 */
		public function testInvalidNameForCreate() {
			$name = "nc -nlvp 8000";
			$requestHandler = new RequestHandler();
			$this->assertSame($requestHandler-> isValidNameForCreate($name),false);
		}

		/**
		 * @small
		 */
		public function testValidNameForView() {
			$name = "text.txt";
			$requestHandler = new RequestHandler();
			$this->assertSame($requestHandler-> isValidNameForView($name),true);
		}

		/**
		 * @small
		 */
		public function testInvalidNameForView() {
			$name = "../../../../../../../etc/passwd";
			$requestHandler = new RequestHandler();
			$this->assertSame($requestHandler-> isValidNameForView($name),false);
		}

	}




?>
