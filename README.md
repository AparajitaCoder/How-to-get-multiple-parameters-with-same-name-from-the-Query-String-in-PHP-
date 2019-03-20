# How-to-get-multiple-parameters-with-same-name-from-the-Query-String-in-PHP-
We look at different way in PHP to retrieve the query string and its parameter values from a URL. 


1) Query String Of Current URL:

echo $_SERVER['QUERY_STRING'];
// Output: key1=value1&key2=value2

2) Query String From A String:

echo parse_url('http://www.test.com/?key1=value1&key2=value2', PHP_URL_QUERY);
// Output: key1=value1&key2=value2

3) Query String Parameters As An Array:

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

4) Handling Duplicate Keys In A Query String:

URL format : https://www.test.in/?search_by=order&start_date=2019-01-01&end_date=2019-03-20&customer_id=&laundryid=1&laundryid=2&laundryid=3&laundryid=4&laundryid=8&laundryid=10&laundryid=11&laundryid=12

Here we have multiple keys with same name, to solve this simply call this function fetch_value_from_url() where ever you get duplicate keys.

Usage : 

See the index.php file, or use this below:

<?php
function fetch_value_from_url(){
      
    $query = $_SERVER['QUERY_STRING'];
		$vars = array();
		$second = array();
		foreach (explode('&', $query) as $pair) {
		    list($key, $value) = explode('=', $pair);
		    if('' == trim($value)){
		        continue;
		    }
		    if (array_key_exists($key, $vars)) {
		        if (!array_key_exists($key, $second))
		            $second[$key][] .= $vars[$key];
		        $second[$key][] = $value;
		    } else {
		        $vars[$key] = urldecode($value);
		    }
		}
    return array_merge($vars, $second);
}






