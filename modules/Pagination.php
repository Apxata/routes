<?php

class Pagination
{
    public $current_page;
    public $per_page;
    public $total_count;

    public function __construct($page = 1, $per_page = 20, $total_count = 0)
    {
        $this->current_page = (int)$page;
        $this->per_page = (int)$per_page;
        $this->total_count = (int)$total_count;
    }

    public function offset()
    {
        return $this->per_page * ($this->current_page - 1);
    }

    public function page_links($url = "")
    {
        $output = "";
        if ($this->total_pages() > 1) {

            $output .= "<div class=\"row col-sm-6 col-sm-offset-3\">";
            $output .= "<nav aria-label=\"Page navigation\">";
            $output .= "<ul class=\"pagination\">";
            $output .= $this->previous_link($url);
            $output .= $this->number_links($url);
            $output .= $this->next_link($url);
            $output .= "</ul>";
            $output .= "</nav>";
            $output .= "</div>";

        }
        return $output;
    }

    public function total_pages()
    {
        return ceil($this->total_count / $this->per_page);
    }

    public function previous_link($url = "")
    {
        $link = "";
        if ($this->previous_page() != false) {
            $link .= "<li class=\"previous\">";
            $link .= "<a href=\"{$url}?page={$this->previous_page()}\" ";
            $link .= "aria-label=\"Previous\"> ";
            $link .= "<span aria-hidden=\"true\">&laquo;</span>";
            $link .= "Предыдущая";
            $link .= "</a>";
            $link .= "</li>";
        } else {
            $link .= "<li class=\"disabled\">";
            $link .= "<span href=\"{$url}?page={$this->previous_page()}\" ";
            $link .= "aria-label=\"Previous\"> ";
            $link .= "<span aria-hidden=\"true\">&laquo;</span>";
            $link .= "Предыдущая";
            $link .= "</span>";
            $link .= "</li>";
        }
        return $link;
    }

    public function previous_page()
    {
        $prev = $this->current_page - 1;
        return ($prev > 0) ? $prev : false;
    }

    public function number_links($url = "")
    {
        $output = "";
        for ($i = 1; $i <= $this->total_pages(); $i++) {
            if ($i == $this->current_page) {
                $output .= "<li class=\"active\"> ";
                $output .= "<span href=\"{$url}?page={$i}\">{$i}</span> ";
                $output .= "</li>";
            } else {
                $output .= "<li>";
                $output .= "<a href=\"{$url}?page={$i}\">{$i}</a>";
                $output .= "</li>";
            }
        }
        return $output;
    }

    public function next_link($url = "")
    {
        $link = "";
        if ($this->next_page() != false) {
            $link .= "<li class=\"next\">";
            $link .= "<a href=\"{$url}?page={$this->next_page()}\" ";
            $link .= "aria-label=\"Next\"> ";
            $link .= "Следующая";
            $link .= "<span aria-hidden=\"true\">&raquo;</span>";
            $link .= "</a>";
            $link .= "</li>";
        } else {
            $link .= "<li class=\"disabled\">";
            $link .= "<span href=\"{$url}?page={$this->next_page()}\" ";
            $link .= "aria-label=\"Next\"> ";
            $link .= "Следующая";
            $link .= "<span aria-hidden=\"true\">&raquo;</span>";
            $link .= "</span>";
            $link .= "</li>";
        }
        return $link;
    }

    public function next_page()
    {
        $next = $this->current_page + 1;
        return ($next <= $this->total_pages()) ? $next : false;
    }
}

?>