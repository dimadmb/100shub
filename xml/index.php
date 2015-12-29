<?PHP

/**
 *
 */

$api_modules = array(
	'products' => 'ProductsApi',
	'blog' => 'BlogApi'
);

$module_name = $_GET['module'];

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	if(isset($_GET['action']) && $_GET['action']=='count')
		$action = 'count';
	else
		$action='get';
}
else
{	$data = file_get_contents('php://input');
	if(empty($data) && !empty($_GET['id']))
		$action = 'delete';
	if(!empty($data) && !empty($_GET['id']))
		$action = 'update';
	if(!empty($data) && empty($_GET['id']))
		$action = 'create';
}

if(isset($api_modules[$module_name]) && !empty($action))
{
	$api_class = $api_modules[$module_name];
	
	require_once($api_class.'.class.php');
	$api = new $api_class();
	
	$id = null;
	if(!empty($_GET['id']))
		$id = intval($_GET['id']);
	
	$xml = $api->$action($id);

	header("Content-type: text/xml");
	print $xml;
}