<?php
enum UserLevel {
    case NotLogged;
    case CanteenAdmin;
    case Customer;
}

class Address {
    public $num;
    public $avenue;
    public $municipality;
    public $postalCode;

    public function __construct($n, $a, $m, $p) {
        $this->num = $n;
        $this->avenue = $a;
        $this->municipality = $m;
        $this->postalCode = $p;
    }

    public function getFormatted() {
        return $this->avenue . " n." . $this->num . ", " . $this->postalCode . " " . $this->municipality;
    }
}

class Canteen {
    private $id;
    private $email;
    private $name;
    private $desc;
    private $address;
    private $long;
    private $lat;
    private $maxSeatings;
    private $img;
    private $category;
    private $avgReviews;
    private $numReviews;

    public function __construct($id, $email, $name, $desc, $number, $avenue, $municipality, $postalCode, $lat, $long, $maxSeatings, $img, $category, $avgReviews, $numReviews) {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->desc = $desc;
        $this->address = new Address($number, $avenue, $municipality, $postalCode);
        $this->long = $long;
        $this->lat = $lat;
        $this->maxSeatings = $maxSeatings;
        $this->img = empty($img) ? "" : $img;
        $this->category = $category;
        $this->avgReviews = $avgReviews;
        $this->numReviews = $numReviews;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->desc;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getLong() {
        return $this->long;
    }

    public function getLat() {
        return $this->lat;
    }

    public function getMaxSeatings() {
        return $this->maxSeatings;
    }

    public function getImg() {
        return $this->img;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getAvgReviews() {
        return $this->avgReviews;
    }

    public function getNumReviews() {
        return $this->numReviews;
    }
}

?>