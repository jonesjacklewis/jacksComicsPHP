<?php

class Comic{

    function __construct($details){
        $this->isbn = urldecode($details[0]);
        $this->title = urldecode($details[1]);
        $this->mainCharacter = urldecode($details[2]);
        $this->author = urldecode($details[3]);
        $this->year = urldecode($details[4]);
        $this->link = urldecode($details[5]);
        $this->rating = urldecode($details[6]);
        $this->image = urldecode($details[7]);
    }


    function get_isbn(){
        return $this->isbn;
    }

    function set_isbn($isbn){
        $this->isbn = $isbn;
    }

    function get_title(){
        return $this->title;
    }

    function set_title($title){
        $this->title = $title;
    }

    function get_main_character(){
        return $this->mainCharacter;
    }

    function set_main_character($mainCharacter){
        $this->mainCharacter = $mainCharacter;
    }

    function get_author(){
        return $this->author;
    }

    function set_author($author){
        $this->author = $author;
    }

    function get_year(){
        return $this->year;
    }

    function set_year($year){
        $this->year = $year;
    }

    function get_link(){
        return $this->link;
    }

    function set_link($link){
        $this->link = $link;
    }

    function get_rating(){
        return $this->rating;
    }

    function set_rating($rating){
        $this->rating = $rating;
    }

    function get_image(){
        return $this->image;
    }

    function set_image($image){
        $this->image = $image;
    }

    function create_div($class="card"){
        $stars = str_repeat("⭐", intval($this->rating));
        return "<div class='$class'>
        
        <img src='$this->image' alt='Book cover of $this->title'>

        <h2>$this->title</h2>

        <h3>Main Character: $this->mainCharacter</h3>
        <h3>Author: $this->author</h3>
        <h3>Year: $this->year</h3>

        <p>Rating: $stars</p>


        <ul>
            <li><a href='$this->link' target='_blank'>Buy on Amazon</a></li>
            <li><a href='./viewMore.php?isbn=$this->isbn'>View On Own</a></li>
            <li><a href='./delete.php?isbn=$this->isbn'>Delete</a></li>
            <li><a href='./edit.php?isbn=$this->isbn'>Edit</a></li>
        </ul>

        
        
        </div>";
    }

    function __toString(){
        return "{'isbn':'$this->isbn','title':'$this->title','mainCharacter':'$this->mainCharacter','author':'$this->author','year':$this->year,'link':'$this->link','rating':$this->rating,'image':'$this->image'}";
    }

}


?>