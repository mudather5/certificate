<?php
declare(strict_types = 1);

/**
 *  Class to manage database operations for Account objects
 */
class MemberManager
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
	 * return $db
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
	 * @param Account $user
	 */
	public function add(Member $member)
	{
		
		$query = $this->getDb()->prepare('INSERT INTO users(name, email, password, date) VALUES (:name, :email, :password, :date)');
		$query->bindValue("name", $member->getName(), PDO::PARAM_STR);
		$query->bindValue("email", $member->getEmail(), PDO::PARAM_STR);
        $query->bindValue("password", $member->getPassword(), PDO::PARAM_STR);
        $query->bindValue("date", $member->getDate(), PDO::PARAM_STR);
		// $query->bindValue("confirm", $user->getConfirm(), PDO::PARAM_STR);
		$query->execute();
	}

	/**
	 * Get all accounts
	 *
	 */
	public function getMembers()
	{

		$arrayOfMembers = [];
		$query = $this->getDb()->query('SELECT * FROM users');

		// We retrieve a table containing several associative arrays
		$dataMembers = $query->fetchAll(PDO::FETCH_ASSOC);

		// At each loop turn, we get an associative array for a single account
		foreach ($dataMembers as $dataMember) 
		{
			// We create a new object thanks to the associative array, which is stored in $ arrayOfAccounts
			$arrayOfMembers[] = new Member($dataMember);
		}
		return $arrayOfMembers;
	}
	/**
	 * Get an account by id
	 *
	 * @param integer $id
	 * @return Account
	 */
	public function getMember($id)
	{
		
		$id = (int) $id;
		$query = $this->getDb()->prepare('SELECT * FROM users WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);
		$query->execute();

		$dataMember = $query->fetch(PDO::FETCH_ASSOC);
		return new Member($dataMember);
	}


	public function getCount(){

		$query1 = $this->getDb()->prepare('SELECT COUNT(id) FROM users');
		$query1->execute();
		return $query1->fetchColumn();
	}

	public function getCounts(){

		$query = $this->getDb()->prepare('SELECT COUNT(id) FROM items');
		$query->execute();
		return $query->fetchColumn();
	}


	public function update(Member $member)
	{
		$query = $this->getDb()->prepare('UPDATE users SET name = :name, email = :email, password = :password, date = :date WHERE id = :id');
		$query->bindValue(":name", $member->getName(), PDO::PARAM_STR);
		$query->bindValue(":email", $member->getEmail(), PDO::PARAM_STR);
        $query->bindValue(":password", $member->getPassword(), PDO::PARAM_STR);
        $query->bindValue(":date", $member->getDate(), PDO::PARAM_STR);
		$query->bindValue(":id", $member->getId(), PDO::PARAM_INT);
		$query->execute();
	}


	public function delete(int $id)
	{
		$query = $this->getDb()->prepare('DELETE FROM users WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);		
		$query->execute();
	}






}
