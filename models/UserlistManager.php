<?php
declare(strict_types = 1);

/**
 *  Class to manage database operations for Account objects
 */
class UserlistManager
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
	public function add(Userlist $userlist)
	{
		// var_dump($user);die;
		$query = $this->getDb()->prepare('INSERT INTO users_list(email, password) VALUES (:email, :password)');
		$query->bindValue("email", $userlist->getEmail(), PDO::PARAM_STR);
		$query->bindValue("password", $userlist->getPassword(), PDO::PARAM_STR);
		$query->execute();
	}

	/**
	 * Get all accounts
	 *
	 */
	public function getUserlists()
	{

		$arrayOfUserlists = [];
		$query = $this->getDb()->query('SELECT * FROM users_list');

		// We retrieve a table containing several associative arrays
		$dataUserlists = $query->fetchAll(PDO::FETCH_ASSOC);

		//  At each loop turn, we get an associative array for a single account
		foreach ($dataUserlists as $dataUserlist) 
		{
			// We create a new object thanks to the associative array, which is stored in $ arrayOfAccounts
			$arrayOfUserlists[] = new Userlist($dataUserlist);
		}
		return $arrayOfUserlists;
	}


	/**
	 * Get an account by id
	 *
	 * @param integer $id
	 * @return Account
	 */
	public function getUserlist(string $email)
	{
		$query = $this->getDb()->prepare('SELECT * FROM users_list WHERE email = :email');
		$query->bindValue("email", $email, PDO::PARAM_STR);
		$query->execute();

		$dataUserlist = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($dataUserlist as $userlist) {
			return new Userlist($userlist);
		}
    }



}
