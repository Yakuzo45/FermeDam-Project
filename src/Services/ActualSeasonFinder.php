<?php
/**
 * Created by PhpStorm.
 * User: wilder7
 * Date: 11/01/19
 * Time: 13:16
 */

namespace App\Services;


class ActualSeasonFinder
{
    const LIMITES = [
        '/12/21' => 'Hiver',
        '/09/21' => 'Automne',
        '/06/21' => 'Été',
        '/03/21' => 'Printemps',
        '/01/01' => 'Hiver'
    ];

    /**
     * @return mixed
     */
    public function seasonFinder() :string
    {
        foreach (self::LIMITES AS $key => $value) {
            $adate = date('Y/m/d');
            $limit = date("Y") . $key;
            if (strtotime($adate) >= strtotime($limit)) {
                return $value;
            }
        }
    }
}