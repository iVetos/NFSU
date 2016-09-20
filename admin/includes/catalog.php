<?php

/**
 * Каталог товаров
 * 
 * @package UPcms\Catalog
 * @author UP Studio <info@up-studio.net>
 * @date 08.12.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.category.php'); // разделы
include_once (__DIR_CLASSES . 'class.product.php');  // товары
include_once (__DIR_CLASSES . 'class.params.php');   // параметры
include_once (__DIR_CLASSES . 'class.tm.php');       // торговые марки
include_once (__DIR_CLASSES . 'class.promo.php');    // промокоды
include_once (__DIR_CLASSES . 'class.image.php');    // работа с изображениями

$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

function delProducts($id)
{
    $products = Product::show($id);
    foreach($products as $product)
    {
        // Удаляем товар
        if(Product::del($product['id']))
        {
            Log::write(100, __file__, 'Удаление товара - (id:' . $product['id'] . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Товар успешно удалён.';
            
            // Удаляем изображения
            for ($i = 1; $i <= 4; $i++)
            {
                if(strlen($product['img_'.$i]) > 0 )
                {
                    unlink(__CONST_PRODUCTS_DIR . $product['img_'.$i]);
                    unlink(__CONST_PRODUCTS_DIR . 'small_' . $product['img_'.$i]);
                }
            }
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении товара - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении товара.';
        }
    }
}

switch ($action)
{
    // Отображаем все разделы или товары
    case 'show':
        $categories = Category::show($id);
        $products = Product::show($id);

        $smarty->assign('title', $lang['catalog_show']);

        $smarty->assign('categories', $categories);
        $smarty->assign('products', $products);
        break;

    // Добавление раздела
    case 'addCat':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);
            
            // Добавляем обложку
            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                $img = Image::imageAdd('img', __CONST_CATEGORIES_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_CATEGORIES_DIR, __CONST_CATEGORY_COVER_WIDTH, __CONST_CATEGORY_COVER_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }
            else {
                $img = '';
            }
            
            // Добавляем раздел в БД
            if(Category::add($id, $name, $text, $img, $title, $description, $keywords))
            {
                $id_catalog = Db::returnId();
            
                // Добавляем параметры
                (__CONST_SHOP_PARAMS) ? Params::add($id_catalog, $_POST) : Params::addEmpty($id_catalog);
                
                Log::write(100, __file__, 'Добавление раздела - (id:' . $id_catalog . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Раздел успешно добавлен.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при добавлении раздела [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении раздела.';
            }

            redirect('../admin/?page=catalog&action=show&id=' . $id . '');
        }
        else
            if (__CONST_SHOP_PARAMS)
            {
                if ($id != 0)
                {
                    $paramsC = Params::returnParams($id);
                    $smarty->assign('params', $paramsC);
                }
                else
                {
                    $smarty->assign('mainCat', true);
                    $smarty->assign('params', array());
                }
            }
        break;

    // Редактирование раздела
    case 'editCat':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);
            
            // Добавляем обложку
            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                // Удаление старой обложки
                $cover = Category::returnCover($id);
                if(!empty($cover))
                {
                   Image::imageDel(__CONST_CATEGORIES_DIR . $cover); 
                }
                    
                $img = Image::imageAdd('img', __CONST_CATEGORIES_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_CATEGORIES_DIR, __CONST_CATEGORY_COVER_WIDTH, __CONST_CATEGORY_COVER_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }
            else {
                $img = Category::returnCover($id);
            }
            
            // Редактируем раздел
            if(Category::edit($id, $name, $text, $img, $title, $description, $keywords))
            {
                Log::write(100, __file__, 'Редактирование раздела - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Раздел успешно отредактирован.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при редактировании раздела - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при редактировании раздела.';
            }
            
            // Рудактируем параметры
            if (__CONST_SHOP_PARAMS)
            {
                Params::edit($id, $_POST);
            }

            $categoryCur = Category::returnCategory($id);
            redirect('../admin/?page=catalog&action=show&id=' . $categoryCur['id_parent'] . '');
        }
        else
        {
            $categoryCur = Category::returnCategory($id);
            if (!empty($categoryCur))
            {
                $smarty->assign('category', $categoryCur);
                if (__CONST_SHOP_PARAMS)
                {
                    $paramsC = Params::returnParams($id);
                    $smarty->assign('params', $paramsC);
                }
            }
            else
            {
                redirect('../admin/?page=catalog');
            }
        }
        break;

    // Удаление раздела
    case 'delCat':
        $categoryCur = Category::returnCategory($id);        
        $cover = Category::returnCover($id);

        if (Category::del($id))
        {
            // Удаление обложки
            if(!empty($cover))
            {
               Image::imageDel(__CONST_CATEGORIES_DIR . $cover); 
            }
            
            // Удаляем параметры
            Params::del($id);
            
            // Удаление подразделов и товаров
            $categories = Category::show($id);
            // Если есть подкатегории, то удаляем товары в них
            if(!empty($categories))
            {
                foreach($categories as $category)
                {
                    delProducts($category['id']);
                    
                    // Удаляем текущую подкатегорию
                    $cover = Category::returnCover($category['id']);
                                      
                    if (Category::del($category['id']))
                    {
                        // Удаляем параметры
                        Params::del($category['id']);
                        
                        // Удаление обложки
                        if(!empty($cover))
                        {
                           Image::imageDel(__CONST_CATEGORIES_DIR . $cover); 
                        }
                        
                        Log::write(100, __file__, 'Удаление раздела - (id:' . $category['id'] . ') [' . $_SESSION['adm_user_name'] . ']');
                    }
                    else
                    {
                        Log::write(101, __file__, 'Ошибка при удалении раздела - (id:' . $category['id'] . ') [' . $_SESSION['adm_user_name'] . ']');
                    }
                }
            }
            else
            {
                delProducts($id);
            }
            
            Log::write(100, __file__, 'Удаление раздела - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Раздел успешно удалён.';
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении раздела - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении раздела.';
        }
        redirect('../admin/?page=catalog&action=show&id=' . $categoryCur['id_parent'] . '');
        break;
        
    case 'sort':
        if (isset($_GET['data']))
        {
            $data = explode(',', str_replace('id-', '', Db::prepare($_GET['data'])));
            for ($i = 0; $i < count($data); $i++)
            {
                $sql = "UPDATE `categories` SET `sort` = " . ($i + 1) . " WHERE `id` = " . $data[$i];
                if (Db::exec($sql))
                {
                    Log::write(100, __file__, 'Сортировка категорий [' . $_SESSION['adm_user_name'] . ']');
                }
                else
                {
                    Log::write(101, __file__, 'Ошибка при сортировке категорий [' . $_SESSION['adm_user_name'] . ']');
                }
            }
        }
        else
        {            
            $categories = Category::show($id);
            if (empty($categories))
            {
                redirect('../admin/?page=catalog&action=show&id=' . $id . '');
            }
            $smarty->assign('categories', $categories);
        }
        break;
        
/** Торговые марки */
    case 'tms':
        $smarty->assign('tms', Tm::show($id));
        break;
    
    // Добавление ТМ 
    case 'addTm':
        if (isset($_POST['name']))
        {
            if(Tm::add(Db::prepare($_POST['name'])))
            {
                Log::write(100, __file__, 'Добавление торговой марки - (id:' . Db::returnId() . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Торговая марка успешно добавлена.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при добавлении торговой марки [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении торговой марки.';
            }
            
            redirect('../admin/?page=catalog&action=tms');
        }
        break;
    
    // Редактирование ТМ  
    case 'editTm':
        if (isset($_POST['name']))
        {
            if(Tm::edit($id, Db::prepare($_POST['name'])))
            {
                Log::write(100, __file__, 'Редактирование торговой марки - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Торговая марка успешно отредактирована.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при редактировании торговой марки - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при редактировании торговой марки.';
            }
            redirect('../admin/?page=catalog&action=tms');
        }
        else
        {
            $tms = Tm::returnOne($id);
            if (!empty($tms))
            {
                $smarty->assign('tms', $tms);
            }
            else
            {
                redirect('../admin/?page=catalog&action=tms');
            }
        }
        break;
    
    // Удаление ТМ
    case 'delTm':
        if(Tm::del($id))
        {
            Log::write(100, __file__, 'Удаление торговой марки - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Торговая марка успешно удалена.';
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении торговой марки - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении торговой марки.';
        }
        redirect('../admin/?page=catalog&action=tms');
        break;

/** Товары */
    // Добавление товара
    case 'addProduct':
        if (isset($_POST['name']))
        {
            $article = (__CONST_SHOP_ARTICLE) ? Db::prepare($_POST['article']) : '';            
            $tm = (__CONST_SHOP_TM) ? Db::prepare($_POST['tm']) : 0;
            $price = (__CONST_SHOP_PRICE) ? Db::prepare(strip_comma($_POST['price'])) : 0.00;
            $pprice = (__CONST_SHOP_PPRICE) ? Db::prepare(strip_comma($_POST['pprice'])) : 0.00;
            $old_price = (__CONST_SHOP_OLD_PRICE) ? Db::prepare(strip_comma($_POST['old_price'])) : 0.00;
            $name = Db::prepare($_POST['name']);
            $provider = (__CONST_SHOP_PROVIDER) ? Db::prepare($_POST['provider']) : '';
            $text = Db::prepare($_POST['text']);
            $new = (isset($_POST['new'])) ? 1 : 0;
            $top = (isset($_POST['top'])) ? 1 : 0;
            $none = (isset($_POST['none'])) ? 1 : 0;
            $param1 = (isset($_POST['param1'])) ? Db::prepare(strip_comma($_POST['param1'])) : '';
            $param2 = (isset($_POST['param2'])) ? Db::prepare(strip_comma($_POST['param2'])) : '';
            $param3 = (isset($_POST['param3'])) ? Db::prepare(strip_comma($_POST['param3'])) : '';
            $param4 = (isset($_POST['param4'])) ? Db::prepare(strip_comma($_POST['param4'])) : '';
            $param5 = (isset($_POST['param5'])) ? Db::prepare(strip_comma($_POST['param5'])) : '';
            $param6 = (isset($_POST['param6'])) ? Db::prepare(strip_comma($_POST['param6'])) : '';
            $param7 = (isset($_POST['param7'])) ? Db::prepare(strip_comma($_POST['param7'])) : '';
            $param8 = (isset($_POST['param8'])) ? Db::prepare(strip_comma($_POST['param8'])) : '';
            $param9 = (isset($_POST['param9'])) ? Db::prepare(strip_comma($_POST['param9'])) : '';
            $param10 = (isset($_POST['param10'])) ? Db::prepare(strip_comma($_POST['param10'])) : '';
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);

            if(Product::add($id, $article, $name, $provider, $tm, $text, $price, $pprice, $old_price, $new, $top, $none, $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $title, $description, $keywords))
            {
                $id_product = Db::returnId();                
                Log::write(100, __file__, 'Добавление товара - (id:' . $id_product . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Товар успешно добавлен.';
                
                // Добавляем изображения                
                $i = 0;
                foreach($_FILES as $file){
                    $i++;
                    if (!empty($file['name'])){
                        $img = Image::imageAdd('img_'.$i, __CONST_PRODUCTS_DIR);
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, __CONST_PRODUCT_IMG_WIDTH, __CONST_PRODUCT_IMG_HEIGHT, 'small_'.$img['name'], 1);
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, 100, 100, 'adm_'.$img['name'], 0);
                        $img = $img['name_full'];
                        Product::setImg($id_product, 'img_'.$i, $img);
                    }
                    else {
                        Product::setImg($id_product, 'img_'.$i, '');
                    }
                }                                
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при добавлении товара [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении товара.';
            }
            
            redirect('../admin/?page=catalog&action=show&id=' . $id . '');
        }
        else
        {
            // Если активны параметры
            if (__CONST_SHOP_PARAMS)
            {
                $smarty->assign('params', Params::returnParams($id));
            }

            // Если актывны торговые марки
            if (__CONST_SHOP_TM)
            {
                $smarty->assign('tm', Tm::show());
            }
        }
        break;

    // Редактирование товара
    case 'editProduct':
        if (isset($_POST['name']))
        {
            $article = (__CONST_SHOP_ARTICLE) ? Db::prepare($_POST['article']) : '';            
            $tm = (__CONST_SHOP_TM) ? Db::prepare($_POST['tm']) : 0;
            $price = (__CONST_SHOP_PRICE) ? Db::prepare(strip_comma($_POST['price'])) : 0.00;
            $pprice = (__CONST_SHOP_PPRICE) ? Db::prepare(strip_comma($_POST['pprice'])) : 0.00;
            $old_price = (__CONST_SHOP_OLD_PRICE) ? Db::prepare(strip_comma($_POST['old_price'])) : 0.00;
            $name = Db::prepare($_POST['name']);
            $provider = (__CONST_SHOP_PROVIDER) ? Db::prepare($_POST['provider']) : '';
            $text = Db::prepare($_POST['text']);
            $new = (isset($_POST['new'])) ? 1 : 0;
            $top = (isset($_POST['top'])) ? 1 : 0;
            $none = (isset($_POST['none'])) ? 1 : 0;
            $param1 = (isset($_POST['param1'])) ? Db::prepare(strip_comma($_POST['param1'])) : '';
            $param2 = (isset($_POST['param2'])) ? Db::prepare(strip_comma($_POST['param2'])) : '';
            $param3 = (isset($_POST['param3'])) ? Db::prepare(strip_comma($_POST['param3'])) : '';
            $param4 = (isset($_POST['param4'])) ? Db::prepare(strip_comma($_POST['param4'])) : '';
            $param5 = (isset($_POST['param5'])) ? Db::prepare(strip_comma($_POST['param5'])) : '';
            $param6 = (isset($_POST['param6'])) ? Db::prepare(strip_comma($_POST['param6'])) : '';
            $param7 = (isset($_POST['param7'])) ? Db::prepare(strip_comma($_POST['param7'])) : '';
            $param8 = (isset($_POST['param8'])) ? Db::prepare(strip_comma($_POST['param8'])) : '';
            $param9 = (isset($_POST['param9'])) ? Db::prepare(strip_comma($_POST['param9'])) : '';
            $param10 = (isset($_POST['param10'])) ? Db::prepare(strip_comma($_POST['param10'])) : '';
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);

            if(Product::edit($id, $article, $name, $provider, $tm, $text, $price, $pprice, $old_price, $new, $top, $none, $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $title, $description, $keywords))
            {
                Log::write(100, __file__, 'Редактирование товара - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Товар успешно отредактирован.';
                $i = 0;
                foreach($_FILES as $file){
                    $i++;
                    if (!empty($file['name'])){
                        // Удаление текущей картинки
                        $cur_img = Product::returnImg($id, $i);
                        if (!empty($cur_img)) {
                            Image::imageDel(__CONST_PRODUCTS_DIR . $cur_img);
                            Image::imageDel(__CONST_PRODUCTS_DIR . 'small_' . $cur_img);
                            Image::imageDel(__CONST_PRODUCTS_DIR . 'adm_' . $cur_img);
                        }
                        
                        $img = Image::imageAdd('img_'.$i, __CONST_PRODUCTS_DIR);
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, __CONST_PRODUCT_IMG_WIDTH, __CONST_PRODUCT_IMG_HEIGHT, 'small_' . $img['name'], 1);
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, 100, 100, 'adm_'.$img['name'], 0);
                        $img = $img['name_full'];
                        Product::setImg($id, 'img_'.$i, $img);
                    }
                }
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при редактировании товара - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при редактировании товара.';
            }
            
            $category = Product::returnProduct($id);
            $id_cat = $category['id_cat'];
            redirect('../admin/?page=catalog&action=show&id=' . $id_cat . '');
        }
        else
        {
            $productCur = Product::returnProduct($id);
            if (!empty($productCur))
            {
                $smarty->assign('product', $productCur);
            }
            else
            {
                redirect('../admin/?page=catalog');
                break;
            }

            // Если активны параметры
            if (__CONST_SHOP_PARAMS)
            {
                $smarty->assign('params', Params::returnParams($productCur['id_cat']));
            }

            // Если актывны торговые марки
            if (__CONST_SHOP_TM)
            {
                $smarty->assign('tm', Tm::show());
            }

        }
        break;

    // Удаление товара
    case 'delProduct':
        $product = Product::returnProduct($id);
        if(Product::del($id))
        {
            Log::write(100, __file__, 'Удаление товара - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Товар успешно удалён.';
            
            // Удаляем изображения
            for ($i = 1; $i <= 4; $i++)
            {
                if(strlen($product['img_'.$i]) > 0 )
                {
                    unlink(__CONST_PRODUCTS_DIR . $product['img_'.$i]);
                    unlink(__CONST_PRODUCTS_DIR . 'small_' . $product['img_'.$i]);
                }
            }
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении товара - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении товара.';
        }

        redirect('../admin/?page=catalog&action=show&id=' . $product['id_cat'] . '');
        break;

/** Промокоды */
    case 'promo':
        $smarty->assign('promos', Promo::show());
        break;

    // Добавление
    case 'addPromo':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $value = Db::prepare($_POST['value']);
            $discount = Db::prepare($_POST['discount']);
            $date = Db::prepare($_POST['date']);

            if(Promo::add($name, $value, $discount, $date))
            {
                Log::write(100, __file__, 'Добавление промокода - (id:' . Db::returnId() . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Промокод успешно добавлен.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при добавлении промокода [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении промокода.';
            }

            redirect('../admin/?page=catalog&action=promo');
        }
        break;

    // Редактирование
    case 'editPromo':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $value = Db::prepare($_POST['value']);
            $discount = Db::prepare($_POST['discount']);
            $date = Db::prepare($_POST['date']);

            if(Promo::edit($id, $name, $value, $discount, $date))
            {
                Log::write(100, __file__, 'Редактирование промокода - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Промокод успешно изменён.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при редактировании промокода - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при редактировании промокода.';
            }
            redirect('../admin/?page=catalog&action=promo');
        }
        else
        {
            $promo = Promo::returnOne($id);
            if (!empty($promo))
            {
                $smarty->assign('promo', $promo);
            }
            else
            {
                redirect('../admin/?page=catalog&action=tms');
            }
        }
        break;

    // Удаление ТМ
    case 'delPromo':
        if(Promo::del($id))
        {
            Log::write(100, __file__, 'Удаление промокода - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Промокод успешно удалён.';
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении промокода - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении промокода.';
        }
        redirect('../admin/?page=catalog&action=promo');
        break;
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('header.tpl');
$smarty->display('catalog.tpl');
?>