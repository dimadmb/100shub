<?PHP

require_once('Api.class.php');

class ProductsApi extends Api
{
	
	public function get($id = null)
	{
		if(empty($id))
		{
			return $this->get_list();
		}
		else
		{
			return $this->get_item(intval($id));
		}
	}
	
	private function get_list()
	{	
		$filter = array
		(
			'category_id'	=> $this->request->param('category_id'),
			'limit'			=> $this->request->param('limit'),
			'page'			=> $this->request->param('page')
		);
			
		$products = $this->catalog->get_products($filter);		
		
		$doc = new DOMDocument('1.0', "UTF-8");
		$doc->formatOutput = true;
		$ps = $doc->createElement("products");
		$doc->appendChild($ps);
		
		foreach($products as $product)
		{
			$p = $doc->createElement("product");
		
			$product_id = $doc->createElement("id");
			$product_id->appendChild($doc->createTextNode($product->id));
			$p->appendChild($product_id);
		
			$product_url = $doc->createElement("url");
			$product_url->appendChild($doc->createTextNode($product->url));
			$p->appendChild($product_url);
		 
			$product_name = $doc->createElement("name");
			$product_name->appendChild($doc->createTextNode($product->name));
			$p->appendChild($product_name);
		
			$product_category_id = $doc->createElement("category_id");
			$product_category_id->appendChild($doc->createTextNode($product->category_id));
			$p->appendChild($product_category_id);
		
			$product_category = $doc->createElement("category");
			$product_category->appendChild($doc->createTextNode($product->category));
			$p->appendChild($product_category);
		
			$product_brand_id = $doc->createElement("brand_id");
			$product_brand_id->appendChild($doc->createTextNode($product->brand_id));
			$p->appendChild($product_brand_id);
		
			$product_brand = $doc->createElement("brand");
			$product_brand->appendChild($doc->createTextNode($product->brand));
			$p->appendChild($product_brand);
		
			$product_annotation = $doc->createElement("annotation");
			$product_annotation->appendChild($doc->createTextNode($product->annotation));
			$p->appendChild($product_annotation);
		
			$product_body = $doc->createElement("body");
			$product_body->appendChild($doc->createTextNode($product->body));
			$p->appendChild($product_body);
		
			$product_meta_title = $doc->createElement("meta_title");
			$product_meta_title->appendChild($doc->createTextNode($product->meta_title));
			$p->appendChild($product_meta_title);
		
			$product_meta_keywords = $doc->createElement("meta_keywords");
			$product_meta_keywords->appendChild($doc->createTextNode($product->meta_keywords));
			$p->appendChild($product_meta_keywords);
		
			$product_meta_description = $doc->createElement("meta_description");
			$product_meta_description->appendChild($doc->createTextNode($product->meta_description));
			$p->appendChild($product_meta_description);
		
			$product_created = $doc->createElement("created");
			$product_created->appendChild($doc->createTextNode($product->created));
			$p->appendChild($product_created);
		
			$product_modified = $doc->createElement("modified");
			$product_modified->appendChild($doc->createTextNode($product->modified));
			$p->appendChild($product_modified);
			
			$vs = $doc->createElement("variants");
			
			// Варианты
			foreach($product->variants as $variant)
			{
				$v = $doc->createElement("variant");
				
				$variant_id = $doc->createElement("id");
				$variant_id->appendChild($doc->createTextNode($variant->id));
				$v->appendChild($variant_id);
				
				$variant_product_id = $doc->createElement("product_id");
				$variant_product_id->appendChild($doc->createTextNode($variant->product_id));
				$v->appendChild($variant_product_id);
				
				$variant_sku = $doc->createElement("sku");
				$variant_sku->appendChild($doc->createTextNode($variant->sku));
				$v->appendChild($variant_sku);
				
				$variant_name = $doc->createElement("name");
				$variant_name->appendChild($doc->createTextNode($variant->name));
				$v->appendChild($variant_name);
				
				$variant_price = $doc->createElement("price");
				$variant_price->appendChild($doc->createTextNode($variant->price));
				$v->appendChild($variant_price);
				
				$variant_stock = $doc->createElement("stock");
				$variant_stock->appendChild($doc->createTextNode($variant->stock));
				$v->appendChild($variant_stock);
				
				$variant_download = $doc->createElement("download");
				$variant_download->appendChild($doc->createTextNode($variant->download));
				$v->appendChild($variant_download);
				
				$vs->appendChild($v);
			}
			$p->appendChild($vs);
			
			$is = $doc->createElement("images");
			
			// Изображения
			foreach($product->images as $image)
			{
				$i = $doc->createElement("image");
				
				$image_id = $doc->createElement("id");
				$image_id->appendChild($doc->createTextNode($image->id));
				$i->appendChild($image_id);
				
				$image_product_id = $doc->createElement("product_id");
				$image_product_id->appendChild($doc->createTextNode($image->product_id));
				$i->appendChild($image_product_id);
				
				$image_filename = $doc->createElement("filename");
				$image_filename->appendChild($doc->createTextNode($image->filename));
				$i->appendChild($image_filename);
				
				$is->appendChild($i);
			}
			$p->appendChild($is);
			
		
			$ps->appendChild( $p );
		}
		
		return $doc->saveXML();
	}
	
	
	private function get_item($id)
	{	

		$product = $this->catalog->get_product($id);
		
		if(!$product)
			return false;		

		$doc = new DOMDocument('1.0', "UTF-8");
		$doc->formatOutput = true;

		$p = $doc->createElement("product");
		$doc->appendChild($p);
	
		$product_id = $doc->createElement("id");
		$product_id->appendChild($doc->createTextNode($product->id));
		$p->appendChild($product_id);
	
		$product_url = $doc->createElement("url");
		$product_url->appendChild($doc->createTextNode($product->url));
		$p->appendChild($product_url);
	 
		$product_name = $doc->createElement("name");
		$product_name->appendChild($doc->createTextNode($product->name));
		$p->appendChild($product_name);
	
		$product_category_id = $doc->createElement("category_id");
		$product_category_id->appendChild($doc->createTextNode($product->category_id));
		$p->appendChild($product_category_id);
	
		$product_category = $doc->createElement("category");
		$product_category->appendChild($doc->createTextNode($product->category));
		$p->appendChild($product_category);
	
		$product_brand_id = $doc->createElement("brand_id");
		$product_brand_id->appendChild($doc->createTextNode($product->brand_id));
		$p->appendChild($product_brand_id);
	
		$product_brand = $doc->createElement("brand");
		$product_brand->appendChild($doc->createTextNode($product->brand));
		$p->appendChild($product_brand);
	
		$product_annotation = $doc->createElement("annotation");
		$product_annotation->appendChild($doc->createTextNode($product->annotation));
		$p->appendChild($product_annotation);
	
		$product_body = $doc->createElement("body");
		$product_body->appendChild($doc->createTextNode($product->body));
		$p->appendChild($product_body);
	
		$product_meta_title = $doc->createElement("meta_title");
		$product_meta_title->appendChild($doc->createTextNode($product->meta_title));
		$p->appendChild($product_meta_title);
	
		$product_meta_keywords = $doc->createElement("meta_keywords");
		$product_meta_keywords->appendChild($doc->createTextNode($product->meta_keywords));
		$p->appendChild($product_meta_keywords);
	
		$product_meta_description = $doc->createElement("meta_description");
		$product_meta_description->appendChild($doc->createTextNode($product->meta_description));
		$p->appendChild($product_meta_description);
	
		$product_created = $doc->createElement("created");
		$product_created->appendChild($doc->createTextNode($product->created));
		$p->appendChild($product_created);
	
		$product_modified = $doc->createElement("modified");
		$product_modified->appendChild($doc->createTextNode($product->modified));
		$p->appendChild($product_modified);
		
		// Варианты
		if($product->variants)
		{
			$vs = $doc->createElement("variants");
			
			foreach($product->variants as $variant)
			{
				$v = $doc->createElement("variant");
				
				$variant_id = $doc->createElement("id");
				$variant_id->appendChild($doc->createTextNode($variant->id));
				$v->appendChild($variant_id);
				
				$variant_product_id = $doc->createElement("product_id");
				$variant_product_id->appendChild($doc->createTextNode($variant->product_id));
				$v->appendChild($variant_product_id);
				
				$variant_sku = $doc->createElement("sku");
				$variant_sku->appendChild($doc->createTextNode($variant->sku));
				$v->appendChild($variant_sku);
				
				$variant_name = $doc->createElement("name");
				$variant_name->appendChild($doc->createTextNode($variant->name));
				$v->appendChild($variant_name);
				
				$variant_price = $doc->createElement("price");
				$variant_price->appendChild($doc->createTextNode($variant->price));
				$v->appendChild($variant_price);
				
				$variant_stock = $doc->createElement("stock");
				$variant_stock->appendChild($doc->createTextNode($variant->stock));
				$v->appendChild($variant_stock);
				
				$variant_download = $doc->createElement("download");
				$variant_download->appendChild($doc->createTextNode($variant->download));
				$v->appendChild($variant_download);
				
				$vs->appendChild($v);
			}
			$p->appendChild($vs);
		}
		
		// Изображения
		if($product->images)
		{
			$is = $doc->createElement("images");
			
			foreach($product->images as $image)
			{
				$i = $doc->createElement("image");
				
				$image_id = $doc->createElement("id");
				$image_id->appendChild($doc->createTextNode($image->id));
				$i->appendChild($image_id);
				
				$image_product_id = $doc->createElement("product_id");
				$image_product_id->appendChild($doc->createTextNode($image->product_id));
				$i->appendChild($image_product_id);
				
				$image_filename = $doc->createElement("filename");
				$image_filename->appendChild($doc->createTextNode($image->filename));
				$i->appendChild($image_filename);
				
				$is->appendChild($i);
			}
			$p->appendChild($is);
		}

		return $doc->saveXML();
	}
		
	public function count()
	{	
		$filter = array
		(
			'category_id'	=> $this->request->param('category_id'),
			'limit'			=> $this->request->param('limit'),
			'page'			=> $this->request->param('page')
		);
			
		$count = $this->catalog->count_products($filter);		
		
		$doc = new DOMDocument('1.0', "UTF-8");
		$doc->formatOutput = true;
		$c = $doc->createElement("count");
		$c->appendChild($doc->createTextNode($count));
		$doc->appendChild($c);
				
		return $this->encode_html_entities($doc->saveXML());
	}
	
	public function update($id)
	{	
		$fields = array(
			'url',
			'category_id',
			'brand_id',
			'name',
			'annotation',
			'body',
			'published',
			'meta_title',
			'meta_keywords',
			'meta_description',
			'created',
			'modified');
		
		$data = file_get_contents('php://input');
		$xml = new SimpleXMLElement($this->encode_html_entities($data));
				
		$product = array();
		foreach($fields as $field)
		{
			if(isset($xml->$field))
			{
				$product[$field] = $xml->$field;
			}
		}

		if($this->catalog->update_product($id, $product))
			return $this->get_item($id);
		else
			return false;
	}	
	
	public function create()
	{	
		$fields = array(
			'url',
			'category_id',
			'brand_id',
			'name',
			'annotation',
			'body',
			'published',
			'meta_title',
			'meta_keywords',
			'meta_description',
			'created',
			'modified');
		
		$data = file_get_contents('php://input');
		$xml = new SimpleXMLElement($this->encode_html_entities($data));
				
		$product = array();
		foreach($fields as $field)
		{
			if(isset($xml->$field))
			{
				$product[$field] = $xml->$field;
			}
		}

		if($id = $this->catalog->create_product($product))
			return $this->get_item($id);
		else
			return false;
	}	
	
}
