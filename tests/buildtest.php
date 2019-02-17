<?php
	use PHPUnit\Framework\TestCase;

	class buildTest extends TestCase
	{

		public function testValidNameForCreate() {
			$name = "text.txt";
			$requestHandler = new RequestHandler();
			$this->assertSame($requestHandler-> isValidNameForCreate($name),true);
		}

		public function testInvalidNameForCreate() {
			$name = "nc -nlvp 8000";
			$requestHandler = new RequestHandler();
			$this->assertSame($requestHandler-> isValidNameForCreate($name),false);
		}

		public function testValidNameForView() {
			$name = "text.txt";
			$requestHandler = new RequestHandler();
			$this->assertSame($requestHandler-> isValidNameForView($name),true);
		}

		public function testInvalidNameForView() {
			$name = "../../../../../../../etc/passwd";
			$requestHandler = new RequestHandler();
			$this->assertSame($requestHandler-> isValidNameForView($name),false);
		}

	}




?>
