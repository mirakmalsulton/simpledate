<?php

namespace SimpleDateTime;

use DateTime;
use DateTimeZone;
use Exception;

class SimpleDateTime
{
    const TIME_ZONE = 'Asia/Calcutta';
    const TYPE_SECOND = 'second';
    const TYPE_MINUTE = 'minute';
    const TYPE_HOUR = 'hour';
    const TYPE_DAY = 'days';
    const TYPE_MONTH = 'month';
    const TYPE_YEAR = 'year';

    /**
     * @throws Exception
     */
    public static function getNow($format = null)
    {
        $dateTime = new DateTime("now", new DateTimeZone(self::TIME_ZONE));
        if ($format) {
            return $dateTime->format($format);
        }
        return $dateTime->format('Y-m-d H:i:s');
    }

    /**
     * @param string $dateTime
     * @param string $format
     * @throws Exception
     */
    public static function dateTimeToCustomFormat($dateTime, $format)
    {
        $dateTime = new DateTime($dateTime, new DateTimeZone(self::TIME_ZONE));
        return $dateTime->format($format);
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public static function timeStampToDateTime($timestamp)
    {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone(self::TIME_ZONE));
        $date->setTimestamp($timestamp);
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @param string $dateTime
     * @throws Exception
     */
    public static function dateTimeToTimeStamp($dateTime)
    {
        $dateTime = new DateTime($dateTime, new DateTimeZone(self::TIME_ZONE));
        return $dateTime->getTimestamp();
    }

    /**
     * @param string $date
     * @throws Exception
     */
    public static function dateToDateTime($date)
    {
        $dateTime = new DateTime($date, new DateTimeZone(self::TIME_ZONE));
        return $dateTime->format('Y-m-d H:i:s');
    }

    /**
     * @param string $dateTime
     * @throws Exception
     */
    public static function dateTimeToDate($dateTime)
    {
        $dateTime = new DateTime($dateTime, new DateTimeZone(self::TIME_ZONE));
        return $dateTime->format('d.m.Y');
    }

    /**
     * @param string $dateTime
     * @param int $quantity
     * @param string $type
     * @throws SimpleDateTimeException
     * @throws Exception
     */
    public static function add($dateTime, $quantity, $type)
    {
        $dateTime = new DateTime($dateTime, new DateTimeZone(self::TIME_ZONE));
        switch ($type) {
            case self::TYPE_SECOND :
            case self::TYPE_MINUTE :
            case self::TYPE_HOUR :
            case self::TYPE_DAY :
            case self::TYPE_MONTH :
            case self::TYPE_YEAR :
                return $dateTime->modify('+ ' . $quantity . ' ' . $type);
            default :
                throw new SimpleDateTimeException('Error type');
        }
    }

    /**
     * @param string $dateTime
     * @param int $quantity
     * @param string $type
     * @throws SimpleDateTimeException
     * @throws Exception
     */
    public static function subtract($dateTime, $quantity, $type)
    {
        $dateTime = new DateTime($dateTime, new DateTimeZone(self::TIME_ZONE));
        switch ($type) {
            case self::TYPE_SECOND :
            case self::TYPE_MINUTE :
            case self::TYPE_HOUR :
            case self::TYPE_DAY :
            case self::TYPE_MONTH :
            case self::TYPE_YEAR :
                return $dateTime->modify('+ ' . $quantity . ' ' . $type);
            default :
                throw new SimpleDateTimeException('Error type');
        }
    }

    /**
     * @param string $dateTime
     * @throws Exception
     */
    public static function isDateTimeExpired($dateTime)
    {
        $now = new DateTime("now", new DateTimeZone(self::TIME_ZONE));
        $dateTime = new DateTime($dateTime, new DateTimeZone(self::TIME_ZONE));
        if ($dateTime <= $now) {
            return true;
        }
        return false;
    }

    /**
     * @param string $dateTime_1
     * @param string $dateTime_2
     * @throws Exception
     */
    public static function getDateTimesInterval($dateTime_1, $dateTime_2)
    {
        $dateTime_1 = new DateTime($dateTime_1, new DateTimeZone(self::TIME_ZONE));
        $dateTime_2 = new DateTime($dateTime_2, new DateTimeZone(self::TIME_ZONE));
        if ($dateTime_1->getTimestamp() > $dateTime_2->getTimestamp()) {
            return $dateTime_1->getTimestamp() - $dateTime_2->getTimestamp();
        } else {
            return $dateTime_2->getTimestamp() - $dateTime_1->getTimestamp();
        }
    }
}