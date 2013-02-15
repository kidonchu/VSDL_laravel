<?php

class Note extends Eloquent
{
	public function category()
	{
		return $this->belongs_to('Category');
	}
}