<?php
/**
 * Класс для работы с заказами
 * 
 * @package UPcms\Catalog\Order
 * @author UP Studio <info@up-studio.net>
 * @date 10.10.2014
 */

class Order {
    
    /**
     * Все заказы
     * 
     * @return array
     */
    public static function show() {
        $sql = "SELECT `id`, `sum`, `id_user`, `user_name`, `date`, `phone`, `id_status` FROM `orders` WHERE `id_status` != 3 ORDER BY `date` DESC";
        return Db::doArray($sql);
    }
    
    /**
     * Информация о заказе
     * 
     * @param integer $id - ИД заказа
     * @return array
     */
    public static function see($id) {
        $sql = "SELECT `id`, `sum`, `user_name`, `id_user`, `date`, `phone`, `city`, `email`, `id_status`, `text`, `promo` FROM `orders` WHERE `id` = $id ORDER BY `id_status` DESC";
        $order = Db::doOne($sql);

        $sql = "SELECT `products`.`id` AS `id`, `products`.`name` AS `name`, `products`.`price` AS `price`, `order_product`.`count` AS `count` FROM `order_product`, `products` WHERE `order_product`.`id_order` = " . $order['id'] . " AND `products`.`id` = `order_product`.`id_product`";
        $order['products'] = Db::doArray($sql);
        
        return $order;
    }
    
    /**
     * Информация о товарах в заказе
     * 
     * @param integer $id - ИД заказа
     * @return string
     */
    public static function returnProducts($id)
    {
        $sql = "SELECT `products`.`id` AS `id`, `products`.`name` AS `name`, `products`.`price` AS `price`, `order_product`.`count` AS `count` FROM `order_product`, `products` WHERE `order_product`.`id_order` = $id AND `products`.`id` = `order_product`.`id_product`";
        return Db::doArray($sql);
    }
    
    /**
     * Меняет статус заказа
     * 
     * @param integer $id - ИД заказа
     * @param integer $status - ИД статуса
     * @return boolean
     */
    public static function setStatus($id, $status)
    {
        $sql = "UPDATE `orders` SET `id_status` = $status WHERE `id` = $id";
        return Db::exec($sql);
    }
}
?>