<?php

class UserEntity
{
	protected	$id;
	protected	$username;
	protected	$password;

	public function	__construct(array $data)
	{
	}

	public function getId()
	{
		return ($this->id);
	}

	public function getUsername()
	{
		return ($this->username);
	}

	public function getPassword()
	{
		return ($this->password);
	}
}
