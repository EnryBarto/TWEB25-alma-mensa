<?php
enum UserLevel {
    case NotLogged;
    case CanteenAdmin;
    case Customer;
}

class Address implements JsonSerializable  {
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

    public function jsonSerialize(): array {
        return [
            'num' => $this->num,
            'avenue' => $this->avenue,
            'municipality' => $this->municipality,
            'postalCode' => $this->postalCode,
        ];
    }
}

class Canteen extends User implements JsonSerializable {
    private $id;
    private $name;
    private $desc;
    private $address;
    private $tel;
    private $long;
    private $lat;
    private $maxSeatings;
    private $img;
    private $category;
    private $avgReviews;
    private $numReviews;

    public function __construct($id, $email, $name, $desc, $number, $avenue, $municipality, $postalCode, $tel, $lat, $long, $maxSeatings, $img, $category, $avgReviews, $numReviews) {
        parent::__construct($email);
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->address = new Address($number, $avenue, $municipality, $postalCode);
        $this->tel = empty($tel) ? "" : $tel;
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
        return parent::getEmail();
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

    public function getTelephone() {
        return $this->tel;
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

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'email' => $this->getEmail(),
            'name' => $this->name,
            'desc' => $this->desc,
            'address' => $this->address instanceof JsonSerializable ? $this->address : $this->address,
            'tel' => $this->tel,
            'long' => $this->long,
            'lat' => $this->lat,
            'maxSeatings' => $this->maxSeatings,
            'img' => $this->img,
            'category' => $this->category,
            'avgReviews' => $this->avgReviews,
            'numReviews' => $this->numReviews,
        ];
    }

    public function getLevel() {
        return UserLevel::CanteenAdmin;
    }
}

class Reservation {
    private $code;
    private $canteen;
    private $dateTime;
    private $userEmail;
    private $numPeople;
    private $convalidated;

    public function __construct($code, Canteen $canteen, $dateTime, $userEmail, $numPeople, $convalidated) {
        $this->code = $code;
        $this->canteen = $canteen;
        $this->dateTime = date_create_from_format("Y-m-d H:i:s", $dateTime);
        $this->userEmail = $userEmail;
        $this->numPeople = $numPeople;
        $this->convalidated = $convalidated;
    }

    public function getCode() {
        return $this->code;
    }
    public function getCanteen() {
        return $this->canteen;
    }
    public function getDateTime() {
        return $this->dateTime;
    }
    public function getUserEmail() {
        return $this->userEmail;
    }
    public function getNumPeople() {
        return $this->numPeople;
    }
    public function isConvalidated() {
        return $this->convalidated;
    }

    public function convalidate() {
        $this->convalidated = true;
    }

    public function isActive() {
        $now = new DateTime();
        return $this->dateTime > $now && !$this->convalidated;
    }
}

class Review {
    private $id;
    private $value;
    private $title;
    private $desc;
    private $dateTime;
    private $canteenId;
    private $authorEmail;
    private $authorSurname;
    private $authorName;

    public function __construct($id, $value, $title, $desc, $dateTime, $canteenId, $authorEmail, $authorSurname, $authorName) {
        $this->id = $id;
        $this->value = $value;
        $this->title = $title;
        $this->desc = $desc;
        $this->dateTime = $dateTime instanceof DateTime ? $dateTime : new DateTime($dateTime);
        $this->canteenId = $canteenId;
        $this->authorEmail = $authorEmail;
        $this->authorSurname = $authorSurname;
        $this->authorName = $authorName;
    }

    public function getId() {
        return $this->id;
    }

    public function getValue() {
        return $this->value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->desc;
    }

    public function getTimestamp() {
        return date_format($this->dateTime,"d/m/Y H:i");
    }

    public function getCanteenId() {
        return $this->canteenId;
    }

    public function getAuthorEmail() {
        return $this->authorEmail;
    }

    public function getAuthor() {
        return $this->authorSurname . " " . $this->authorName;
    }

}

class Dish implements JsonSerializable {
    private $id;
    private $name;
    private $desc;
    private $price;
    private $canteenId;

    public function __construct($id, $name, $desc, $price, $canteenId) {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
        $this->canteenId = $canteenId;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->desc;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCanteenId() {
        return $this->canteenId;
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'price' => $this->price,
            'canteenId' => $this->canteenId,
        ];
    }
}

class Menu implements JsonSerializable {
    private $id;
    private $nome;
    private $attivo;
    private $idCanteen;
    private $dishes = [];

    public function __construct($id, $nome, $attivo, $idCanteen, $dishes = []) {
        $this->id = $id;
        $this->nome = $nome;
        $this->attivo = $attivo;
        $this->idCanteen = $idCanteen;
        $this->dishes = $dishes;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function isAttivo() {
        return $this->attivo;
    }

    public function getIdCanteen() {
        return $this->idCanteen;
    }

    public function getDishes() {
        return $this->dishes;
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'attivo' => $this->attivo,
            'idCanteen' => $this->idCanteen,
            'dishes' => array_map(
                function($dish) {
                    return $dish instanceof JsonSerializable ? $dish : $dish;
                },
                $this->dishes
            ),
        ];
    }
}

abstract class User {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public abstract function getLevel();
}

class Customer extends User {
    private $name;
    private $surname;

    public function __construct($email, $name, $surname) {
        parent::__construct($email);
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getLevel() {
        return UserLevel::Customer;
    }
}

?>