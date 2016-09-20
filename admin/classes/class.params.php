<?php
/**
 * Класс для работы с параметрами товара
 * 
 * @package UPcms\Catalog
 * @author UP Studio <info@up-studio.net>
 * @date 22.09.2014
 */

class Params {
    
    /**
     * Добавление
     */
    public static function add($id, $params){        
        $sql = "INSERT INTO `params` SET
                    `id_cat` = $id,
                    `param1_name` = '".Db::prepare($params['param1'])."',
                    `param2_name` = '".Db::prepare($params['param2'])."',
                    `param3_name` = '".Db::prepare($params['param3'])."',
                    `param4_name` = '".Db::prepare($params['param4'])."',
                    `param5_name` = '".Db::prepare($params['param5'])."',
                    `param6_name` = '".Db::prepare($params['param6'])."',
                    `param7_name` = '".Db::prepare($params['param7'])."',
                    `param8_name` = '".Db::prepare($params['param8'])."',
                    `param9_name` = '".Db::prepare($params['param9'])."',
                    `param10_name` = '".Db::prepare($params['param10'])."',
                    `param1_type` = '".Db::prepare($params['param1_type'])."',
                    `param2_type` = '".Db::prepare($params['param2_type'])."',
                    `param3_type` = '".Db::prepare($params['param3_type'])."',
                    `param4_type` = '".Db::prepare($params['param4_type'])."',
                    `param5_type` = '".Db::prepare($params['param5_type'])."',
                    `param6_type` = '".Db::prepare($params['param6_type'])."',
                    `param7_type` = '".Db::prepare($params['param7_type'])."',
                    `param8_type` = '".Db::prepare($params['param8_type'])."',
                    `param9_type` = '".Db::prepare($params['param9_type'])."',
                    `param10_type` = '".Db::prepare($params['param10_type'])."',
                    `param1_step` = '".Db::prepare(strip_comma($params['param1_step']))."',
                    `param2_step` = '".Db::prepare(strip_comma($params['param2_step']))."',
                    `param3_step` = '".Db::prepare(strip_comma($params['param3_step']))."',
                    `param4_step` = '".Db::prepare(strip_comma($params['param4_step']))."',
                    `param5_step` = '".Db::prepare(strip_comma($params['param5_step']))."',
                    `param6_step` = '".Db::prepare(strip_comma($params['param6_step']))."',
                    `param7_step` = '".Db::prepare(strip_comma($params['param7_step']))."',
                    `param8_step` = '".Db::prepare(strip_comma($params['param8_step']))."',
                    `param9_step` = '".Db::prepare(strip_comma($params['param9_step']))."',
                    `param10_step` = '".Db::prepare(strip_comma($params['param10_step']))."'";
                    
        return Db::exec($sql);
    }
    
    /**
     * Добавление пустых параметров
     */
    public static function addEmpty($id){       
        $sql = "INSERT INTO `params` SET
                    `id_cat` = $id,
                    `param1_type` = 1,
                    `param2_type` = 1,
                    `param3_type` = 1,
                    `param4_type` = 1,
                    `param5_type` = 1,
                    `param6_type` = 1,
                    `param7_type` = 1,
                    `param8_type` = 1,
                    `param9_type` = 1";
                    
        return Db::exec($sql);
    }
    
    /**
     * Редактирование
     */
    public static function edit($id, $params){
        $sql = "UPDATE `params` SET 
                    `param1_name` = '".Db::prepare($params['param1'])."',
                    `param2_name` = '".Db::prepare($params['param2'])."',
                    `param3_name` = '".Db::prepare($params['param3'])."',
                    `param4_name` = '".Db::prepare($params['param4'])."',
                    `param5_name` = '".Db::prepare($params['param5'])."',
                    `param6_name` = '".Db::prepare($params['param6'])."',
                    `param7_name` = '".Db::prepare($params['param7'])."',
                    `param8_name` = '".Db::prepare($params['param8'])."',
                    `param9_name` = '".Db::prepare($params['param9'])."',
                    `param10_name` = '".Db::prepare($params['param10'])."',
                    `param1_type` = '".Db::prepare($params['param1_type'])."',
                    `param2_type` = '".Db::prepare($params['param2_type'])."',
                    `param3_type` = '".Db::prepare($params['param3_type'])."',
                    `param4_type` = '".Db::prepare($params['param4_type'])."',
                    `param5_type` = '".Db::prepare($params['param5_type'])."',
                    `param6_type` = '".Db::prepare($params['param6_type'])."',
                    `param7_type` = '".Db::prepare($params['param7_type'])."',
                    `param8_type` = '".Db::prepare($params['param8_type'])."',
                    `param9_type` = '".Db::prepare($params['param9_type'])."',
                    `param10_type` = '".Db::prepare($params['param10_type'])."',
                    `param1_step` = '".Db::prepare(strip_comma($params['param1_step']))."',
                    `param2_step` = '".Db::prepare(strip_comma($params['param2_step']))."',
                    `param3_step` = '".Db::prepare(strip_comma($params['param3_step']))."',
                    `param4_step` = '".Db::prepare(strip_comma($params['param4_step']))."',
                    `param5_step` = '".Db::prepare(strip_comma($params['param5_step']))."',
                    `param6_step` = '".Db::prepare(strip_comma($params['param6_step']))."',
                    `param7_step` = '".Db::prepare(strip_comma($params['param7_step']))."',
                    `param8_step` = '".Db::prepare(strip_comma($params['param8_step']))."',
                    `param9_step` = '".Db::prepare(strip_comma($params['param9_step']))."',
                    `param10_step` = '".Db::prepare(strip_comma($params['param10_step']))."'
                WHERE `id_cat` = $id";
                    
        return Db::exec($sql);
    }
    
    /**
     * Возращает параметры
     * 
     * @param integer id - ИД категории
     * @return array
     */
    public static function returnParams($id){
        $sql = "SELECT * FROM `params` WHERE `id_cat` = $id";
        $params = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $params;
    }
    
    /**
     * Удаление
     * 
     * @param integer id - ИД категории
     * @return boolean
     */
    public static function del($id){
        $sql = "DELETE FROM `params` WHERE `id_cat` = $id";
        return Db::exec($sql);
    }
}
?>