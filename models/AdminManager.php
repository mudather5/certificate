<?php
declare(strict_types = 1);

/**
 *  Class to manage database operations for Account objects
 */
class AdminManager
{

	private $_db;

	/**
	 * Constructor
	 *
	 * @param PDO $db
	 */
	public function __construct(PDO $db) 
	{
		$this->setDb($db);
	}

	/**
	 * Set the value of $_db
	 *
	 * @param PDO $db
	 * return self
	 */
	public function setDb(PDO $db) 
	{
		$this->_db = $db;
		return $this;
	}

	/**
	 * Get the value of $_db
	 *
	 * @return $_db
	 */
	public function getDb()
	{
		return $this->_db;
	}

	/**
	 * Add account to the database
	 *
	 * @param Account $account
	 */
	public function add(Admin $admin)
	{
		// var_dump($user);die;
		$query = $this->getDb()->prepare('INSERT INTO users(email, password) VALUES (:email, :password)');
		$query->bindValue("email", $admin->getEmail(), PDO::PARAM_STR);
		$query->bindValue("password", $admin->getPassword(), PDO::PARAM_STR);
		$query->execute();
	}

	/**
	 * Get all accounts
	 *
	 */
	public function getAdmins()
	{

		$arrayOfAdmins = [];
		$query = $this->getDb()->query('SELECT * FROM users');

		// We retrieve a table containing several associative arrays
		$dataAdmins = $query->fetchAll(PDO::FETCH_ASSOC);

		//  At each loop turn, we get an associative array for a single account
		foreach ($dataAdmins as $dataAdmin) 
		{
			// We create a new object thanks to the associative array, which is stored in $ arrayOfAccounts
			$arrayOfAdmins[] = new Admin($dataAdmin);
		}
		return $arrayOfAdmins;
	}


	/**
	 * Get an account by id
	 *
	 * @param integer $id
	 * @return Account
	 */
	public function getAdmin(string $name)
	{
		$query = $this->getDb()->prepare('SELECT * FROM users WHERE email = :email');
		$query->bindValue("email", $name, PDO::PARAM_STR);
		$query->execute();

		$dataAdmin = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($dataAdmin as $admin) {
			return new Admin($admin);
		}
	}


}
