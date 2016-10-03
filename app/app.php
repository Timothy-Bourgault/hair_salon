<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Client.php';
    require_once __DIR__.'/../src/Stylist.php';

    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app['debug']=true;

    $app->get("/", function() use ($app) {
      return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/add_stylist", function() use ($app) {
      $name = $_POST['stylist_name'];
      $scheduled_days = $_POST['stylist_scheduled_days'];
      $specialties = $_POST['stylist_specialties'];
      $new_stylist = new Stylist($name, $scheduled_days, $specialties);
      $new_stylist->save();
      $new_stylist = Stylist::getAll();
      return $app['twig']->render('index.html.twig', array('stylists' => $new_stylist));
    });

    $app->post("/add_client", function() use ($app) {
      $name = $_POST['client_name'];
      $client = new Client($name);
      $client->save();
      return $app['twig']->render('/stylist.html.twig');
    });

    $app->get("/filter_by_client/{client_name}", function($client_name) {
    });

    // $app->delete('/'

    return $app;
 ?>
