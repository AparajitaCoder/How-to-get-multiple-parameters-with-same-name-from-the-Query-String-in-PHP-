<?php 

//fetch the values from the query string
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

   
?>