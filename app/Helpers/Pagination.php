<?php

namespace App\Helpers;

/**
* 
*/
class Pagination
{
	private $current;
	private $limit;
	private $total;
	private $preurl;
	
	function __construct($current, $total, $limit, $preurl)
	{
		$this->current = $current;
		$this->total = $total;
		$this->preurl = $preurl;
		
		if ($limit <= 0) 
			$this->limit = 10;
		else
			$this->limit = $limit;
	}

	function getPagination() {
		$totalPage = ceil($this->total / $this->limit);
		if ($totalPage < 2)
			return null;

		if ($this->current < 1 || $this->current > $totalPage) {
			$this->current = 1;
		}

		$pagination = '<ul class="pagination">';
		$x1 = 0;
		$x2 = $totalPage + 1;
		if ($this->current >= 6) {
			$x1 = $this->current - 2;
		}
		if ($this->current < $totalPage-4) {
			$x2 = $this->current + 2;
		}
		for ($i = 1; $i <= $totalPage; $i++) {
			$url = $this->preurl . '&page=' . $i;
			if ($i > 2 && $i < $x1) {
				$pagination .= '<li class="disabled"><a>...</a></li>';
				$i = $x1;
			}
			else if ($i > $x2 && $i < $totalPage-1) {
				$pagination .= '<li class="disabled"><a>...</a></li>';
				$i = $totalPage - 2;
			}
			else if ($i == $this->current)
				$pagination .= '<li class="active"><a>'.$i.'</a></li>';
			else
				$pagination .= '<li><a url="'.$url.'">'.$i.'</a></li>';
		}
		$pagination .= '</ul>';
	//	echo $pagination;
		return $pagination;
	}
}
