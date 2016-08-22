<?php
namespace MicroFrame\System;

class Request
{
    const SESSION_REFERER = 'referer';

    /**
     * Get page referer
     *
     * @since 22. February 2014, v. 100
     * @return string Page referer
     */
    public static function getReferer()
    {
        $strReferer = '';
        if(isset($_SERVER['HTTP_REFERER']))
        {
            $strReferer = $_SERVER['HTTP_REFERER'];

            if(isset($_SESSION[self::SESSION_REFERER]))
            {
                $strSessionRef = $_SESSION[self::SESSION_REFERER];
                if($strSessionRef != $strReferer)
                {
                    $strReferer = $strSessionRef;
                }
            }
            else
            {
                $_SESSION[self::SESSION_REFERER] = $strReferer;
            }
        }
        return $strReferer;
    }// getReferer


    /**
     * Redirect to url
     *
     * @param null|string $strRedirect URL to redirect to. If none defined referer will be used (@see getReferer()
     *
     * @since 17. April 2014, v. 1.00
     * @return void
     */
    public function redirect($strRedirect = null)
    {
        if(!$strRedirect)
        {
            $strRedirect = $this->getReferer();
        }
        header('Location: ' . $strRedirect);
    }// redirect

}// Request