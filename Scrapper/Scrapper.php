<?php

    /**
     * @author Prosper SEDGO
     * @created_at 07/06/2022
     * @last_update 07/06/2022
     * @github https://github.com/Prosper226?tab=repositories
     * @version 1.0.
     */

    namespace Scrapper;
    use Exception;
    use Goutte\Client;

    class Scrapper{

        public function __construct(){

        }
        /**
         * 
         *  - convert a unit from the first currency to the second
         *  - convertir une unité de la première monnaie à la seconde
         */
        public function getXOF($current1 = 'dollar', $current2 = 'fcfa'): Float{
            try{
                // $httpClient = new \Goutte\Client();
                $httpClient = new Client();
                $response = $httpClient->request('GET', "https://www.google.com/search?q=un+$current1+en+$current2");
                $prices = $response->evaluate('//div[@class="BNeawe iBp4i AP7Wnd"]');
                foreach ($prices as $key => $price) {
                    // return explode("Franc CFA", $price->textContent . PHP_EOL)[0];
                    $xof = $price->textContent . PHP_EOL;
                    // error_log($xof);
                    //str_replace("Original Value", "Value to be replaced", "String");
                    $xof = str_replace(",", ".", trim(htmlspecialchars($xof)));
                    return floatval(explode("Franc CFA", $xof)[0]);
                }
            }catch(Exception $e){
                throw new Exception("Could not resolve host: www.google.com");
                // throw new Exception($e->getMessage());
            }
        }
        
    }

?>