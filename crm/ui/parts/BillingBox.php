<?php

declare(strict_types=1);

namespace Crm\Ui\Parts;

use \Framework\Config\Config as Config;
use \Framework\Utilities\UtilitiesFramework as UtilitiesFramework;

/**
 * This class implements the BillingBox component class
 * It is used to generate the billing box component
 *
 * @category   Parts
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
class BillingBox
{
    /**
     * It provides the html for the billing box
     *
     * @return string $box_html the box html
     */
    public function Generate() : string
    {
        /** The current billings is returned */
        $billing     = $this->GetCurrentBilling();
        /** The parameters used to generate the billing box */
        $params     = array(
                          "id" => "billing-box",
                          "color" => "yellow",
                          "text" => "Monthly Billing",
                          "link" => "#billing",
                          "icon" => "far fa-money-bill-alt",
                          "value" => $billing
                      );
        
        /** The billing box html is generated */
        $box_html   = Config::GetComponent("templateengine")->Generate("box", $params);
        
        return $box_html;
    }
    
    /**
     * It returns the current billing
     *
     * @return string $billing the formatted current amount to be billed
     */
    private function GetCurrentBilling() : string
    {
        /** The dbinit object is fetched */
        $dbinit            = Config::GetComponent("dbinit");
        /** The Database class object is fetched */
        $database          = $dbinit->GetDbManagerClassObj("Database");
		/** The billing table name */
        $table_name1       = Config::$config['general']['mysql_table_names']['billing'];
		/** The customer table name */
        $table_name2       = Config::$config['general']['mysql_table_names']['customers'];
        
        /** The SQL query for fetching the website content */
        $sql               = "SELECT SUM(t1.hours * t2.exchange_rate * ";
        $sql              .= "(REPLACE(SUBSTRING(t2.payment_rate, LOCATE(' ', t2.payment_rate)+1, 3 ), '/', '')))";
        $sql              .= " as sum FROM `" . $table_name1 . "` t1, `" . $table_name2 . "` t2";
        $sql              .= " WHERE t1.payed='No' and t1.customer_id=t2.id";
        /** The first row is fetched */
        $row              = $database->FirstRow($sql);
        /** sum is formatted */
        $sum              = (int) $row['sum'];
        /** The total amount is formatted */
        $billing          = "Rs " . number_format($sum);
               
        return $billing;
    }
}
