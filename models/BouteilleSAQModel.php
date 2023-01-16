<?php
class BouteilleSAQ extends Modele
{
       /**
	 * Requête SELECT de la liste de bouteilles SAQ
	 *
	 * @return array[] liste de bouteille SAQ 
	 */
	public function getListeBouteille()
	{
		return $this->database->fetchAll('SELECT * FROM bouteille');
	}


    public function addBouteilleSAQ($data) 
    {
        extract($data);
        $this->database->query('INSERT INTO bouteille ?', [ 
            'bout_nom' => $bout_nom,
            'bout_image' => $bout_image,
            'bout_code_saq' => $bout_code_saq,
            'bout_pays' => $bout_pays,
            'bout_description' => $bout_description,
            'bout_prix_saq' => $bout_prix_saq,
            'bout_url_saq' => $bout_url_saq,
            'bout_url_img' => $bout_url_img,
            'bout_format' => $bout_format,
            'bout_type_id' => $bout_type_id
        ]);
        
        return $this->database->getInsertId(); 
    }

    
    /**
     * Récupère les Bouteilles de la SAQ
     * https://www.scraperapi.com/blog/simple-guide-to-building-a-php-web-scraper-using-goutte-for-beginners/
     * @param  mixed $page_id l'id de la page
     * @return void
     */
    public function fetch_bottle_from_SAQ($page_id)
    {
        $client = new Goutte\Client();
        $crawler = $client->request('GET', 'https://www.saq.com/fr/produits/vin/vin-rouge?p='.$page_id.'&product_list_limit=96');
    
        $crawler->filter('.product-item-info')->each(function ($node) {
            $data['bout_nom'] = $node->filter('.product-item-link')->text();
            $data['bout_image'] = $node->filter('.product-image-photo')->attr('src');
            $data['bout_code_saq'] = $node->filter('.saq-code > span + span')->text();
            // prix
            $data['bout_prix_saq'] = $node->filter('span .price')->text();
            $data['bout_prix_saq'] = (double) str_replace(['$', ','], ['', '.'], $data['bout_prix_saq']);
            $data['bout_url_img'] = $node->filter('.product-image-photo')->attr('src');
            $data['bout_type_id'] = 1;
            $data['bout_url_saq'] = $node->filter('.product-item-photo')->attr('href');
            // Vin rouge  |  750 ml  |  Espagne
            $span_divider = $node->filter('.product-item-identity-format')->text();
            $data['bout_description'] = trim($span_divider);
    
            $span_divider = explode('|', $span_divider);
            $data['bout_format'] = trim($span_divider[1]);
            $data['bout_pays'] =  trim($span_divider[2]);
    
            // à supprimer
            echo '<pre>';
            print_r($data);
            echo '</pre>';

            $this->addBouteilleSAQ($data);
        });
    }





 
}
