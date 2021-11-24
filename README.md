# 📜 PHP Šablony pro MySQL Databáze
Užitečné PHP Šablony pro správu MySQL databází.

OOP Třída s metodami pro:
- Vytváření řádků (insert)
- Čtení dat z databáze
- Upravování dat v databázi
- Mazání dat v databázi

### Příklady Použití
Čtení:
- Vytvoření objektu ->  `$read = new database("SELECT * FROM users");`
- Použití metody ->  `$read->db_read();`

Přidávání Řádků:
- Vytvoření objektu ->  `$create = new database("INSERT INTO 'users'('username', 'password', 'credit', 'rank') VALUES ('Admin','heslo','0','admin')");`
- Použití metody ->  `$create->db_create();`

Upravování Řádků:
- Vytvoření objektu ->  `$update = new database("UPDATE users SET username='Test' WHERE id=1");`
- Použití metody ->  `$update->db_update();`

Mazání Řádků:
- Vytvoření objektu ->  `$delete = new database("DELETE FROM users WHERE id=1");`
- Použití metody ->  `$delete->db_delete();`
