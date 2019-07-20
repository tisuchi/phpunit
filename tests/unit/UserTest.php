<?php 

class UserTest extends \PHPUnit\Framework\TestCase{

	public function test_a_user_has_first_name()
	{
		$user = new \App\Models\User;

		$user->setFirstName($this->every_input_should_trim('Thouhedul'));

		$this->assertEquals($user->getFirstName(), 'Thouhedul');
	}

	public function test_a_user_has_last_name()
	{
		$user = new \App\Models\User;

		$user->setLastName($this->every_input_should_trim('Islam'));

		$this->assertEquals($user->getLastName(), 'Islam');
	}

	public function test_a_user_has_full_name()
	{
		$user = new \App\Models\User;

		$user->setFullName($this->every_input_should_trim('Thouhedul Islam'));

		$this->assertEquals($user->getFullName(), 'Thouhedul Islam');
	}

	public function every_input_should_trim($text)
	{
		$salt= "      ";

		return $salt . $text . $salt;
	}

	public function test_a_user_can_set_email()
	{
		$email = 'tisuchi@gmail.com';

		$user = new \App\Models\User;
		
		$user->setEmail($email);

		$this->assertEquals($user->getEmail(), $email);
	}
}