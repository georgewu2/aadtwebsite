<? require_once("includes/common.php"); 
//session_start();
// require common code
    

// validate submission
if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["password2"]) || empty($_POST["first"]) || empty($_POST["last"]) || empty($_POST["email"]) || empty($_POST["cell"]) || empty($_POST["class"]) || empty($_POST["dorm"]))
  apologize("Please fill in all fields");
        
if ($_POST["password"] != $_POST["password2"])
  apologize("Your passwords do not match!");

// escape username to avoid SQL injection attacks
$username = mysql_real_escape_string($_POST["username"]);

// prevent duplicate usernames
$sql = "SELECT * FROM users WHERE username = '$username'";
$search = mysql_query($sql);

if (mysql_num_rows($search) > 0)
	apologize("That username already exists!");

// hash password
$hash = crypt(mysql_real_escape_string($_POST["password"]));

// scrub all values
$first = mysql_real_escape_string($_POST["first"]);
$last = mysql_real_escape_string($_POST["last"]);
$class = mysql_real_escape_string($_POST["class"]);
$dorm = mysql_real_escape_string($_POST["dorm"]);
$email = mysql_real_escape_string($_POST["email"]);
$cell = mysql_real_escape_string($_POST["cell"]);

// prepare insert row
$sql = "INSERT INTO users (username, hash, first, last, class, dorm, email, cell) VALUES('$username', '$hash', '$first', '$last', '$class', '$dorm', '$email', '$cell')";

// execute query and insert new row
$insert = mysql_query($sql);
    
// if query successful, log user in
if ($insert)
  {
    // determine what id should be assigned to new user
    $id = mysql_insert_id();     

    // remember that user's now logged in by caching user's ID in session
    $_SESSION["id"] = $id;

    // redirect to portfolio
    redirect("home.php");

  }

// else report error
apologize("An error has occured! Please try registering again.");

?>