<?php

class Comment
{

    public $errors = [];

    public $id;
    public $user_id;
    public $article_id;
    public $date_create;
    public $comment;
    public $deleted = 0;
    public $connection;

    public function __construct($user_id, $article_id, $text_comment, $deleted = 0)
    {

        if (isset($user_id)) {
            $this->user_id = $user_id;
        } else {
            $this->user_id = '';
        }

        if (isset($article_id)) {
            $this->article_id = $article_id;
        } else {
            $this->article_id = '';
        }

        if (isset($args['date_create'])) {
            $this->date_create = $args['date_create'];
        } else {
            $this->date_create = '';
        }

        if (isset($text_comment)) {
            $this->comment = $text_comment;
        } else {
            $this->comment = '';
        }

        if (isset($deleted)) {
            $this->deleted = $deleted;
        } else {
            $this->deleted = '0';
        }
        $this->connection = DB::get_connect();
    }

    // static public function find_all_per_page($per_page, $offset){
    //     //$offset = self::$database->escape_string($offset);
    //     $sql = "SELECT * FROM " . static::$table_name;
    //     $sql .= " ORDER BY date_create DESC ";
    //     $sql .= " LIMIT {$per_page} ";
    //     $sql .= "OFFSET {$offset} ";
    //     $result = static::find_by_sql($sql);
    //     return $result;
    // }
    static public function find_all_comments_with_email($article_id)
    {
        $static_connection = DB::get_connect();

        $sth = $static_connection->prepare(
            "SELECT * FROM comments JOIN (users) ON (comments.user_id = users.id)
            WHERE article_id = :article_id
            ORDER BY comments.date_create DESC "
        );
        $sth->execute([
            "article_id" => $article_id
        ]);
        return $sth->fetchAll();
    }

    static public function count_all_comments($article_id)
    {
        $static_connection = DB::get_connect();

        $sth = $static_connection->prepare("SELECT COUNT(*) FROM comments WHERE article_id = :article_id ");
        $sth->execute([
            "article_id" => $article_id
        ]);
        $result = $sth->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    }

    static public function find_all_per_page_visible($per_page, $offset)
    {
        //$offset = self::$database->escape_string($offset);
        $sql = "SELECT * FROM " . static::$table_name;
        $sql .= " WHERE deleted = 0 ";
        $sql .= " ORDER BY date_create DESC ";
        $sql .= " LIMIT {$per_page} ";
        $sql .= " OFFSET {$offset} ";
        $result = static::find_by_sql($sql);
        return $result;
    }

    public function attributes()
    {
        $attributes = [];
        foreach (self::$db_columns as $column) {
            if ($column == 'id' or $column == 'date_create') {
                continue;
            }
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function create()
    {
        // Валидация на ввод верных данных
        $this->validate();
        if (!empty($this->errors)) {
            return false;
        }

        $sth = $this->connection->prepare(
            "INSERT INTO comments (
                user_id,
                article_id,
                comment,
                deleted
            ) values (
                :user_id,
                :article_id,
                :comment,
                :deleted
            )"
        );

        $sth->execute([
            'user_id' => $this->user_id,
            'article_id' => $this->article_id,
            'comment' => $this->comment,
            'deleted' => $this->deleted
        ]);

        return !isset($sth->errorInfo()[2]) ? true : $sth->errorInfo()[2];
    }

    protected function validate()
    {
        $this->errors = [];
        if (is_blank($this->comment)) {
            $this->errors[] = "Комментарий не может быть пустым";
        }
        return $this->errors;
    }
}