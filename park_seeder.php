<?
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "parks_db");
define("DB_USER", "parks_user");
define("DB_PASS", "codeup");

require 'db_connect.php';

// $clearTable = 'TRUNCATE TABLE national_parks';

$query = 'INSERT INTO national_parks (name, location, description, date_established, area_in_acres) VALUES (:name, :location, :description, :date_established, :area_in_acres)';

$stmt = $dbc->prepare($query);

$parks = [
    ['name' => 'Arcadia',        'location' => 'Maine',          'description' =>'I sat up, strangely perplexed. My terror had fallen.',
    'date_established' => '1919-02-26',  'area_in_acres' => '47389.67'],
    ['name' => 'American Samoa', 'location' => 'American Samoa', 'description' =>' A few minutes before, there had only been three real things before me--the immensity of the night and space and nature, my own feebleness and anguish, and the near approach of death. ', 
    'date_established' => '1988-10-31',  'area_in_acres' => '9000.00'],
    ['name' => 'Arches',         'location' => 'Utah',           'description' =>'Now it was as if something turned over, and the point of view altered abruptly.',
    'date_established' => '1929-4-12',   'area_in_acres' => '76518.98'],
    ['name' => 'Bandlands',      'location' => 'South Dakota',   'description' =>'There was no sensible transition from one state of mind to the other.', 
    'date_established' => '1978-11-10',  'area_in_acres' => '242755.94'],
    ['name' => 'Big Bend',       'location' => 'Texas', 'description' =>'I was immediately the self of every day again--a decent, ordinary citizen.',
    'date_established' => '1944-6-12',   'area_in_acres' => '801163.21'],
    ['name' => 'Biscayne',       'location' => 'Florida', 'description' =>'The silent common, the impulse of my flight, the starting flames, were as if they had been in a dream. I asked myself had these latter things indeed happened?',
    'date_established' => '1980-6-28',   'area_in_acres' => '172924.07'],
    ['name' => 'Black Canyon',   'location' => 'Colorado', 'description' =>'At last I could go no further; I was exhausted with the violence of my emotion and of my flight, and I staggered and fell by the wayside.',
    'date_established' => '1999-10-21',  'area_in_acres' => '32950.03'],
    ['name' => 'Bryce Canyon',   'location' => 'Utah', 'description' =>'That was near the bridge that crosses the canal by the gasworks.',
    'date_established' => '1928-2-25',   'area_in_acres' => '35835.08'],
    ['name' => 'Canyonlands',    'location' => 'Utah', 'description' =>'I fell and lay still. ',
    'date_established' => '1964-9-12',   'area_in_acres' => '337597.83'],
    ['name' => 'Capitol Reef',   'location' => 'Utah', 'description' =>'I must have remained there some time. I sat up, strangely perplexed.',  
    'date_established' => '1971-12-18',  'area_in_acres' => '241904.26']
];

foreach ($parks as $park) {
    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location',  $park['location'],  PDO::PARAM_STR);
    $stmt->bindValue(':description',  $park['description'],  PDO::PARAM_STR);
    $stmt->bindValue(':date_established',  $park['date_established'],  PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres',  $park['area_in_acres'],  PDO::PARAM_STR);
    $stmt->execute();
    // echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}


?>