<?php

namespace App\Repositories;

use Illuminate\Http\Request;

abstract class BaseRepository
{

	public function all()
	{
		return $this->model;
		return $this->model->get();
	}

	public function store(Request $request)
    {
        $model = $this->model->create($request->all());

        return $model;
    }

}