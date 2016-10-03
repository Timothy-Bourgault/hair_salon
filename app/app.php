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
      $stylists = Stylist::getAll();
      return $app['twig']->render('index.html.twig', array('stylist' => $stylists));
    });

    $app->get("/get_stylist/{id}", function($id) use ($app) {
      $selected_stylist = Stylist::find($id);
      $selected_stylist_clients = $selected_stylist->getClients();
      return $app['twig']->render('stylist.html.twig', array('stylist' => $selected_stylist, 'clients' => $selected_stylist_clients));
    });

    $app->post("/add_client", function() use ($app) {
      $name = $_POST['client_name'];
      $stylist_id = $_POST['stylist_id'];
      $new_client = new Client($name, $stylist_id);
      $new_client->save();
      $found_stylist = Stylist::find($stylist_id);
      $clients = $found_stylist->getClients();
      return $app['twig']->render('stylist.html.twig', array('clients' => $clients, 'stylist' => $found_stylist));
    });

    $app->get("/get_client/{id}", function($id) use ($app) {
      $selected_client = Client::find($id);
      return $app['twig']->render('update_client.html.twig', array('clients' => $selected_client));
    });

    return $app;
 ?>
