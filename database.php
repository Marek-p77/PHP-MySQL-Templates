<?php // Šablony pro správu MySQL databází

class database { // Správa Uživatelů

    function __construct($sql_cmd) { // Konstruktor Objektů
        $this->db_hostname = "x"; // Hostname a port databáze
        $this->db_username = "x"; // Uživatelské jméno databáze
        $this->db_password = "x"; // Heslo k uživateli databáze
        $this->db_database = "x"; // Jméno databáze
        $this->sql_cmd = $sql_cmd; // SQL Command
    }

    function db_read() { // Funkce pro čtení dat z databáze
        $conn = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_database);
        if ($conn->connect_error) {
            die("Nepodařilo se připojit k databázi: " . $conn->connect_error); // Error zpráva
        }
        $sql = $this->sql_cmd; // Vykonání SQL příkazu
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "ID: ".$row["id"]." - Účet: ".$row["username"]."<br>"; // Vypsání dat
            }
        } else {
            echo "Žádný výsledek"; // Error zpráva při žádných výsledcích
        }
        $conn->close();
    }

    function db_update() { // Funkce pro upravení dat v databázi
        $conn = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_database);
        if ($conn->connect_error) {
            die("Nepodařilo se připojit k databázi: " . $conn->connect_error); // Error zpráva
        }
        $sql = $this->sql_cmd; // Vykonání SQL příkazu

        if ($conn->query($sql) === TRUE) {
            echo "Databáze úspěšně upravena<br>"; // Zpráva pokud se vše podařilo
        } else {
            echo "Error při upravování databáze: " . $conn->error;
        }
        $conn->close();
    }

    function db_create() { // Funkce pro přidávání dat do databáze
        $conn = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_database);
        if ($conn->connect_error) {
            die("Nepodařilo se připojit k databázi: " . $conn->connect_error);
        }
        $sql = $this->sql_cmd; // Vykonání SQL příkazu

        if ($conn->query($sql) === TRUE) {
            echo "Nový řádek úspěšně vytvořen<br>"; // Zpráva pokud se vše podařilo
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function db_delete() { // Funkce pro mazání dat z databáze
        $conn = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_database);
        if ($conn->connect_error) {
            die("Nepodařilo se připojit k databázi: " . $conn->connect_error); // Error zpráva
        }
        $sql = $this->sql_cmd; // Vykonání SQL příkazu

        if ($conn->query($sql) === TRUE) {
            echo "Data úspěšně smazána<br>"; // Zpráva pokud se vše podařilo
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Příklad Upravení Dat:
$update = new database("UPDATE users SET username='Test' WHERE id=1"); // Vytvoření objektu
//$update->db_update(); // Vykonání Funkce

// Příklad Vytvoření Dat:
$create = new database("INSERT INTO `users`(`username`, `password`, `credit`, `rank`) VALUES ('Admin','heslo','0','admin')"); // Vytvoření objektu
//$create->db_create(); // Vykonání Funkce

// Příklad Čtení Dat:
$read = new database("SELECT * FROM users"); // Vytvoření objektu
$read->db_read(); // Vykonání Funkce

// Příklad Mazání Dat
$delete = new database("DELETE FROM users WHERE id=1"); // Vytvoření Objektu
//$delete->db_delete(); // Vykonání Funkce
