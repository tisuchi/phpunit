<?php 

class UserTest extends \PHPUnit\Framework\TestCase{

	protected $user; 

	public function setUp()
	{
		$this->user = new \App\Models\User;
	}

	public function test_a_user_has_first_name()
	{
		$this->user->setFirstName($this->every_input_should_trim('Thouhedul'));

		$this->assertEquals($this->user->getFirstName(), 'Thouhedul');
	}

	public function test_a_user_has_last_name()
	{
		$this->user->setLastName($this->every_input_should_trim('Islam'));

		$this->assertEquals($this->user->getLastName(), 'Islam');
	}

	public function test_a_user_has_full_name()
	{
		$this->user->setFullName($this->every_input_should_trim('Thouhedul Islam'));

		$this->assertEquals($this->user->getFullName(), 'Thouhedul Islam');
	}

	public function every_input_should_trim($text)
	{
		$salt= "      ";

		return $salt . $text . $salt;
	}

	public function test_a_user_can_set_email()
	{
		$email = 'tisuchi@gmail.com';

		$this->user->setEmail($email);

		$this->assertEquals($this->user->getEmail(), $email);
	}

	public function test_a_email_variable_should_contain_corrent_value()
	{
		$this->user->setFirstName('Thouhedul');
		$this->user->setLastName('Islam');
		$this->user->setEmail('tisuchi@gmail.com');

		$emailVariables = $this->user->getEmailVariables();

		$this->assertArrayHasKey('full_name', $emailVariables);
		$this->assertArrayHasKey('email', $emailVariables);

		$this->assertEquals($emailVariables['full_name'], 'Thouhedul Islam');
		$this->assertEquals($emailVariables['email'], 'tisuchi@gmail.com');
	}
}