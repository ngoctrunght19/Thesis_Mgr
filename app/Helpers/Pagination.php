<?php

namespace App\Helpers;

/**
* 
*/
class Pagination
{
	public $current;
	public $limit;
	public $total;
	
	function __construct($current, $total, $limit)
	{
		$this->current = $current;
		$this->total = $total;
		
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
		for ($i = 1; $i <= $totalPage; $i++) {
			if ($i == $this->current)
				$pagination .= '<li class="active"><a href="#">'.$i.'</a></li>';
			else
				$pagination .= '<li><a href="#">'.$i.'</a></li>';
		}
		$pagination .= '</ul>';
	//	echo $pagination;
		return $pagination;
	}
}
