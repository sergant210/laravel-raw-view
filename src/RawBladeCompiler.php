<?php

namespace RawView;

use Illuminate\View\Compilers\BladeCompiler;

class RawBladeCompiler extends BladeCompiler
{
    /**
     * Compile the view at the given path.
     *
     * @param  string  $path
     * @return void
     */
    public function compile($path = null)
    {
        if (! is_null($this->cachePath)) {
            $contents = $this->compileString($path);

            $this->files->put($this->getCompiledPath($path), $contents);
        }
    }


    /**
     * Get the path to the compiled version of a view.
     *
     * @param  string  $path
     * @return string
     */
    public function getCompiledPath($path)
    {
        return $this->cachePath.'/'.sha1($path).'.php';
    }

    /**
     * Determine if the view at the given path is expired.
     *
     * @param  string  $path
     * @return bool
     */
    public function isExpired($path)
    {
        $compiled = $this->getCompiledPath($path);

        return !$this->files->exists($compiled);
    }

}
