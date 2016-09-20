<?php

/**
 * Класс для работы с товарами
 * 
 * @package UPcms\Catalog
 * @author UP Studio <info@up-studio.net>
 * @date 08.12.2014
 */

class Product
{

    /**
     * Товары в категории
     * 
     * @param integer $id - ИД категории
     * @return array
     */
    public static function show($id)
    {
        $sql = "SELECT * FROM `products` WHERE `id_cat` = $id ORDER BY `id`";
        return Db::doArray($sql);
    }

    /**
     * Добавление товара в категорию
     * 
     * @param integer $id - ИД категории
     * @param string $article - артикул
     * @param string $name - название
     * @param string $provider - поставщик
     * @param boolean $tm - ИД торговой марки
     * @param string $text - описание
     * @param float $price - цена
     * @param float $pprice - закупочтаня цена (для отчётов)
     * @param float $old_price - старая цена (для скидок)
     * @param boolean $new - новинка
     * @param boolean $top - топ продаж
     * @param boolean $none - нет в наличии
     * @param string $param1-$param10 - значения параметров
     * @param string $title - метатег Title
     * @param string $description - метатег Description
     * @param string $keywords - метатег Keywords 
     * @return boolean
     */
    public static function add($id, $article, $name, $provider, $tm, $text, $price, $pprice, $old_price, 
        $new, $top, $none, $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9,
        $param10, $title, $description, $keywords)
    {
        $sql = "INSERT INTO `products` 
                    SET `id_cat` = $id,
                        `id_tm` = $tm,
                        `article` = '$article',
                        `name` = '$name',
                        `provider` = '$provider',
                        `text` = '$text',
                        `price` = '$price',
                        `pprice` = '$pprice',
                        `old_price` = '$old_price',
                        `new` = '$new',
                        `top` = '$top',
                        `none` = '$none',
                        `param1` = '$param1',
                        `param2` = '$param2',
                        `param3` = '$param3',
                        `param4` = '$param4',
                        `param5` = '$param5',
                        `param6` = '$param6',
                        `param7` = '$param7',
                        `param8` = '$param8',
                        `param9` = '$param9',
                        `param10` = '$param10',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'";
        return Db::exec($sql);
    }

    /**
     * Редактирование товара
     * 
     * @param integer $id - ИД товара
     * @param string $article - артикул
     * @param string $name - название
     * @param string $provider - поставщик
     * @param boolean $tm - ИД торговой марки
     * @param string $text - описание
     * @param float $price - цена
     * @param float $pprice - закупочтаня цена (для отчётов)
     * @param float $old_price - старая цена (для скидок)
     * @param boolean $new - новинка
     * @param boolean $top - топ продаж
     * @param boolean $none - нет в наличии
     * @param string $param1-$param10 - значения параметров
     * @param string $title - метатег Title
     * @param string $description - метатег Description
     * @param string $keywords - метатег Keywords 
     * @return boolean
     */
    public static function edit($id, $article, $name, $provider, $tm, $text, $price, $pprice, $old_price, 
        $new, $top, $none, $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9,
        $param10, $title, $description, $keywords)
    {
        $sql = "UPDATE `products` 
                   SET `name` = '$name',
                       `provider` = '$provider',
                       `id_tm` = $tm,
                       `article` = '$article',
                       `text` = '$text',
                       `price` = '$price',
                       `pprice` = '$pprice',
                       `old_price` = '$old_price',
                       `new` = '$new',
                       `top` = '$top',
                       `none` = '$none',
                       `param1` = '$param1',
                       `param2` = '$param2',
                       `param3` = '$param3',
                       `param4` = '$param4',
                       `param5` = '$param5',
                       `param6` = '$param6',
                       `param7` = '$param7',
                       `param8` = '$param8',
                       `param9` = '$param9',
                       `param10` = '$param10',
                       `title` = '$title',
                       `description` = '$description',
                       `keywords` = '$keywords'
                   WHERE `id` = $id";
        $result = Db::exec($sql);
        return $result;
    }

    /**
     * Метод удаляет товар
     * 
     * @param integer $id - ИД товара
     * @retirn boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `products` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Один товар
     * 
     * @param integer $id - ИД товара
     * @return array
     */
    public static function returnProduct($id)
    {
        $sql = "SELECT * FROM `products` WHERE `id` = $id";
        $product = (Db::numRows($sql) > 0) ? Db::doOne($sql) : array();
        return $product;
    }
    
    /**
     * Возращает имя изображения
     * 
     * @param integer $id - ИД товара
     * @param integer $num - номер картинки
     * @return string
     */
    public static function returnImg($id, $num)
    {
        $sql = "SELECT `img_$num` FROM `products` WHERE `id` = {$id}";

        if (Db::numRows($sql) < 1)
        {
            $name = false;
        }
        else
        {
            $result = Db::doOne($sql);
            $name = $result['img_'.$num];
        }

        return $name;
    }
    
    /**
     * Устанавливает фото
     * 
     * @param integer $id - ИД товара
     * @param string $field - поле
     * @param string $img - название фото
     * @return boolean
     */
    public static function setImg($id, $field, $img) {
        $db = new db();
        $sql = "UPDATE `products` SET `$field` = '$img' WHERE `id` = $id";
        Db::exec($sql);
    }
}

?>