<?php

	namespace App\Helpers;

	class UrlCustom
	{

		static public function convertAccentedCharacters($str)
	    {

	        return strtr(utf8_decode($str), utf8_decode("àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ"), "aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY");

	    }

	    static public function urlClean($str, $separator = "-", $lowercase = true)
	    {

	        if($separator === "admin")
	        {

	            $separator = "";

	        }
	        else if($separator === "underscore")
	        {

	            $separator = "_";

	        }

	        $q_separator = preg_quote($separator, "#");

	        $convert = array(

	            "&.+?;" => "",
	            "[^\w\d _-]" => "",
	            "\s+" => $separator,
	            "(" . $q_separator . ")+" => $separator

	        );

	        $str = strip_tags($str);

	        foreach($convert as $key => $val)
	        {

	            $str = preg_replace("#" . $key . "#iu", $val, $str);

	        }

	        if($lowercase === true)
	        {

	            $str = strtolower($str);

	        }

	        return trim(trim($str, $separator));

	    }

	}