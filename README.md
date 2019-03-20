# How-to-get-multiple-parameters-with-same-name-from-the-Query-String-in-PHP-
We look at different way in PHP to retrieve the query string and its parameter values from a URL.

Query String Of Current URL:

echo $_SERVER['QUERY_STRING'];
// Output: key1=value1&key2=value2

Query String From A String:

echo parse_url('http://www.test.com/?key1=value1&key2=value2', PHP_URL_QUERY);
// Output: key1=value1&key2=value2

Query String Parameters As An Array:

echo $_GET['key1']; // Output: value1

Parsing A Query String:

// method #1
parse_str($_SERVER['QUERY_STRING'], $output);

// method #2
parse_str(parse_url('http://www.test.com/?key1=value1&key2=value2', PHP_URL_QUERY), $output);

echo print_r($output, TRUE);

// Output: 
Array (
    ['key1'] => "value1"
    ['key2'] => "value2"
)

Handling Duplicate Keys In A Query String:

Simply call this function fetch_value_from_url() where ever you get duplicate keys.






