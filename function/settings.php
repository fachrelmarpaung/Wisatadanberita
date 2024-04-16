<?php 
class DatabaseConnection{
    protected $dbConnection;
    public function __construct() {
        $this->dbConnection = $this->connect();
    }
    protected $host = "172.207.210.201",
            $username = "v7x6s5a_kehutanan",
            $password = "Lol123!@#",
            $database = "v7x6s5a_kehutanan",
            $connection;

    public function connect(){
        $this->connection = new mysqli($this->host,$this->username,$this->password,$this->database);
        return $this->connection;
        if($this->connection->connect_error){
          die("connection failed: ".$this->connection->connect_error);
        }
    }
}
class General extends DatabaseConnection{

    function ipcheck($ip, $userAgent) {
        $apiUrl = "http://ipinfo.io/{$ip}/json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
        $data = json_decode($response, true);
        curl_close($ch);
    
        // Extract country information from the result
        $country = isset($data['country']) ? $data['country'] : 'Unknown';

        // Prepare insert statement
        $stmt = $this->connect()->prepare("INSERT INTO visitor (ip, useragent, country) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $ip, $userAgent, $country);
    
        // Execute the statement
        $stmt->execute();
    
        // Close statement and connection
        $stmt->close();
        $this->connect()->close();
    }

    // Function Informasi Website
    public function GlobalInfo(){
        $informasi = mysqli_fetch_assoc(mysqli_query($this->connect(), "SELECT * FROM settings where id=1"));
        return $informasi;
    }
    function ViewWisata(){
        $ListWisata = mysqli_query($this->dbConnection, "SELECT * FROM article ORDER BY created_date DESC LIMIT 3;");
        return $ListWisata;
    }
    function LoadAbout(){
        $sql = mysqli_fetch_assoc(mysqli_query($this->connect(), "SELECT * FROM settings where id='1'"));
        return $sql;
    }
    
    function LoadArtikel(){
        $currentUrl = $_SERVER['REQUEST_URI'];
        $urlParts = explode('/', $currentUrl);
        $id = end($urlParts);
        // Memastikan ID adalah angka
        if (is_numeric($id)) {
            // Prevent SQL injection by using prepared statements
            $stmt = $this->dbConnection->prepare("SELECT * FROM article WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            
            return $user;
        } else {
            return null;
        }
    }
    
    function ViewArtikel(){
        $GLOBALS['jlhdataperhalaman'] = 9;
        $data = mysqli_query($this->connect(), "SELECT * from article where Status = '0'");
        $GLOBALS['jumlahdata'] = mysqli_num_rows($data);

        $GLOBALS['jmlhhalaman'] = ceil($GLOBALS['jumlahdata'] / $GLOBALS['jlhdataperhalaman']);
        $GLOBALS['halamanaktif'] = (isset($_GET['p'])) ? $_GET['p'] : 1;

        $GLOBALAS['awalData'] = ($GLOBALS['jlhdataperhalaman'] * $GLOBALS['halamanaktif']) - $GLOBALS['jlhdataperhalaman'];
        // $GLOBALS['totaldata'] = mysqli_num_rows($result);
        $ListBarang = mysqli_query($this->connect(), "SELECT * from article where Status = '0' LIMIT {$GLOBALAS['awalData']},{$GLOBALS['jlhdataperhalaman']}");
        return $ListBarang;
    }
    function ViewBerita(){
        $GLOBALS['jlhdataperhalaman'] = 9;
        $data = mysqli_query($this->connect(), "SELECT * from article where Status = '1'");
        $GLOBALS['jumlahdata'] = mysqli_num_rows($data);

        $GLOBALS['jmlhhalaman'] = ceil($GLOBALS['jumlahdata'] / $GLOBALS['jlhdataperhalaman']);
        $GLOBALS['halamanaktif'] = (isset($_GET['p'])) ? $_GET['p'] : 1;

        $GLOBALAS['awalData'] = ($GLOBALS['jlhdataperhalaman'] * $GLOBALS['halamanaktif']) - $GLOBALS['jlhdataperhalaman'];
        // $GLOBALS['totaldata'] = mysqli_num_rows($result);
        $ListBarang = mysqli_query($this->connect(), "SELECT * from article where Status = '1' LIMIT {$GLOBALAS['awalData']},{$GLOBALS['jlhdataperhalaman']}");
        return $ListBarang;
    }
}

class Admin extends DatabaseConnection{
    function TotalVisitor(){
        $sql = mysqli_fetch_assoc(mysqli_query($this->connect(), "SELECT count(id) as Jmlh FROM visitor "));
        return $sql['Jmlh'];
    }
    function TotalUsers(){
        $sql = mysqli_fetch_assoc(mysqli_query($this->connect(), "SELECT count(id) as Jmlh FROM users where status=1 "));
        return $sql['Jmlh'];
    }
    function TotalAdmin(){
        $sql = mysqli_fetch_assoc(mysqli_query($this->connect(), "SELECT count(id) as Jmlh FROM users where status=0"));
        return $sql['Jmlh'];
    }
    function TotalArticle(){
        $sql = mysqli_fetch_assoc(mysqli_query($this->connect(), "SELECT count(id) as Jmlh FROM article"));
        return $sql['Jmlh'];
    }
    function ViewPengguna(){
        $GLOBALS['jlhdataperhalaman'] = 10;
        $data = mysqli_query($this->connect(), "SELECT * FROM users");
        $GLOBALS['jumlahdata'] = mysqli_num_rows($data);

        $GLOBALS['jmlhhalaman'] = ceil($GLOBALS['jumlahdata'] / $GLOBALS['jlhdataperhalaman']);
        $GLOBALS['halamanaktif'] = (isset($_GET['p'])) ? $_GET['p'] : 1;

        $GLOBALAS['awalData'] = ($GLOBALS['jlhdataperhalaman'] * $GLOBALS['halamanaktif']) - $GLOBALS['jlhdataperhalaman'];
        // $GLOBALS['totaldata'] = mysqli_num_rows($result);
        $ListBarang = mysqli_query($this->connect(), "SELECT * from users LIMIT {$GLOBALAS['awalData']},{$GLOBALS['jlhdataperhalaman']}");
        return $ListBarang;
    }
    function LoadArtikel(){
        $currentUrl = $_SERVER['REQUEST_URI'];
        $urlParts = explode('/', $currentUrl);
        $id = end($urlParts);
        // Memastikan ID adalah angka
        if (is_numeric($id)) {
            // Prevent SQL injection by using prepared statements
            $stmt = $this->dbConnection->prepare("SELECT * FROM article WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            
            return $user;
        } else {
            return null;
        }
    }
    function ViewArtikel(){
        $GLOBALS['jlhdataperhalaman'] = 10;
        $data = mysqli_query($this->connect(), "SELECT * from article");
        $GLOBALS['jumlahdata'] = mysqli_num_rows($data);

        $GLOBALS['jmlhhalaman'] = ceil($GLOBALS['jumlahdata'] / $GLOBALS['jlhdataperhalaman']);
        $GLOBALS['halamanaktif'] = (isset($_GET['p'])) ? $_GET['p'] : 1;

        $GLOBALAS['awalData'] = ($GLOBALS['jlhdataperhalaman'] * $GLOBALS['halamanaktif']) - $GLOBALS['jlhdataperhalaman'];
        // $GLOBALS['totaldata'] = mysqli_num_rows($result);
        $ListBarang = mysqli_query($this->connect(), "SELECT * from article LIMIT {$GLOBALAS['awalData']},{$GLOBALS['jlhdataperhalaman']}");
        return $ListBarang;
    }
    
    private function uploadImages($gambar) {
        if (!$gambar) {
            // No file uploaded
            return null;
        }
    
        $uploadDirectory = '../assets/job/'; // Adjust this to your actual upload directory
        $targetFile = $uploadDirectory . basename($gambar['name']);
    
        // Move the uploaded file to the destination directory
        if (move_uploaded_file($gambar['tmp_name'], $targetFile)) {
            return basename($gambar['name']);
        } else {
            // Handle the case where file move fails
            return false;
        }
    }
    function UpdateAbout($about, $aboutimages) {
        // Check if an image is provided
        if ($aboutimages) {
            // Upload the image and get the image path
            $imagePathwebsite = $this->uploadImages($aboutimages);
        } else {
            $imagePathwebsite = ""; // Set default value if no image provided
        }
        
        // Build the SQL query
        $updateQuery = "UPDATE settings SET About = '$about'";
        if ($aboutimages) {
            // Include the image path in the update query if provided
            $updateQuery .= ", AboutImages = '$imagePathwebsite'";
        }
        $updateQuery .= " WHERE id = '1'";
    
        // Execute the update query
        if ($this->dbConnection->query($updateQuery)) {
            // Data successfully updated
            $_SESSION['edit_response'] = [
                'status' => 'success',
                'message' => 'Tentang berhasil diubah'
            ];
            return true;
        } else {
            // Error in the update process
            $_SESSION['edit_response'] = [
                'status' => 'error',
                'message' => 'Tentang tidak berhasil diubah'
            ];
            return false;
        }
    }
    
    function UpdateSettings($Title,$Lokasi,$Deskripsi,$Deskripsitwo,$Phonenumber,$Icon,$bannerone,$bannertwo,$bannerthree,$Latitude,$Longitude,$Email,$Facebook,$Instagram){
        $Title = $this->dbConnection->real_escape_string($Title);
        $Lokasi = $this->dbConnection->real_escape_string($Lokasi);
        $Deskripsi = $this->dbConnection->real_escape_string($Deskripsi);
        $Deskripsitwo = $this->dbConnection->real_escape_string($Deskripsitwo);
        $Phonenumber = $this->dbConnection->real_escape_string($Phonenumber);
        $Latitude = $this->dbConnection->real_escape_string($Latitude);
        $Longitude = $this->dbConnection->real_escape_string($Longitude);
        $Email = $this->dbConnection->real_escape_string($Email);
        $Facebook = $this->dbConnection->real_escape_string($Facebook);
        $Instagram = $this->dbConnection->real_escape_string($Instagram);

        // Handle image upload
        $imagePathwebsite = "";
        $Bannerone = "";
        $Bannertwo = "";
        $Bannerthree = "";
        if ($Icon) {
            $imagePathwebsite = $this->uploadImages($Icon);
        }
        if ($bannerone) {
            $Bannerone = $this->uploadImages($bannerone);
        }
        if ($bannertwo) {
            $Bannertwo = $this->uploadImages($bannertwo);
        }
        if ($bannerthree) {
            $Bannerthree = $this->uploadImages($bannerthree);
        }

        // Construct the update query
        $updateQuery = "UPDATE settings SET Title = '$Title', Location = '$Lokasi', Deskripsi = '$Deskripsi', Desctwo = '$Deskripsitwo', longitude = '$Longitude', latitude = '$Latitude', Phonenumber = '$Phonenumber', Email = '$Email', Facebook = '$Facebook', Instagram = '$Instagram'";
        
        if ($imagePathwebsite) {
            $updateQuery .= ", Icon = '$imagePathwebsite'";
        }
        if ($Bannerone) {
            $updateQuery .= ", bannerone = '$Bannerone'";
        }
        if ($Bannertwo) {
            $updateQuery .= ", bannertwo = '$Bannertwo'";
        }
        if ($Bannerthree) {
            $updateQuery .= ", bannerthree = '$Bannerthree'";
        }

        $updateQuery .= " WHERE id = '1'";

    
        if ($this->dbConnection->query($updateQuery)) {
            // Data successfully updated
            return true;
        } else {
            // Error in the update process
            return false;
        }

    }
    
    public function DeleteUser($idAdmin){
        // Get the last part of the URL
        $lastPart = array_pop(explode('/', $_SERVER['REQUEST_URI']));

        // Output the last part
        echo $lastPart; // This will output: 1
        // Delete the phone number from the database
        $deleteQuery = "DELETE FROM users WHERE id = '$idAdmin'";
        
        if ($this->dbConnection->query($deleteQuery)) {
            // Phone number successfully deleted
            
            $_SESSION['deletestatus'] = ['status' => 'success', 'message' => 'User berhasil dihapus'];
            header("Location: $lastPart");
        } else {
            // Error in the deletion process
            $_SESSION['deletestatus'] = ['status' => 'error', 'message' => 'Gagal Menghapus User'];
            header("Location: $lastPart");
        }
    }
    public function DeleteArtikel($idArtikel){
        // Get the last part of the URL
        $lastPart = array_pop(explode('/', $_SERVER['REQUEST_URI']));

        // Output the last part
        echo $lastPart; // This will output: 1
        // Delete the phone number from the database
        $deleteQuery = "DELETE FROM article WHERE id = '$idArtikel'";
        
        if ($this->dbConnection->query($deleteQuery)) {
            // Phone number successfully deleted
            $_SESSION['deletestatus'] = ['status' => 'success', 'message' => 'Artikel berhasil dihapus'];
            header("Location: $lastPart");
        } else {
            // Error in the deletion process
            $_SESSION['deletestatus'] = ['status' => 'error', 'message' => 'Gagal Menghapus Artikel'];
            header("Location: $lastPart");
        }
    }

    public function ViewMember(){
        $currentUrl = $_SERVER['REQUEST_URI'];
        $urlParts = explode('/', $currentUrl);
        $id = end($urlParts);
        // Memastikan ID adalah angka
        if (is_numeric($id)) {
            // Prevent SQL injection by using prepared statements
            $stmt = $this->dbConnection->prepare("SELECT * FROM users WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            
            return $user;
        } else {
            return null;
        }
    }
    
    private function uploadimgArtikel($Icon) {
        if (!$Icon) {
            // No file uploaded
            return null;
        }
    
        $uploadDirectory = '../assets/artikel/'; // Adjust this to your actual upload directory
        $targetFile = $uploadDirectory . basename($Icon['name']);
    
        // Move the uploaded file to the destination directory
        if (move_uploaded_file($Icon['tmp_name'], $targetFile)) {
            return basename($Icon['name']);
        } else {
            // Handle the case where file move fails
            return false;
        }
    }
    public function TambahArtikel($Title, $Icon, $Deskripsi, $linkgmaps, $NamaTempat, $Latitude, $Longitude, $postby, $Status) {
        // Handle image upload
        $imagePathwebsite = $this->uploadimgArtikel($Icon);
        $currentDateTime = date('Y-m-d H:i:s');
    
        $query = "INSERT INTO article (Title, Gambar, Status, Deskripsi, linkgmapsm, NamaTempat, Longitude, Latitude, postby, created_date) VALUES ('$Title', '$imagePathwebsite', '$Status', '$Deskripsi', '$linkgmaps', '$NamaTempat','$Longitude', '$Latitude', '$postby', '$currentDateTime')";
    
        $result = $this->dbConnection->query($query);
    
        if ($result) {
            // Set success message
            $_SESSION['register_response'] = [
                'status' => 'success',
                'message' => 'Artikel berhasil ditambahkan'
            ];
            header("Location: ../member/artikel/1");
            exit;
        } else {
            // Set error message
            $_SESSION['register_response'] = [
                'status' => 'error',
                'message' => 'Gagal menambahkan artikel'
            ];
            // Redirect to error page or handle error as needed
            header("Location: ../error-page.php");
            exit;
        }
    }
    
    
    public function EditArtikel($Title, $Icon, $Deskripsi, $Latitude, $Longitude, $Status) {
        
        $currentUrl = $_SERVER['REQUEST_URI'];
        $urlParts = explode('/', $currentUrl);
        $id = end($urlParts);
        // Handle image upload
        $imagePathwebsite = $this->uploadimgArtikel($Icon);
        $currentDateTime = date('Y-m-d H:i:s');
    
        if(isset($Icon)){
            $query = "UPDATE article SET Title='$Title', Gambar='$imagePathwebsite', Status='$Status', Deskripsi='$Deskripsi', Longitude='$Longitude', Latitude='$Latitude', edit_date='$currentDateTime' where id='$id'";
        }else{
            $query = "UPDATE article SET Title='$Title', Status='$Status', Deskripsi='$Deskripsi', Longitude='$Longitude', Latitude='$Latitude', edit_date='$currentDateTime' where id='$id'";
        }
    
        $result = $this->dbConnection->query($query);
    
        if ($result) {
            // Set success message
            $_SESSION['edit_response'] = [
                'status' => 'success',
                'message' => 'Artikel berhasil diubah'
            ];
            header("Location: ../../member/artikel/1");
            exit;
        }
    }
    
}


class Login extends DatabaseConnection {
    public $loginResponse;

    private $Username, $Password;

    public function __construct($Username, $Password) {
        parent::__construct();
        $this->Username = $Username;
        $this->Password = $Password;
    }

    private function verifyUser($Username, $Password) {
        $Username = $this->dbConnection->real_escape_string($Username);

        $query = "SELECT * FROM users WHERE username = '$Username'";
        $result = $this->dbConnection->query($query);

        if ($result && $row = $result->fetch_assoc()) {
            // Verify password
            if (password_verify($Password, $row['password'])) {
                return $row;
            }
        }

        return null;
    }

    public function loginUser() {
        $user = $this->verifyUser($this->Username, $this->Password);

        if ($user) {
            $query = "SELECT * FROM users WHERE username = '$this->Username'";
            $result = mysqli_query($this->dbConnection, $query);
            if ($result) {
                // Successful login
                $userData = mysqli_fetch_assoc($result);
                $_SESSION['user'] = $userData; // Store user information
            } else {
                // Handle query error
                echo "Error: " . mysqli_error($this->dbConnection);
            }
            
            $this->loginResponse = [
                'status' => 'success',
                'message' => 'Login successful',
                'user' => $user
            ];
            header("Location: ./member/dashboard");
            exit;
        } else {
            // Failed login
            $this->loginResponse = [
                'status' => 'error',
                'message' => 'Invalid username or password'
            ];
        }
    }
}

class Users extends DatabaseConnection{

    private function CheckUsername($Username) {
        $Username = $this->dbConnection->real_escape_string($Username);

        $query = "SELECT COUNT(*) as count FROM users WHERE username = '$Username'";
        $result = $this->dbConnection->query($query);

        if ($result && $row = $result->fetch_assoc()) {
            return $row['count'] == 0;
        }

        return false;
    }

    private function encryptPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function checkRegistrationData($Username, $Password) {
        $errors = [];

        if (!$this->CheckUsername($Username)) {
            $errors['register'] = "Maaf, nama pengguna {$Username} itu sudah dipakai. Coba yang lain?";
            $errors['Status'] = 'Username';
        }

        if (empty($Password)) {
            $errors['register'] = 'Kata Sandi tidak boleh kosong';
            $errors['Status'] = 'Password';
        }

        return $errors;
    }

    // Created Users
    private $Username, $Email, $Nohp, $Password, $Status;
    public $response;

    public function __construct($Username, $Email, $Nohp, $Password, $Status) {
        parent::__construct();
        $this->Username = $Username;
        $this->Email = $Email;
        $this->Nohp = $Nohp;
        $this->Password = $Password;
        $this->Status = $Status;
    }

    public function registerUser() {
        $errors = $this->checkRegistrationData($this->Username, $this->Password);

        if (!empty($errors)) {
            
            $this->response = [
                'status' => 'error',
                'message' => 'Invalid input data',
                'errors' => $errors
            ];
            
            // Set error message
            $_SESSION['register_response'] = [
                'status' => 'error',
                'ErrorWich' => isset($errors['Status']) ? $errors['Status'] : null, // Assign the value of $errors['Status'] to 'ErrorWich'
                'message' => "Maaf, nama pengguna '$this->Username' sudah dipakai. Coba yang lain?",
                'error_message' => $this->dbConnection->error
            ];
        } else {
            $hashedPassword = $this->encryptPassword($this->Password);
            $currentDateTime = date('Y-m-d H:i:s');

            $query = "INSERT INTO users (username, email, nohp, password, status, Date_Created) VALUES ('$this->Username', '$this->Email', '$this->Nohp', '$hashedPassword', '$this->Status', '$currentDateTime')"; // Fixed variables usage here
            $result = $this->dbConnection->query($query);
            if ($result) {
                // Set success message
                $_SESSION['register_response'] = [
                    'status' => 'success',
                    'message' => 'Akun Anda berhasil dibuat'
                ];
                header("Location: ../member/pengguna/1");
                exit;
            }         
        }
    }

    public function Edit(){
        $currentUrl = $_SERVER['REQUEST_URI'];
        $urlParts = explode('/', $currentUrl);
        $id = end($urlParts);

        $hashedPassword = $this->encryptPassword($this->Password);

        if(isset($this->Password)){
            $query = "UPDATE users SET email = '$this->Email', nohp = '$this->Nohp', password = '$hashedPassword', status = '$this->Status' where id='$id'"; // Fixed variables usage here
        }else{
            $query = "UPDATE users SET email = '$this->Email', nohp = '$this->Nohp', status = '$this->Status' where id='$id'"; // Fixed variables usage here
        }
        $result = $this->dbConnection->query($query);
        if ($result) {
            // Set success message
            $_SESSION['edit_response'] = [
                'status' => 'success',
                'message' => 'Akun Anda berhasil diedit'
            ];
            header("Location: ../../member/pengguna/1");
            exit;
        }else{
            // Set success message
            $_SESSION['edit_response'] = [
                'status' => 'error',
                'message' => 'Akun Anda tidak berhasil diedit'
            ];
            header("Location: ../../member/pengguna/1");
            exit;
        }         
        
    }
}

?>