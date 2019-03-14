<?php
declare(strict_types = 1);

/**
 *  Class to manage database operations for Account objects
 */
class CategoryManager
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
	public function add(Category $category)
	{
		$query = $this->getDb()->prepare('INSERT INTO categories(name, description, ordering, comments) VALUES (:name, :description, :ordering, :comments)');
		$query->bindValue("name", $category->getName(), PDO::PARAM_STR);
        $query->bindValue("description", $category->getDescription(), PDO::PARAM_STR);
        $query->bindValue("ordering", $category->getOrdering(), PDO::PARAM_INT);
        $query->bindValue("comments", $category->getComments(), PDO::PARAM_STR);
        
		$query->execute();
	}

	/**
	 * Get all accounts
	 *
	 */
	public function getCategories()
	{

		$arrayOfCategories = [];
		$query = $this->getDb()->query('SELECT * FROM categories ORDER BY Ordering ASC');

		// We retrieve a table containing several associative arrays
		$dataCategories = $query->fetchAll(PDO::FETCH_ASSOC);

		//  At each loop turn, we get an associative array for a single account
		foreach ($dataCategories as $dataCategory) 
		{
			// We create a new object thanks to the associative array, which is stored in $ arrayOfAccounts
			$arrayOfCategories[] = new Category($dataCategory);
		}
		return $arrayOfCategories;
	}


	/**
	 * Get an account by id
	 *
	 * @param integer $id
	 * @return Account
	 */
	public function getCategory($id)
	{
		$id = (int) $id;
		$query = $this->getDb()->prepare('SELECT * FROM categories WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);
		$query->execute();

		$dataCategory = $query->fetch(PDO::FETCH_ASSOC);
		return new Category($dataCategory);
	}
	
    
    
    public function update(Category $category)
	{
		$query = $this->getDb()->prepare('UPDATE categories SET name = :name, description = :description, ordering = :ordering, comments = :comments  WHERE id = :id');
		$query->bindValue(":name", $category->getName(), PDO::PARAM_STR);
		$query->bindValue(":description", $category->getDescription(), PDO::PARAM_STR);
		$query->bindValue(":ordering", $category->getOrdering(), PDO::PARAM_INT);
		$query->bindValue(":comments", $category->getComments(), PDO::PARAM_STR);
		$query->bindValue(":id", $category->getId(), PDO::PARAM_INT);
		$query->execute();
    }
    
    public function delete(int $id)
	{
		$query = $this->getDb()->prepare('DELETE FROM categories WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);		
		$query->execute();
	}


}
