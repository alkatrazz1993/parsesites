<?
class User
{
    /*
    Вывод всех записей из таблицы usersLogin
    */
    public static function selectUsersAllLogin()
    {
        $db = Db::getConnection();
        $sql = "SELECT login FROM users";
        $query = $db->prepare($sql);
        $query->execute();
        $row = $query->fetchALL();
        $sql = null;
        $query = null;
        $db = null;
        return ($row);
    }

    public static function selectLimitUser($user_id)
    {
        $db = Db::getConnection();
        $sql = "SELECT limit_q FROM users WHERE user_id = $user_id";
        $query = $db->prepare($sql);
        $query->execute();
        $row = $query->fetchALL();
        $sql = null;
        $query = null;
        $db = null;
        return ($row);
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        }    
    }

    public static function getUserById($user_id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM users WHERE user_id = :user_id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
    public static function editOnlyHashAndHash_confirmation($user_id, $hash, $hash_confirmation)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE users 
            SET hash = :hash, hash_confirmation = :hash_confirmation WHERE user_id = :user_id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':hash', $hash, PDO::PARAM_STR);
        $result->bindParam(':hash_confirmation', $hash_confirmation, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getAlterTableUser()  
    {
        $db = Db::getConnection();
        $rowWithId = User::getMaxIdUser();
        foreach ($rowWithId as $maxID):
        endforeach;        
        $sql = "ALTER TABLE users AUTO_INCREMENT $maxID";
        $result = $db->prepare($sql);
        return $result->execute();
    }
    public static function editOnlyUsernameAndLogin($user_id, $username, $login)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE users 
            SET username = :username, login = :login WHERE user_id = :user_id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        return $result->execute();
    }
    /*
    Добавление новой строки в таблицу users
    */
    public static function insertUsersForRegistration($username, $login, $hash, $hash_confirmation, $question, $answer, $role, $limit_q)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO users(username, login, hash, hash_confirmation, question, answer, role, limit_q) VALUES (:username,:login,:hash,:hash_confirmation,:question,:answer,:role,:limit_q)";
        $query = $db->prepare($sql);
        $query->bindValue(":username", $username, PDO::PARAM_STR);
        $query->bindValue(":login", $login, PDO::PARAM_STR);
        $query->bindValue(":hash", $hash, PDO::PARAM_STR);
        $query->bindValue(":hash_confirmation", $hash_confirmation, PDO::PARAM_STR);  
        $query->bindValue(":question", $question, PDO::PARAM_STR);
        $query->bindValue(":answer", $answer, PDO::PARAM_STR); 
        $query->bindValue(":role", $role, PDO::PARAM_STR);
        $query->bindValue(":limit_q", $limit_q, PDO::PARAM_STR);    
        $query->execute();
        $sql = null;
        $query = null;
        $db = null;
    }

    public static function getMaxIdUser()  
    {
        $db = Db::getConnection();
        $sql = 'SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row;
    }
}
