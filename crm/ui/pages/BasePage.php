<?php

declare(strict_types=1);

namespace Crm\Ui\Pages;

use \Framework\Application\Page as Page;
use \Framework\Config\Config as Config;
use \Framework\Utilities\UtilitiesFramework as UtilitiesFramework;

/**
 * This class provides common functions that are used to generate the application pages
 *
 * @category   Page
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
class BasePage extends Page
{
    /**
     * It generates the html for the page
     *
     * @return string $page_html the html for the page
     */
    public function Generate() : string
    {
		/** The header contents are fetched */
		$header_html = $this->GetHeader();
		/** The footer contents are fetched */
		$footer_html = $this->GetFooter();
		/** The html for the page body */
        $body_html   = $this->GetBody();
		/** The script tags are fetched */
		$script_tags = $this->GetScripts();
        /** The template parameters for the table template */
        $tag_values           = array(
                                    "title" => $script_tags['title'],
								    "css_tags" => $script_tags['css'],
									"js_tags" => $script_tags['js'],
									"font_tags" => $script_tags['fonts'],
									"body" => $body_html,
									"header" => $header_html,
									"footer" => $footer_html
							    );
							    
   		/** The html for the page */
        $page_html   = Config::GetComponent("templateengine")->Generate("page", $tag_values);							    

		return $page_html;
    }
    
    /**
     * It provides the html for the page footer
     *
     * @param array $params optional the parameters for generating the footer
     *
     * @return string $footer_html the html for the page footer
     */
    protected function GetFooter(?array $params = null) : string
    { 
        /** If the current url is "/login" */
		if (Config::$config["general"]["request_uri"] == "/login") {
	    	/** The footer html is set to empty */
		    $footer_html = "";
		}
		else {
            /** The application name */
            $app_name     = Config::$config["general"]["app_name"];
            /** The tag values for the footer */
		    $tag_values   = array("year" => date("Y"), "app_name" => $app_name);
            /** The footer is generated */		                
            $footer_html  = Config::GetComponent("templateengine")->Generate("footer", $tag_values);
		}
		
		return $footer_html;
    }
    
    /**
     * It provides the html for the page header
     *
     * @param array $params the parameters for generating the header
     *
     * @return string $header_html the html for the header
     */
    protected function GetHeader(?array $params = null) : string
    {
        /** If the current url is "/login" */
		if (Config::$config["general"]["request_uri"] == "/login") {
	    	/** The header html is set to empty */
		    $header_html = "";
		}
		else {
            /** The application name */
            $app_name    = Config::$config["general"]["app_name"];
            /** The tag values for the header */
		    $tag_values  = array(
		                       "app_name" => $app_name
		                   );
		                           
		    $header_html = Config::GetComponent("templateengine")->Generate("header", $tag_values);
		}
		
		return $header_html;
	}
   
    /**
     * It provides the html for the page body
     *
     * @param array $params the parameters for generating the body
     *
     * @return string $body_html the html for the body
     */
    protected function GetBody(?array $params = null) : string
    {
    	$body_html = "";
    	
    	return $body_html;
    }    
    
    /**
     * It provides the code for the page scripts
     *
     * @param array $params the parameters for generating the scripts
     *
     * @return array $tag_values the script code
     *    title => string the page title
     *    css => string the css tags
     *    js => string the js tags
     *    fonts => string the font tags
     *    ga_code => string the google analytics code
     */
    protected function GetScripts(?array $params = null) : array
    {
        /** The JavaScript, CSS and Font tags are set for the current page */
        $this->UpdateScripts();
        /** The JavaScript, CSS and Font tags are generated */
        $header_tags          = parent::GetHeaderTags();        
        /** If the current url is "/" */
		if (Config::$config["general"]["request_uri"] == "/") {
	    	/** The template tag values */
		    $title = "Dashboard";
		}
		/** If the current url is "/login" */
		else if (Config::$config["general"]["request_uri"] == "/login") {
	    	/** The template tag values */
		    $title = "Welcome To Pak Jiddat CRM";
		}

        /** The template parameters for the table template */
        $tag_values           = array(
                                    "title" => $title,
								    "css" => $header_tags['css'],
									"js" => $header_tags['javascript'],
									"fonts" => $header_tags['fonts']
							    );

        return $tag_values;  
    }
}
