<?php

class Queries {
	
	private connect = null;

	public function __construct()
	{

	}

	public function query1($name)
	{
		$sql = 'SELECT 100 + sum(t.amount) - (SELECT sum(t.amount) FROM transactions t JOIN persons ON persons.id = t.from_person_id WHERE persons.fullname = "' . $name . '") FROM transactions t JOIN persons ON persons.id = t.to_person_id WHERE persons.fullname = "' .  $name . '"';
	}

	public function query2()
	{
		$sql = 'SELECT * FROM cities LEFT JOIN persons ON cities.id = persons.sity_id LEFT JOIN transactions AS t ON persons.id = t.to_person_id OR persons.id = t.from_person_id GROUP BY count(cities.id) DESC LIMIT 1,1';
	}

	public function query3($city)
	{
		$sql = 'SELECT * FROM transaction 
					WHERE from_person_id 
						IN (SELECT id FROM persons JOIN cities ON id = persons.city_id WHERE cities.name = "' . $city . '") 
						AND to_person_id IN (SELECT id FROM persons JOIN cities ON id = persons.city_id WHERE cities.name = "' . $city . '")';
	}

	private function getResult($sql)
	{

	}

}