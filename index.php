<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>KMS</title>
  <link rel="stylesheet" href="./Core/css/KMSNotes.css">
</head>
<body>
  <?php
  require_once("./Core/Database/Database.php");
  require_once("./Core/Services/Curl/CurlService.php");
  require_once("./Core/Page/Page.php");
  require_once("./Core/Router/Router.php");

  use \KMS\Database\Database;
  use \KMS\Curl\CurlService;
  use \KMS\Page\Page;

  $router = new Router();
  $router->route();

  die();

  $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

  // another Router experiment
  // @todo this needs to go in the router class
  $pageRequest = empty($uriSegments[3]) ?  "HomePage" : $uriSegments[3];
  require_once("./Pages/$pageRequest.php");
  $route = '\KMS\Page\\'.$pageRequest;
  $page = new $route("Home Page");
  echo $page->intro();
  // END another Router experiment

  $db = new Database("localhost", "root", "root99", "kms_notes");
  $users = $db->dbQuery("SELECT * FROM users WHERE id=?", [["type" => "i", "value" => 1]]);
  print_r("<br><b>USER:</b></br>");
  print_r($users);
  print_r("<br>");

  print_r("<br><b>_GET vars:</b></br>");
  print_r($_GET);

  print_r("<br>");
  print_r("<br>");

  print_r("<br><br>TEST THE CURL SERVICE<br><br>");
  $curlMe = new CurlService(
    "https://reqbin.com/echo/get/json", // url
    [], // url params
    [ // curl opts
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_HTTPHEADER => [
        "Accept: application/json",
      ]
    ]
  );

  $json = $curlMe->load();
  $decoded = (json_decode($json, true)); // decode json to associative array with true
  print_r($decoded);
  ?>
  <div>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla eleifend laoreet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin massa enim, varius in dapibus vel, aliquam at massa. Curabitur iaculis mi odio, ut bibendum nulla laoreet ac. Vestibulum eget turpis varius, luctus elit ac, tincidunt purus. Nulla malesuada euismod justo, ac sagittis mi facilisis ut. Mauris vel commodo metus, at vestibulum erat. In commodo velit sed dolor suscipit, hendrerit suscipit leo condimentum. Duis eget urna ut ante interdum mattis nec sit amet purus. Aenean bibendum sollicitudin nisl, vel consectetur tellus. Quisque ullamcorper mi id blandit tincidunt. Nullam semper, eros ut scelerisque eleifend, turpis neque placerat ligula, fermentum facilisis lectus lacus quis orci. Aliquam sollicitudin mauris quis lacus facilisis, vitae volutpat sem sagittis.
    </p>
    <p>
      Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer venenatis risus vitae urna accumsan aliquet. Nunc non nisl faucibus, efficitur erat in, accumsan tellus. Donec fringilla nibh in justo viverra posuere. Etiam eget molestie libero, pulvinar rhoncus urna. In venenatis nec dolor non vestibulum. Nunc sed molestie urna. Integer ut velit aliquet, pulvinar leo quis, eleifend odio. Pellentesque varius augue in eros finibus, vitae tempus felis laoreet. Vivamus tempor nisi enim, vel rhoncus diam finibus quis. Proin id lectus ut justo vulputate mattis.
    </p>
    <p>
      Nulla blandit quam eget consequat porttitor. Cras in neque consequat, placerat odio porta, iaculis tellus. Vestibulum condimentum feugiat sem nec consectetur. Nam suscipit lobortis arcu, at fringilla est dapibus vitae. Cras convallis, nisl viverra maximus ultrices, libero turpis gravida dui, vel pretium risus massa et nunc. Sed ante urna, dictum at efficitur sed, egestas in neque. Maecenas semper volutpat odio, vel aliquet dui viverra et. Pellentesque quis mi aliquet, pharetra dolor sit amet, pharetra tortor. Vestibulum iaculis nunc a erat euismod, ut vestibulum magna ultrices. Proin efficitur dignissim sapien quis tempor. Vivamus ac leo sit amet massa finibus consequat in et est. Pellentesque nec velit nibh.
    </p>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla eleifend laoreet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin massa enim, varius in dapibus vel, aliquam at massa. Curabitur iaculis mi odio, ut bibendum nulla laoreet ac. Vestibulum eget turpis varius, luctus elit ac, tincidunt purus. Nulla malesuada euismod justo, ac sagittis mi facilisis ut. Mauris vel commodo metus, at vestibulum erat. In commodo velit sed dolor suscipit, hendrerit suscipit leo condimentum. Duis eget urna ut ante interdum mattis nec sit amet purus. Aenean bibendum sollicitudin nisl, vel consectetur tellus. Quisque ullamcorper mi id blandit tincidunt. Nullam semper, eros ut scelerisque eleifend, turpis neque placerat ligula, fermentum facilisis lectus lacus quis orci. Aliquam sollicitudin mauris quis lacus facilisis, vitae volutpat sem sagittis.
    </p>
    <p>
      Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer venenatis risus vitae urna accumsan aliquet. Nunc non nisl faucibus, efficitur erat in, accumsan tellus. Donec fringilla nibh in justo viverra posuere. Etiam eget molestie libero, pulvinar rhoncus urna. In venenatis nec dolor non vestibulum. Nunc sed molestie urna. Integer ut velit aliquet, pulvinar leo quis, eleifend odio. Pellentesque varius augue in eros finibus, vitae tempus felis laoreet. Vivamus tempor nisi enim, vel rhoncus diam finibus quis. Proin id lectus ut justo vulputate mattis.
    </p>
    <p>
      Nulla blandit quam eget consequat porttitor. Cras in neque consequat, placerat odio porta, iaculis tellus. Vestibulum condimentum feugiat sem nec consectetur. Nam suscipit lobortis arcu, at fringilla est dapibus vitae. Cras convallis, nisl viverra maximus ultrices, libero turpis gravida dui, vel pretium risus massa et nunc. Sed ante urna, dictum at efficitur sed, egestas in neque. Maecenas semper volutpat odio, vel aliquet dui viverra et. Pellentesque quis mi aliquet, pharetra dolor sit amet, pharetra tortor. Vestibulum iaculis nunc a erat euismod, ut vestibulum magna ultrices. Proin efficitur dignissim sapien quis tempor. Vivamus ac leo sit amet massa finibus consequat in et est. Pellentesque nec velit nibh.
    </p>

  </div>
</body>
<footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./Core/JS/LibKMS.js"></script>
  <script>

  </script>
</footer>
</html>
