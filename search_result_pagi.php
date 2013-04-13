<?php
// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM resto a, katresto b, kota c WHERE
         a.katresto_id_katresto=b.id_katresto AND a.kota_id_kota=c.id_kota
         $sq $sq2 $sq3";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages["num"];
	
	/* Setup vars for query. */
	if (isset($_GET['show'])){
		$limit = $_GET['show'];	
	}else{
		$limit=10;
	}
	
	if (isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}							
	
	$targetpage = "search.php?q=$q&q2=$q2&q3=$q3&show=$limit"; 	//your file name  (the name of this file)
	
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM resto a, katresto b, kota c WHERE
         a.katresto_id_katresto=b.id_katresto AND a.kota_id_kota=c.id_kota
         $sq $sq2 $sq3 LIMIT $start, $limit";
    //echo "$sql";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination pagination-centered\"><ul>";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a href=\"$targetpage&page=$prev\">prev</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><span>prev</span></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class='active'><span>$counter</span></li>";
				else
					$pagination.= "<li class=''><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class='active'><span>$counter</span></li>";
					else
						$pagination.= "<li class=''><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "...";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class='active'><span>$counter</span></li>";
					else
						$pagination.= "<li class=''><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
				$pagination.= "...";
				$pagination.= "<li><a href=\"$targetpage&page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage&page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage&page=2\">2</a></li>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class='active'><span>$counter</span></li>";
					else
						$pagination.= "<li class=''><a href=\"$targetpage&page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$targetpage&page=$next\">next</a><li>";
		else
			$pagination.= "<li class=\"disabled\"><span>next</span></li>";
		$pagination.= "</ul></div>\n";		
	}
?>