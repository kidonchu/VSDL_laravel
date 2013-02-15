<?php

class Category extends Eloquent
{
	public function notes()
	{
		return $this->has_many('Note');
	}
}
