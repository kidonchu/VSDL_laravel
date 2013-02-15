<?php

class Notes_Controller extends Base_Controller
{
	public function get_index()
	{
		$notes = Note::all();
	
		return View::make('notes.index')->with('notes', $notes);
	}

	public function get_create()
	{
		$categories = Category::all();
		
		foreach($categories as $cat)
		{
			$cats[$cat->id] = $cat->category;
		}

		return View::make('notes.create')->with('cats', $cats);
	}

	public function post_create()
	{
		if (Input::get('cancel'))
		{
			return Redirect::to('notes');
		}
		
		$note = new Note;

		$cat = Input::get('cat');

		if (Input::get('newcat'))
		{
			$category = Category::create(array('category' => Input::get('newcat')));
			$cat = $category->id;
		}

		$note->category_id = $cat;
		$note->note = Input::get('note');
		$note->save();

		return Redirect::to('notes');
	}

	public function get_update($id)
	{
		$categories = Category::all();
		
		foreach($categories as $cat)
		{
			$cats[$cat->id] = $cat->category;
		}

		$note = Note::find($id);

		if (is_null($note))
		{
			return Redirect::to('notes');
		}

		$data = array(
			'cats' => $cats,
			'note' => $note
		);

		return View::make('notes.update', $data);
	}

	public function post_update($id)
	{
		if (Input::get('cancel'))
		{
			return Redirect::to('notes');
		}

		$note = Note::find($id);

		if (is_null($note))
		{
			return Redirect::to('notes');
		}

		$cat = Input::get('cat');

		if (Input::get('newcat'))
		{
			$category = Category::create(array('category' => Input::get('newcat')));
			$cat = $category->id;
		}

		$note->category_id = $cat;
		$note->note = Input::get('note');
		$note->save();

		return Redirect::to('notes');
	}

	public function get_delete($id)
	{
		$note = Note::find($id);

		if (is_null($note))
		{
			return Redirect::to('notes');
		}

		$note->delete();

		return Redirect::to('notes');
	}
}