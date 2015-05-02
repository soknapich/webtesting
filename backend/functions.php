<?php
	
	$CONFIG = array(
		'dsn' => 'mysql:dbname=web-test;host=127.0.0.1',
		'user' => 'root',
		'pass' => '',
	);

	/**
	 * Returns a PDO connection to the current database
	 */
	function db () {
		static $dbh = null;
		global $CONFIG;

		if ( $dbh === null ) {
			try {
				$dbh = new PDO( $CONFIG['dsn'], $CONFIG['user'], $CONFIG['pass'] );
			} catch ( PDOException $e ) {
				die( 'Database error' );
			}
		}

		return $dbh;
	}

	/**
	 * Escapes string for HTML output
	 */
	function esc_html ( $text ) {
		return htmlentities( $text, ENT_QUOTES );
	}

	/**
	 * Fetches a list of books as an array
	 */
	function getBooks () {
		$statement = db()->prepare( 'SELECT title, author FROM books' );
		return $statement->execute()? $statement->fetchAll( PDO::FETCH_ASSOC ): array();
	}

	/**
	 * Fetches a list of popular checkouts as an array
	 */
	function getBooksPopular () {
		// To be implemented
		$statement = db()->prepare( 'SELECT
                            b.title,
                            b.author,
                            COUNT(b.book_id) count
                    FROM
                            books b,
                            checkouts ck
                    WHERE
                            b.book_id = ck.book_id
                    GROUP BY
                            b.title,
                            b.author
                    ORDER BY COUNT(b.book_id) DESC' );
		return $statement->execute()? $statement->fetchAll( PDO::FETCH_ASSOC ): array();
	}

	/**
	 * Fetches a list of recent checkouts as an array
	 */
	function getBooksRecent () {
		// To be implemented
		$statement = db()->prepare( 'SELECT
				b.title,
				b.author,
				ck.`timestamp`
                    FROM
				books b,
				checkouts ck
                    WHERE
				b.book_id = ck.book_id
                    ORDER BY ck.`timestamp` DESC' );
		return $statement->execute()? $statement->fetchAll( PDO::FETCH_ASSOC ): array();
	
	}
        
        
        /**
	 * Fetches a list of checkout book ID < 5 time
	 */
	function getBookId () {
		// To be implemented
		$statement = db()->prepare( 'SELECT
                                                books.book_id,
                                                books.title,
                                                COUNT(checkouts.book_id) count
                                        FROM
                                                books
                                        LEFT JOIN checkouts ON books.book_id = checkouts.book_id

                                        GROUP BY books.book_id,
                                                books.title

                                        HAVING COUNT(checkouts.book_id)<5' );
		return $statement->execute()? $statement->fetchAll( PDO::FETCH_ASSOC ): array();
	
	}
	
	
	function checkFiveRecode($book_id){
		$sql = "SELECT COUNT(*) book_id FROM checkouts WHERE book_id=$book_id"; 
		$result = db()->prepare($sql); 
		$result->execute(); 
		return $result->fetchColumn(); 
	}
        

