<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 28.01.15
 * Time: 18:48
 */
class Systemcall extends DataBaseModel
{
    const ANSWER_TYPE = 'ANSWER';

    public $tableName = 'systemcall';

    /**
     * Made this method by using simple sql query because of tests:
     * SQL query + group by with 2 fields 1,5 secs
     * SQL query simple + grouping of data by php means 0,85 sec
     *
     * @return string
     */
    public function getStatData()
    {
        $result = [];
        $dates = [];
        $data = [];
        $sql = "SELECT DISTINCT(`id`), DATE( `moment` ) as `date`, `gateway` FROM `{$this->tableName}`
                WHERE `type`='".self::ANSWER_TYPE."'";
        $mysqlData = mysql_query($sql, $this->dbLink);
        while($row = mysql_fetch_assoc($mysqlData)) {
            if (!isset($result[$row['date']][$row['gateway']])) {
                $result[$row['date']][$row['gateway']] = 1;
            } else {
                $result[$row['date']][$row['gateway']] += 1;
            }
        }

        foreach($result as $key => $value)
        {
            foreach($value as $key_ => $value_)
            {
                if(empty($data[$key_]['data']))
                    $data[empty($key_) ? 'empty' : $key_]['data'][] = empty($key_) ? 'empty' : $key_;
                $data[empty($key_) ? 'empty' : $key_]['data'][] = $value_;
                if(empty($data[empty($key_) ? 'empty' : $key_]['dates']))
                    $data[empty($key_) ? 'empty' : $key_]['dates'][] = 'time'.$key;
                $data[empty($key_) ? 'empty' : $key_]['dates'][] = $key;
            }
        }
        return json_encode(['data' => $data]);
    }
} 