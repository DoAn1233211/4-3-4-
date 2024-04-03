<?php
function public_url($url= '')
{
	return base_url('public/'.$url);
}

function pre($list,$exit=true)// do ham nay con su dung nhiu lan nen cho vao helper
{
	echo '<pre>';
	print_r($list);
	if($exit)
	{
		die();
	}
}

