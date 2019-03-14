<?php
declare(strict_types = 1);

/**
 *  Class to manage database operations for Account objects
 */
class ItemManager
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
	public function add(Item $item)
	{

		$query = $this->getDb()->prepare('INSERT INTO items(name, description, price, country, status, image, cat_id, member_id) VALUES(:name, :description, :price, :country, :status, :image, :cat_id, :member_id)');
		$query->bindValue(":name", $item->getName(), PDO::PARAM_STR);
        $query->bindValue(":description", $item->getDescription(), PDO::PARAM_STR);
        $query->bindValue(":price", $item->getPrice(), PDO::PARAM_STR);
        $query->bindValue(":country", $item->getCountry(), PDO::PARAM_STR);
		$query->bindValue(":status", $item->getStatus(), PDO::PARAM_INT);
		$query->bindValue(":image", $item->getImage(), PDO::PARAM_STR);
		$query->bindValue(":cat_id", $item->getCat_id(), PDO::PARAM_INT);
		$query->bindValue(":member_id", $item->getMember_id(), PDO::PARAM_INT);
        
		$query->execute();
	}

	/**
	 * Get all accounts
	 *
	 */
	public function getItems()
	{

		$arrayOfItems = [];
		$query = $this->getDb()->query('SELECT * FROM items');

		// We retrieve a table containing several associative arrays
		$dataItems = $query->fetchAll(PDO::FETCH_ASSOC);

		//  At each loop turn, we get an associative array for a single account
		foreach ($dataItems as $dataItem) 
		{
			// We create a new object thanks to the associative array, which is stored in $ arrayOfAccounts
			$arrayOfItems[] = new Item($dataItem);
		}
		return $arrayOfItems;
	}

	public function getItemsByCat($cat)
	{

		$arrayOfItems = [];
		$query = $this->getDb()->prepare('SELECT * FROM items WHERE cat_id = :cat');
		$query->bindValue("cat", $cat, PDO::PARAM_INT);
		// We retrieve a table containing several associative arrays
		$query->execute();
		$dataItems = $query->fetchAll(PDO::FETCH_ASSOC);

		//  At each loop turn, we get an associative array for a single account
		foreach ($dataItems as $dataItem) 
		{
			// We create a new object thanks to the associative array, which is stored in $ arrayOfAccounts
			$arrayOfItems[] = new Item($dataItem);
		}
		return $arrayOfItems;
	}

	public function getItemss(){
		$getItems = $this->getDb()->prepare('SELECT * FROM items ORDER BY id DESC');
		$getItems->execute();
		
		$items = $getItems->fetchall();
		return $items;
	}


	/**
	 * Get an account by id
	 *
	 * @param integer $id
	 * @return Account
	 */
	public function getItem($id)
	{
		$id = (int) $id;
		$query = $this->getDb()->prepare('SELECT * FROM items WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);
		$query->execute();

		$dataItem = $query->fetch(PDO::FETCH_ASSOC);
		return new Item($dataItem);
    }
    
    public function update(Item $item)
	{
		$query = $this->getDb()->prepare('UPDATE items SET name = :name, description = :description, price = :price, country = :country, status = :status, image = :image, cat_id = :cat_id, member_id = :member_id WHERE id = :id');
		$query->bindValue(":name", $item->getName(), PDO::PARAM_STR);
		$query->bindValue(":description", $item->getDescription(), PDO::PARAM_STR);
		$query->bindValue(":price", $item->getPrice(), PDO::PARAM_STR);
        $query->bindValue(":country", $item->getCountry(), PDO::PARAM_STR);
		$query->bindValue(":status", $item->getStatus(), PDO::PARAM_INT);
		$query->bindValue(":image", $item->getImage(), PDO::PARAM_STR);
		$query->bindValue(":cat_id", $item->getCat_id(), PDO::PARAM_INT);
		$query->bindValue(":member_id", $item->getMember_id(), PDO::PARAM_INT);
		$query->bindValue(":id", $item->getId(), PDO::PARAM_INT);
		$query->execute();
    }
    
    public function delete(int $id)
	{
		$query = $this->getDb()->prepare('DELETE FROM items WHERE id = :id');
		$query->bindValue("id", $id, PDO::PARAM_INT);		
		$query->execute();
	}


	


}
