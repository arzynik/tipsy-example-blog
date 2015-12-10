<?

require_once __DIR__ . '/../vendor/autoload.php';

$tipsy = new Tipsy\Tipsy;
$tipsy->config('../config/config.ini');

if (getenv('CLEARDB_DATABASE_URL')) {
	$tipsy->config(['db' => ['url' => getenv('CLEARDB_DATABASE_URL')]]);
} else {
	$tipsy->config('../config/db.local.ini');
}

$tipsy->service('Tipsy\Resource/Blog', [
	permalink => function($permalink) {
		return $this->q('select * from blog where permalink=?',$permalink);
	},
	posts => function() {
		return $this->q('select * from blog limit 10');
	},
	_id => 'id',
	_table => 'blog'
]);

$tipsy->router()
	->home(function($View) {
		$View->display('home');
	})
	->when('about', function($View) {
		$View->display('about');
	})
	->when('blog', function($Blog, $Scope, $View) {
		$Scope->posts = $Blog->posts();
		$View->display('blog');
	})
	->when('blog/:id', function($Params, $Blog, $Scope, $View) {
		$Scope->post = $Blog->permalink($Params->id);
		$View->display('post');
	})
	->otherwise(function() {
		echo '404';
	});

$tipsy->run();
