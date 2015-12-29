<?PHP

/**
 * Simpla CMS
 * Storefront class: Каталог товаров
 *
 * Этот класс использует шаблоны hits.tpl
 *
 * @copyright 	2010 Denis Pikusov
 * @link 		http://#
 * @author 		Denis Pikusov
 *
 * 
 *
 */
 
require_once('View.php');


class HitsView extends View
{

	function fetch()
	{
		// Выбираем все хиты
		$products = array();
		foreach($this->products->get_products(array('hit'=>1, 'in_stock'=>1)) as $p)
			$products[$p->id] = $p;
		
		$discount = 0;
		if(isset($_SESSION['user_id']) && $user = $this->users->get_user(intval($_SESSION['user_id'])))
			$discount = $user->discount;
			
		if(!empty($products))
		{
			// id выбраных товаров
			$products_ids = array_keys($products);
	
			// Выбираем варианты товаров
			$variants = $this->variants->get_variants(array('product_id'=>$products_ids));
			
			// Для каждого варианта
			foreach($variants as &$variant)
			{
				// добавляем вариант в соответствующий товар
				// $variant->price *= (100-$discount)/100;
				$products[$variant->product_id]->variants[] = $variant;
			}
			
			// Выбираем изображения товаров
			$images = $this->products->get_images(array('product_id'=>$products_ids));
			foreach($images as $image)
				$products[$image->product_id]->images[] = $image;

			foreach($products as &$product)
			{
				if(isset($product->variants[0]))
					$product->variant = $product->variants[0];
				if(isset($product->images[0]))
					$product->image = $product->images[0];
			}
	
			// Передаем товары в шаблон
			$this->design->assign('products', $products);
			
		}
		
		if($this->page)
		{
			$this->design->assign('meta_title', $this->page->meta_title);
			$this->design->assign('meta_keywords', $this->page->meta_keywords);
			$this->design->assign('meta_description', $this->page->meta_description);
		}

		return $this->design->fetch('hits.tpl');
	}
}
