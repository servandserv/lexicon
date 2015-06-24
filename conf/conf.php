<?php

$lc = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
$lc->FB_ID = $_SERVER["FB_ID"];
$lc->FB_KEY = $_SERVER["FB_KEY"];
$lc->RUS=array("щ", "Щ", "ё", "ж", "ч", "ш", "ъ" ,"ы" ,"э", "ю", "я", "Ё", "Ж", "Ч", "Ш", "Ъ", "Ы", "Э", "Ю", "Я", "а","б","в","г","д","е","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ь", "А","Б","В","Г","Д","Е","З","И","Й","К","Л","М","Н","О","П","Р","С","Т","У","Ф","Х","Ц","Ь");
$lc->LATIN=array("shh","Shh", "yo","zh","ch","sh","``","y`","e`","yu","ya", "Yo","Zh","Ch","Sh","``","Y`","E`","Yu","Ya", "a","b","v","g","d","e","z","i","j","k","l","m","n","o","p","r","s","t","u","f","x","c","`", "A","B","V","G","D","E","Z","I","J","K","L","M","N","O","P","R","S","T","U","F","X","C","`");
$lc->RUS_LEAGUE = array( "?", "А", "Б", "В", "Г", "Д", "Е", "?" );
$lc->LATIN_LEAGUE = array( "UNDEFINED", "A", "B", "C", "D", "E", "F" );
$lc->once('DB_CONNECT', function() use ($lc) {
	$dsn = "mysql:host=localhost;dbname=lexicon";
	$opt = array(
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	);
	try {
		$pdo = new PDO( $dsn, "lexicon", $_SERVER['MYSQLUSER_LEXICON_PASSWORD'], $opt );
		// связазынный с коннектом построитель запросов
		$lc->DB_QUERY_BUILDER = function( array $params ) use ($lc) {
		    return new \Lexicon\Port\Adaptor\Persistence\QueryBuilder($params);
		};
	} catch (PDOException $e) {
		die('Connection error: '.$e->getMessage());
	}
	return $pdo;
});

$lc->USECASES = "\Lexicon\Application";
$lc->NEXT_RULE = 8;
$lc->REPEAT_RULE = 1;
$lc->REPEAT_START_POSITION = 50;
$lc->NEW_WORDS_BUFFER = 20;
/**$app->EM = new \School\Port\Adaptor\Persistence\PDO\EntityManagerFactory( array(
	"\School\Port\Adaptop\Data\Shool\Links"=>new \School\Port\Adaptor\Persistence\PDO\LinkEntityManager(),
	"\School\Port\Adaptop\Data\Shool\Links\Link"=>new \School\Port\Adaptor\Persistence\PDO\LinkEntityManager(),
	"default" => new \School\Port\Adaptor\Persistence\PDO\ResourceEntityManager()
));
*/
$lc->USER_ENTITY_MANAGER_FACTORY = function( \Lexicon\Port\Adaptor\Data\Lexicon\User $entity = NULL ) use ($lc) {
    $entity = $entity ? $entity : new \Lexicon\Port\Adaptor\Data\Lexicon\User();
    return new \Lexicon\Port\Adaptor\Persistence\PDO\UserEntityManager( $lc->locate("DB_CONNECT"), $entity );
};
$lc->SESSION_ENTITY_MANAGER_FACTORY = function( \Lexicon\Port\Adaptor\Data\Lexicon\Session $entity = NULL ) use ($lc) {
    $entity = $entity ? $entity : new \Lexicon\Port\Adaptor\Data\Lexicon\Session();
    return new \Lexicon\Port\Adaptor\Persistence\PDO\SessionEntityManager( $lc->locate("DB_CONNECT"), $entity );
};
$lc->WORDS_ENTITY_MANAGER_FACTORY = function( \Lexicon\Port\Adaptor\Data\Lexicon\Session $session) use ($lc) {
    return new \Lexicon\Port\Adaptor\Persistence\PDO\WordsEntityManager( $lc->locate("DB_CONNECT"), $session );
};
$lc->FREQ_DICT_ENTITY_MANAGER_FACTORY = function( \Lexicon\Port\Adaptor\Data\Lexicon\Session $session) use ($lc) {
    return new \Lexicon\Port\Adaptor\Persistence\PDO\FreqEnDictEntityManager( $lc->locate("DB_CONNECT"), $session );
};
$lc->DICT_ENTITY_MANAGER_FACTORY = function( \Lexicon\Port\Adaptor\Data\Lexicon\Session $session, \Lexicon\Port\Adaptor\Data\Lexicon\Word $entity = NULL) use ($lc) {
    $entity = $entity ? $entity : new \Lexicon\Port\Adaptor\Data\Lexicon\Word();
    return new \Lexicon\Port\Adaptor\Persistence\PDO\EnRuDictEntityManager( $lc->locate("DB_CONNECT"), $entity );
};
$lc->VALIDATION_HANDLER = function() use ($lc) {
    return new \Happymeal\Port\Adaptor\Data\ValidationHandler();
};

/* classes binding */
\Adaptor_Bindings::setClassMapping(
	array(
		/*"\School\Port\Adaptor\Data\School\Persons\Person" => "\School\Domain\Model\Persons\Person"*/
	)
);

//$token = bin2hex( mcrypt_create_iv( 128, MCRYPT_DEV_RANDOM ) );
//error_log($t);

//error_log( isset( $_SERVER["REMOTE_USER"] ) ? $_SERVER["REMOTE_USER"] : "Unknown" );

