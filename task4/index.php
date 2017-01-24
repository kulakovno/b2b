<?php
/**
 * CONFIGURATION START
 * Вынесем конфигурацию в самом начале, лучше вообще в отдельый файл.
 * Для удобства изменения.
 */
$host = '127.0.0.1'; //alias лучше не использовать, не на всех серверах они настроены.
$user = 'low_access_user'; //попросим админа дать нам юзера только с правами на чтение
$pw = 'pwd_for_low_access';
$db = 'database';
/** CONFIGURATION END */

/**
 * @param mysqli $mysqli
 * @param string $ids
 * @return mixed
 */
function loadUsersData(string $ids, $mysqli)
{
    $data = [];
    $ids = explode(',', $ids);
    /**
     * id может прийти какой угодно, в худшем случае мы словим empty set.
     * Заодно от инъекции избавились.
     */
    $query = $mysqli->prepare('SELECT * FROM users WHERE id = ?');

    foreach ($ids as $uid) {
        $query->bind_param('s', $uid);
        $query->execute();
        $result = $query->get_result();
        /**
         * Мы заранее преполагаем, что строка с юзером одна.
         * While не нужен.
         */
        $obj = $result->fetch_object();
        $data[$obj->id] = $obj->username;
    }

    return $data;
}

/**
 * Вынесем рендер в отдельный метод.
 * Сделаем вывод немного удобней чтобы не нужно было экранировать символы, если придется дописывать больше html кода.
 * @param $data
 */
function render($data)
{
    foreach ($data as $uid => $name) {
        echo <<<HTML
   <a href="show_user.php?id=$uid">$name</a>
HTML;
    }
}

/**
 * Подключимся к бд один раз, вместо использования connect в цикле, в этом просто не смысла.
 */
$connection = new mysqli($host, $user, $pw, $db);
// Как правило, в $_GET['user_ids'] должна приходить строка
// с номерами пользователей через запятую, например: 1,2,17,48

/**
 * Добавим проверку на пустое значение user_ids
 */
$data = loadUsersData($_GET['user_ids'] ?? '', $connection);
$connection->close();
render($data);
