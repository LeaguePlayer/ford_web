<?php

class SiteController extends Controller
{
	public $layout = '//layouts/main';
	
	const TYPE_TEST_DRIVE = 0;
	const TYPE_FEEDBACK = 1;
	const TYPE_STRAHOVANIE = 2;
	const TYPE_CREDIT = 3;
	const TYPE_BUY = 4;
	const TYPE_SERVICE = 5;
 
  
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	public function actionfix()
	{
		$a = "горячие туры, горячи туры, горячий тур, горячие туры +из тюмени, горячие туры +в турцию, горячий тур +в турцию, горячие туры 2013, горячий тур +из екатеринбурга, горячие туры +из екатеринбурга, горячие туры +в сентябре, горячие туры +в египет, горячий тур +в египет, август горячие туры, горячие туры турция 2013, горячие источники тюмень тур, тур горячие источники, горячие туры +на сентябрь 2013, горячий тур +в тайланд, горячие туры +в тайланд, горячие туры +из нижнего новгорода, горячие туры петербург, банк горячих туров, турагентство горячие туры, горячие туры тез тур, горячие туры +на кипр, горячие туры испания, горячий тур испания, горячие туры путевки, турагентство горячий тур, горячий тур кипр, горячие туры цена, горячие туры +из санкт петербурга, горячие туры +на 14 дней, магазин горячих туров, горячие туры +в дубай, горячий тур черногория, турфирма горячий тур, черногория горячие туры, горячие туры +в египет 2013, турфирма горячие туры, горящие горячие туры, горячие туры китай, горячий тур дубай, горячий тур +на август, горячие туры +в оаэ, горячие туры +на август 2013, отдых горячие туры, горячий тур отзывы, горячие туры +в болгарию, горячие туры отзывы, турфирма, турфирмы тюмени, глобус турфирма, турфирма тур тур, тропикана турфирма, турфирма глобус тюмень, оберег турфирма тюмень, турфирмы екатеринбурга, турфирма континент, турфирмы тобольска, отзывы +о турфирмах, турфирма старый, старый город турфирма, турфирма континент тюмень, турфирма море, турфирма солнце, море солнца турфирма, саквояж турфирма, путешествий турфирма, саквояж турфирма тюмень, турфирма горящие, турфирма отдых, библиоглобус турфирма, горящие туры турфирма, апельсин турфирма, путевки турфирмы, библиоглобус турфирма тюмень, турфирма практика, турфирмы ишима, тюменские турфирмы, одиссея турфирма, лучшая турфирма, турфирмы список, киви турфирма, отчеты турфирм, турфирма пегас, турфирмы тюмени список, турфирмы +в тюмени отзывы, беркана турфирма, +а тревел турфирма, турфирма казахстан, турфирма география, тюмень турфирма тропикана, турфирмы сургута, нева турфирма, отчет +по практике +в турфирме, турфирма капитан, турфирма лабиринт, турфирма альфа тур, орион турфирма, туры +в тайланд, туры +из тюмени +в тайланд, туры тайланд 2013, горящие туры +в тайланд, тур +в тайланд цены, тайланд 2014 туры, туры +в тайланд +из екатеринбурга, тайланд +из тюмени горящие туры, тайланд +из екатеринбурга горящие туры, тайланд новый год туры, тайланд туры цены 2013, тур +в тайланд +в ноябре, туры +в тайланд ноябрь 2013, горящие туры +в тайланд 2013, тур +в тайланд +в декабре, туры +в тайланд октябрь 2013, новогодний тур +в тайланд, туры +в тайланд сентябрь 2013, туры +в тайланд +на октябрь, туры +в тайланд декабрь 2013, стоимость тура +в тайланд, тайланд туры тез тур, тур +в тайланд +в январе, тур +в тайланд +в августе, туры +в тайланд +из москвы, туры +в тайланд январь 2014, купить тур +в тайланд, новогодний тур +в тайланд 2014, туры тайланд пхукет, тур путевки +в тайланд, тайланд туры дешево, туры +в тайланд +в феврале, туры +в тайланд +на сентябрь, тайланд отели туры, поиск туров +в тайланд, дешёвые туры +в тайланд, экскурсионные туры +в тайланд, туры тайланд август 2013, подобрать тур +в тайланд, горящие туры +в тайланд цены, тайланд подбор тура, туры +в тайланд +в ноябре цены, туры +в тайланд февраль 2014, натали тур тайланд, анекс тур тайланд, зимние туры +в тайланд, тайланд отдых туры, путевки +в тайланд тез тур, туры +в турцию, турция +из тюмени горящие туры, туры +из тюмени +в турцию, горящие туры +в турцию, горяще туры +в турцию, туры турция 2013, горящие туры турция 2013, турция август туры, туры турция август 2013, горящие туры турция август, горящие туры август 2013 турция, туры +в турцию сентябрь 2013, туры +в турцию +на сентябрь, горящие туры турция сентябрь, тур +в турцию цены, тез тур турция, туры +в турцию +из екатеринбурга, куплю тур +в турцию, купить тур +в турцию, анекс тур турция, поиск тура +в турцию, турция +из екатеринбурга горящие туры, турция туры цены 2013, турция отели туры, тез тур турция +из тюмени, турция отдых туры, туроператор турция тур, турция +в сентябре туры цены, турция октябрь туры, стоимость туров +в турцию, тур путёвка +в турцию, тур турция кемер, турция туры цены 2013 сентябрь, пегас тур турция, тез тур турция 2013, турция горящие туры цены, турция отели цены туры, турция дешево туры, турция тур сайт, дешевые туры +в турцию, горящие туры турция тез тур, тез тур турция цены, туры москва турция, турция туры цены 2013 август, тез тур экскурсии +в турции, тез тур путевки турция, турция туры +в августе цены, отдых +в турции тез тур, туры +в египет, туры +в египет +из тюмени, горящие туры +в египет, туры египет 2013, горящие туры тюмень египет, тур +в египет цены, тур +в египет +в августе, тур +в египет август 2013, египет горящие туры 2013, египет туры цены 2013, египет тез тур, анекс тур египет, египет туры пегас, купить тур египет, тур +в египет +в сентябре, екатеринбург египет туры, туры +в египет 2014, туры египет октябрь, куплю тур +в египет, тур +в египет октябрь 2013, возврат туров +в египет, египет хургада туры, туры +в египет сентябрь 2013, египет туры январь, египет туры отдых, отели египта туры, туры +в египет январь 2014, туры +в египет туроператор, тур +в египет +в ноябре, путевки египет тур, египет +из екатеринбурга горящие туры, туры +в египет ноябрь 2013, египет туры +на новый год, египет туры дешево, дешевые туры египет, египет тур стоимость, продажа туров +в египет, поиск тура +в египет, подбор тура +в египет, отказы +от туров +в египет, горящий тур +в египет хургада, тур +в египет +все включено, египет +из тюмени поиск тура, египет горящие туры цены, отменили туры +в египет, туры +в египет пегас туристик, египет туры цены тез тур, отдых египет горящие туры, индия тур, индия туры цены 2013, туры +в индию 2013, туры +в индию +из тюмени, туры +в индию +из екатеринбурга, горящие туры индию, аюрведа туры +в индию, туры +в индию 2014, индия +из екатеринбурга горящие туры, индия гоа туры, йога туры +в индию, индия тур туроператор официальный сайт, тур +в индию цена, индия тур туроператор, купить индия тур, индия новый год туры, индия +в октябре туры, туры +в индию +в ноябре, туры +в индию +в декабре, туры +в индию +в сентябре, классическая индия тур, туры +в индию +из украины, тур +в индию +из новосибирска, москва индия тур, новогодние туры +в индию, туры +в индию отзывы, экскурсионные туры +по индии, аюрведические туры +в индию, сколько стоит тур +в индию, тур +в индию +на двоих, горящие туры индия гоа, индия горящие туры цены, новогодние туры 2014 +в индию, тур +в кералу индия, тур южная индия, индия тур ру, шоп туры +в индию, йога туры +в индию 2013, горящие туры, туры +из тюмени, горящие туры +из тюмени, поиск тура, туры +из екатеринбурга, туры +из тюмени 2013, горящие туры 2013, горящие туры +из екатеринбурга, горя туры, горящ туры, банк горящих туров, банк горящ туров, банк горящих туров тюмень, горящие туры +из тюмени 2013, кипр +из тюмени горящие туры, горящие туры +на август, горящие туры август 2013, горящие туры +в сентябре, горящие туры +на сентябрь 2013, горящие туры +из москвы, горящие туры +на кипр, горящие туры цены, тур горящих путевок, тез тур горящие туры, горящие туры 2013 +из екатеринбурга, горящие туры +в грецию, пегас горящие туры, горящие туры +из тюмени екатеринбурга, магазин горящих туров, горящие туры +из екатеринбурга август, горящие туры официальный сайт, греция +из тюмени горящие туры, пегас туристик горящие туры, горящие туры испания, магазин горящих туров тюмень, горящие туры 2013 цены, горящие туры +из новосибирска, горящие туры отзывы, банк горящих туров екатеринбург, горящие туры +в оаэ, анекс горящие туры, туры +в испанию, туры +в испанию +из тюмени, туры испания 2013, тур испания сентябрь, тур +в испанию цена, туры +в испанию +из екатеринбурга, испания туры сентябрь 2013, тез тур испания, экскурсионные туры +в испанию, туры испания октябрь, испания туры отзывы, испания отдых туры, испания туры цены 2013, валенсия испания туры, натали тур испания, тур испания италия, испания +из екатеринбурга горящие туры, тур виза +в испанию, испания автобусный тур, испания барселона тур, тез тур испания экскурсии, испания туры цены 2013 сентябрь, туры +в испанию октябрь 2013, экскурсии туры +в испанию, испания франция туры, автобусные туры испания италия, туры испания италия франция, туры испания отели, туры +в испанию +в августе, автобусный тур испания франция, горящие туры +в испанию 2013, туры испания париж, испания комбинированный тур, испания туры август 2013, автобусный тур франция италия испания, испания экскурсионные туры 2013, анекс тур испания, отдых испания автобусный тур, автобусный тур испания море, купить тур испания, тез тур виза испания, тест тур испания, стоимость тура +в испанию, 1 тур чемпионата испании, ноябрь туры испания, туры +в испанию ноябрь 2013, салоу испания туры, туры +в сентябре, туры +в сентябре 2013, туры +из тюмени +в сентябре, туры +в сентябре 2013 цены, цены +на туры сентябрь, туры +в грецию +в сентябре, туры +из екатеринбурга +в сентябре, греция туры сентябрь 2013, туры +на кипр +в сентябре, греция туры цены 2013 сентябрь, греция туры +в сентябре цены, италия тур сентябрь, туры болгарии +в сентябре, туры оаэ +в сентябре, тур +на кипр сентябрь 2013, туры +в санкт петербург сентябрь, стоимость туров +в сентябре, туры +в болгарию сентябрь 2013, туры италия сентябрь 2013, купить тур +на сентябрь, оаэ туры цены +в сентябре, тур сентябрь черногория, вьетнам туры сентябрь, кипр туры цены 2013 сентябрь, тур черногория 2013 сентябрь, туры август сентябрь, тунис тур сентябрь, болгария туры цены 2013 сентябрь, туры +в тунис сентябрь 2013, туры +в сентябре +из москвы, туры +в прагу +в сентябре, черногория туры цены сентябрь 2013, туры +на крит сентябрь 2013, туры +из сургута +в сентябре, туры +в октябре, туры октябрь 2013, туры +в октябре цены, туры +в октябре 2013 цены, туры +в эмираты +в октябре, тур оаэ +в октябре, горящие туры +на октябрь, прага тур октябрь, тур +в кипр +в октябре, туры тунис октябрь, туры +в прагу октябрь 2013, тур +во вьетнам +в октябре, горящие туры +на октябрь 2013, туры тунис октябрь 2013, чехия туры +в октябре, греция тур октябрь, экскурсионные туры октябрь, автобусные туры октябрь, тур италия октябрь, турция туры октябрь 2013, гоа октябрь туры, экскурсионные туры +в октябре 2013, туры кипр октябрь 2013, стоимость туров +в октябре, тур +в европу +в октябре, туры +в хургаду +в октябре, туры +в гоа октябрь 2013, тур +в израиль +в октябре, тур +в италию октябрь 2013, тур +в таиланд +в октябре, куба туры октябрь, туры +в израиле +в октябре, туры октябрь ноябрь, дешевые туры +в октябре, тур греция октябрь 2013, туры сентябрь октябрь, купить тур +на октябрь 2013, китай +в октябре туры, туры +из москвы +в октябре, турция туры цены октябрь, туры +на крит октябрь 2013, самые дешевые туры +в октябре, туры доминикана октябрь, туры +в оаэ, туры +в оаэ +из тюмени, туры +в оаэ 2013, оаэ туры цены, оаэ туры цены 2013, туры +в оаэ +в ноябре, туры +в оаэ ноябрь 2013, оаэ +из тюмени горящие туры, туры +в оаэ +из екатеринбурга, туры +в оаэ +в августе, натали тур оаэ, туры оаэ натали турс, туры оаэ новый год, туры оаэ январь, оаэ тез тур, новогодние туры +в оаэ, поиск тура оаэ, купить тур +в оаэ, горящие туры оаэ +из екатеринбурга, новогодние туры +в оаэ 2014, туры +в оаэ декабрь, туры отдых оаэ, туры оаэ 2013 +из екатеринбурга, тур оаэ дубай, оаэ туры отели, пегас туристик туры +в оаэ, туры +в оаэ пегас, оаэ туры отзывы, оаэ подбор тура, туры +в оаэ +в феврале, отдых +в оаэ тез тур, туры оаэ дубай цены, туры +в оаэ +из омска, горящие туры +в оаэ 2013, рекламные туры оаэ, оаэ туры цены отели, оаэ горячий тур, рассчитать тур +в оаэ, оаэ шоп туры, шоппинг туры +в оаэ, дешевые туры +в оаэ, шубные туры +в оаэ, рекламные туры оаэ 2013, анекс тур оаэ, бронирование туров +в оаэ";
		
		$a = explode(", ", $a);
		
		foreach ($a as $b)
		{
			echo $b."<br>";	
		}
	}

	 /*
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$news_stocks = new News;
		$menu = new Menu;
		
		$data['stock'] = $news_stocks->getStock();
		$data['super_stock'] = $news_stocks->super_stock;
		$data['menu'] = $menu->getMenu(true);
		$data['slider'] = Slider::getSliders();
		
		
					if($this->settings->meta_desc)
						Yii::app()->clientScript->registerMetaTag($this->settings->meta_desc, 'description');            
					if($this->settings->meta_keys)
						Yii::app()->clientScript->registerMetaTag($this->settings->meta_keys, 'keywords');
					if($this->settings->meta_title) Yii::app()->controller->title=$this->settings->meta_title;
						else Yii::app()->controller->title = Yii::app()->name;
		
	
		$this->bottom_list['title'] = "НОВОСТИ";
		$this->bottom_list['data'] = $news_stocks->getNews();
		$this->bottom_list['link'] = "news";
		$this->bottom_list['link_text'] = "Архив новостей";
		
		
		
		
		$this->render('index',array('data'=>$data));
	}
	
	public function actionDealer()
	{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			$data['partners'] = Partners::getPartners();
			$data['page'] = Staticpage::getSystemPage(26);
			fnc::registredSEO($data['page']);
			
			$data['camera'] = Staticpage::getSystemPage(1);
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			$this->render('dealer',array('data'=>$data));
	}
	
	public function actionOwner()
	{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['page'] = Staticpage::getSystemPage(19);
			fnc::registredSEO($data['page']);
			
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			$this->render('owner',array('data'=>$data));
	}
	
	public function actionCars($id_category)
	{
			$cars = new Carssitespublic;
			
			$data['avail_cars'] = $cars->getAvailCars($id_category); 
		
			if(Yii::app()->request->isAjaxRequest)
			{
				$this->renderPartial('/cars/_cars',array('cars'=>$data['avail_cars']));
				return true;	
			}
			
			$news_stocks = new News;
			$menu = new Menu;
		//	$stuff = new Stuff;
			
			
			$data['menu'] = $menu->getMenu();
			$data['id_category']=$id_category;
		//	$data['stuff'] = $stuff->getStuff();
			
			
			
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			$this->render('cars',array('data'=>$data));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			$news_stocks = new News;
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
		
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	
	
	public function actionThanks()
	{
		
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['page'] = Staticpage::getSystemPage(2);
			fnc::registredSEO($data['page']);
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			$this->render('thanks',array('data'=>$data));	
	}
	
	
	public function actionTestDrive($car= false)
	{
		//fnc::mpr($_POST);
		
	
		$this->settings->access_to_test_drive = unserialize($this->settings->access_to_test_drive);
			
		
		
		$model = new Orders;
		
		
		
		if(isset($_POST['data']))
		{
			
			$model->attributes=$_POST['data'];
			$model->status = 0;
			$model->id_type = self::TYPE_TEST_DRIVE;
			$model->id_site = $this->id_site;
			
			if(is_numeric($car)) 
			{
				
				$model->car = Cars::model()->findByPk($car)->title;
				
			}
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_test_drive) ? $this->settings->email_test_drive : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?test_drive'));
			}
		}
		
		
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/test_drive', array('model'=>$model, 'car'=>$car));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/test_drive', array('model'=>$model, 'car'=>$car));	
		}
		
	}
	
	
	public function actionFeedback()
	{
		//fnc::mpr($_POST);
		
		
		
		$model = new Orders;
		
		if(isset($_POST['Orders']))
		{
			
			$model->attributes=$_POST['Orders'];
			$model->status = 0;
			$model->id_type = self::TYPE_FEEDBACK;
			$model->id_site = $this->id_site;
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_feedback) ? $this->settings->email_feedback : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?feedback'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/feedback', array('model'=>$model, 'type'=>'feedback'));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['car_menu'] = $car_model; // потом исправить эту штуку
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/feedback', array('model'=>$model, 'type'=>'feedback'));	
		}
		
	}
	
	
	
	public function actionStrahovanie()
	{
		//fnc::mpr($_POST);
		
		
		
		$model = new Orders;
		
		if(isset($_POST['Orders']))
		{
			
			$model->attributes=$_POST['Orders'];
			$model->status = 0;
			$model->id_type = self::TYPE_STRAHOVANIE;
			$model->id_site = $this->id_site;
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_strahovanie) ? $this->settings->email_strahovanie : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?strahovanie'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/feedback', array('model'=>$model, 'type'=>'strahovanie'));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['car_menu'] = $car_model; // потом исправить эту штуку
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/feedback', array('model'=>$model, 'type'=>'strahovanie'));	
		}
		
	}
	
	
	
	public function actionCredit($id_car=false)
	{
		//fnc::mpr($_POST);
		
		
		
		$model = new Orders;
		
		if(isset($_POST['Orders']))
		{
			
			$model->attributes=$_POST['Orders'];
			$model->status = 0;
			$model->id_type = self::TYPE_CREDIT;
			$model->id_site = $this->id_site;
			
			if(is_numeric($id_car)) $model->car = Cars::model()->findByPk($id_car)->title;
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_credit) ? $this->settings->email_credit : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?credit'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/feedback', array('model'=>$model, 'type'=>'credit'));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['car_menu'] = $car_model; // потом исправить эту штуку
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/feedback', array('model'=>$model, 'type'=>'credit'));	
		}
		
	}
	
	
	public function actionBuy($id_car=false)
	{
		//fnc::mpr($_POST);
		
		
		$model = new Orders;
		
		if(isset($_POST['Orders']))
		{
			
			$model->attributes=$_POST['Orders'];
			$model->status = 0;
			$model->id_type = self::TYPE_BUY;
			$model->id_site = $this->id_site;
			
			if(is_numeric($id_car)) $model->car = Cars::model()->findByPk($id_car)->title;
			
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_buy) ? $this->settings->email_buy : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?buy'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/feedback', array('model'=>$model, 'type'=>'buy'));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['car_menu'] = $car_model; // потом исправить эту штуку
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/feedback', array('model'=>$model, 'type'=>'buy'));	
		}
		
	}
	
	
	public function actionService($id_car=false)
	{
		//fnc::mpr($_POST);
		
		
		$model = new Orders;
		
		if(isset($_POST['Orders']))
		{
			
			$model->attributes=$_POST['Orders'];
			$model->status = 0;
			$model->id_type = self::TYPE_SERVICE;
			$model->id_site = $this->id_site;
			
			if(is_numeric($id_car)) $model->car = Cars::model()->findByPk($id_car)->title;
			
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_service) ? $this->settings->email_service : $this->settings->email_main_admin );
				
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?service'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/feedback', array('model'=>$model, 'type'=>'service'));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['car_menu'] = $car_model; // потом исправить эту штуку
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/feedback', array('model'=>$model, 'type'=>'service'));	
		}
		
	}
	
	public function actionVideodealer($position)
	{
			
					
					switch($position)	
					{
						case 1:
						
							if(!empty($this->settings->video1))
								$video = $this->settings->video1;
						break;	
						case 2:
							if(!empty($this->settings->video2))
								$video = $this->settings->video2;
						break;	
						
					}
					
			
			
			if( !isset($video) ) throw new CHttpException(404, 'Страница не существует.');
			
			$data['video'] = $video;
			//$data['title'] = "О";
			
			if(Yii::app()->request->isAjaxRequest)
			{
				$this->renderPartial('/modal_views/video', array( 'data'=>$data ) );
			}
			else
			{
				$news_stocks = new News;
				$menu = new Menu;
				
				
				$data['menu'] = $menu->getMenu();
				
				
				
			
		
				$this->bottom_list['title'] = "НОВОСТИ";
				$this->bottom_list['data'] = $news_stocks->getNews();
				$this->bottom_list['link'] = "news";
				$this->bottom_list['link_text'] = "Архив новостей";
				
			
				
				$this->render('/modal_views/video', array( 'data'=>$data ));	
			}
	}
	
	public function actionVideo($car=false, $position = false)
	{
		if( is_numeric($car) and is_numeric($position) )
		{
			$get_car_model = Cars::model()->findByPk($car);
			
			if(is_object($get_car_model))
			{
				
				switch($position)	
				{
					case 1:
					
						if(!empty($get_car_model->video1))
							$video = $get_car_model->video1;
					break;	
					case 2:
						if(!empty($get_car_model->video2))
							$video = $get_car_model->video2;
					break;	
					case 3:
						if(!empty($get_car_model->video3))
							$video = $get_car_model->video3;
					break;	
				}
				
			}
		}
		
		if( !isset($video) ) throw new CHttpException(404, 'Страница не существует.');
		
		$data['video'] = $video;
		$data['title'] = $get_car_model->title;
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/video', array( 'data'=>$data ) );
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			
			
			$data['menu'] = $menu->getMenu();
			
			
			
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
		
			
			$this->render('/modal_views/video', array( 'data'=>$data ));	
		}
		
	}
}