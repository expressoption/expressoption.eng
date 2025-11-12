require __DIR__ . '/vendor/autoload.php';
use MongoDB\Client;
use MongoDB\BSON\ObjectId;


try {
$client = new Client("mongodb://127.0.0.1:27017");
$db = $client->selectDatabase('user_auth');
$users = $db->selectCollection('users');
} catch (Exception $e) {
die('Could not connect to MongoDB: ' . $e->getMessage());
}

function toMongoId($id) {
if (is_string($id) && preg_match('/^[0-9a-f]{24}$/i', $id)) {
return new ObjectId($id);
}
return $id;
}
