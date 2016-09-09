<?php
if ($_GET['input']) {
	$lookupURL = "http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input=".trim($_GET['input']);
	$jsonResponse = file_get_contents($lookupURL);
	echo $jsonResponse;
}
elseif($_GET['symbol']){
	$quoteURL = "http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=".trim($_GET['symbol']);
	$quoteResponse = file_get_contents($quoteURL);
	echo $quoteResponse;
}
elseif ($_GET['parameters']) {
	$interactiveAPI = "http://dev.markitondemand.com/MODApis/Api/v2/InteractiveChart/json?parameters=".trim($_GET['parameters']);
	$interactiveResponse = file_get_contents($interactiveAPI);
	echo $interactiveResponse;
}
elseif ($_GET['q']) {
	$accountKey = 'yYVcM/84T9gcAwpGnzMOSnZRpNupaI0+D1KPd1IUtaQ';        
    $ServiceRootURL =  'https://api.datamarket.azure.com/Bing/Search/v1/';
    $WebSearchURL = $ServiceRootURL . 'News?$format=json&Query=';                
    $context = stream_context_create(array(
        'http' => array(
            'request_fulluri' => true,
            'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
        )
    ));
    $request = $WebSearchURL . urlencode( '\'' . $_GET['q'] . '\'');
    $response = file_get_contents($request, 0, $context);
//    $jsonobj = json_decode($response); 
    echo $response;

}
?>