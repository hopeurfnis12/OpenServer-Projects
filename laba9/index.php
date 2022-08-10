<?php


class OnlineStore{
	private $author;
    private $productName;
    private $discount;
    private $price;
    
    public function __construct($author = null, $productName = null, $price = null){
        $this -> author = $author;
        $this -> productName = $productName;
        $this -> price = $price;
    }

	public function getProduct(){
        $inf = "Автор: ".$this -> author."<br>Наименование: ".$this -> productName."<br>Стоимость: ".$this -> price."<br>";
        return $inf;
    }

    public function getPrice($discount = null){
        $this -> discount = $discount;
    	$ed = $this -> discount;
    	$ep = $this -> price;
    	$ee = $ep - $ed;
        $inf = "Стоимость с учётом скидки: ".$ee."<br>";
        return $inf;
    }

}

$wwww = new OnlineStore("Иван", "Книга", 50);
echo $wwww -> getProduct();
echo $wwww -> getPrice(10);
echo "<br><br>";



class MusicStore extends OnlineStore{
    private $playTime;

    public function __construct($author = null, $productName = null, $price = null, $playTime = null){
        parent :: __construct($author, $productName, $price);
        $this -> playTime = $playTime;
    }

	public  function getProduct(){
        $inf = parent :: getProduct();
        $inf .= "Время воспроизведения: ".$this -> playTime."<br><br>";
        return $inf;
    }

}

$ms1 = new MusicStore("Кот", "Произведение 1", 100, 1.2);
echo $ms1 -> getProduct();

$ms2 = new MusicStore("Dog", "Произведение 2", 103.3, 3.2);
echo $ms2 -> getProduct();

echo "<br>";

class BookStore extends OnlineStore{
    private $publishHouse;

    public function __construct($author = null, $productName = null, $price = null, $publishHouse = null){
        parent :: __construct($author, $productName, $price);
        $this -> publishHouse = $publishHouse;
    }

    public  function getProduct(){
        $inf = parent :: getProduct();
        $inf .= "Издательство: ".$this -> publishHouse."<br><br>";
        return $inf;
    }
}

$bs1 = new BookStore("Гоголь", "Мёртвые души", 228, "BookHouse");
echo $bs1 -> getProduct();

$bs2 = new BookStore("Дж. К. Роулинг", "Гарри Поттер", 420, "Махаон");
echo $bs2 -> getProduct();


?>


<!--
Имеется родительский класс: OnlineStore (товары в интернет-магазине)
Свойства: author (автор товара),  productName (наименование товара), discount (скидка),  price (цена товара)
Метод: getProduct() – возвращает строку, содержащую сведения о продукте (автор,  наименование,  стоимость).
Метод: getPrice() – расчет стоимости товара со скидкой.


Создайте два дочерних класса:

Класс: MusicStore (продажа  музыкальных альбомов в MP3 формате)
Доп. свойство:  playTime – время воспроизведения.
Метод:   getProduct() – переопределенный метод класса-родителя (добавить вывод времени воспроизведения).

Класс: BookStore (продажа электронных книг)
Доп. свойство:  publishingHouse (издательство)
Метод: getProduct() – переопределенный метод класса-родителя (добавить вывод издательства).
 -->