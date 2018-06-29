<html>
<?php+

session_start();
        require 'autoload.php';
        use Abraham\TwitterOAuth\TwitterOAuth;
        define('CONSUMER_KEY', 'KBvyAoPZBP0fHyFtTgY60Yg1h'); 
        define('CONSUMER_SECRET', 'meBvV8S8WwgafdP9NGyKYz443MY8DK0uq37Oe6P8F3dEz5XLTI');
        define('OAUTH_CALLBACK', 'callback.php');
        
        if(!isset($_SESSION['access_token'])){
           $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
           $request_token = $connection.oauth('oauth/request_token',array('oauth_callback'.OAUTH_CALLBACK));
           $_SESSION['oauth_token']          = $request_token['oauth_token'];
	   $_SESSION['oauth_token_secret']   = $request_token['oauth_token_secret'];
           $url= $connection.url('oauth/authorize',array('oauth_token'.$request_token['oauth_token']));
           echo $url;
        }
        ?>
</html>