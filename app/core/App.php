<?php

namespace App\Core;

class App
{
	protected $controller = "Home";
	protected $method = "index";
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseURL();

		// controller
		if (isset($url[0]) && file_exists("../app/controllers/{$url[0]}.php")) {  // cek apakah ada file dengan nama $url[0]
			$this->controller = $url[0];
			unset($url[0]); // menghapus url pertama, karena sudah diambil untuk controller
		}
		$class = "\\App\\Controllers\\".$this->controller;  // dynamic call class with namespace
		$this->controller = new $class();

		// method 
		if (isset($url[1])) {  // cek apakah ada $url[1]
			if (method_exists($this->controller, $url[1])) {  // cek apakah ada method $url[1] didalam $this->controller
				$this->method = $url[1];
				unset($url[1]);  // menghapus data array $url[1]
			}
		}

		// params
		if (!empty($url)) { // setelah dihapus jika masih ada array, berarti itu params
			$this->params = array_values($url); // mengambil semua value array yang tersisa
		}

		// jalankan controller & method, serta kirimkan params jika ada
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');  // hapus / di paling akhir
			$url = filter_var($url, FILTER_SANITIZE_URL); // untuk memfilter URL dari hal yg jahat
			$url = explode("/", $url);  // pecah string menjadi array
			return $url;
		}
	}

}
