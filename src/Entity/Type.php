<?php

namespace App\Entity;

class Type 
{
    const TYPE_FIRE = 1;
    const TYPE_PLANT = 2;
    const TYPE_WATER = 3;


    public function getType($type) 
    {
        switch ($type)
        {
            case self::TYPE_FIRE:
                return "Feu";
                break;
            case self::TYPE_WATER:
                return "Eau";
                break;
            case self::TYPE_PLANT:
                return "Plante";
                break;
            default:
                return false;
                break;
        }
    }

    /**
     * @param $type
     * @param $type_atk
     * @return bool
     */
    public function isTypeWeakAgainst($type, $type_atk)
    {
        if($type === self::TYPE_FIRE){
            return (self::TYPE_WATER === $type_atk) ? true : false;
        }
        elseif($type === self::TYPE_WATER){
            return (self::TYPE_PLANT === $type_atk) ? true : false;
        }
        elseif($type === self::TYPE_PLANT){
            return (self::TYPE_FIRE === $type_atk) ? true : false;
        }
        else
            return false;
    }

    /**
     * @param $type
     * @param $type_atk
     * @return bool
     */
    public function isTypeStrongAgainst($type, $type_atk)
    {
        switch ($type)
        {
            case self::TYPE_FIRE:
                return self::TYPE_PLANT === $type_atk ? true : false;
                break;
            case self::TYPE_WATER:
                return (self::TYPE_FIRE === $type_atk) ? true : false;
                break;
            case self::TYPE_PLANT:
                return (self::TYPE_WATER === $type_atk) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }
}