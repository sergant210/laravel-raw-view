<?php

namespace RawView;

use Illuminate\View\View as BaseView;

class View extends BaseView
{
	
	public function __construct($view, array $data = [])
	{
		$engine = new RawCompilerEngine( new RawBladeCompiler(app('files'), config('view.compiled')) );
		parent::__construct(view(), $engine, sha1($view), $view, $data);
	}
}