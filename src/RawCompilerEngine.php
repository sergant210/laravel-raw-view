<?php

namespace RawView;

use Illuminate\View\Engines\CompilerEngine;

class RawCompilerEngine extends CompilerEngine
{
    /**
     * Get the evaluated contents of the view.
     *
     * @param  string  $path
     * @param  array   $data
     * @return string
     */
    public function get($path, array $data = [])
    {
        $this->lastCompiled[] = $path;

        if ($this->compiler->isExpired($path)) {
            $this->compiler->compile($path);
        }
        $compiled = $this->compiler->getCompiledPath($path);

        $results = $this->evaluatePath($compiled, $data);

        array_pop($this->lastCompiled);

        return $results;
    }

    /**
     * Get the exception message for an exception.
     *
     * @param  \Throwable  $e
     * @return string
     */
    protected function getMessage(\Throwable $e)
    {
        return $e->getMessage() . ' (View template: ' . last($this->lastCompiled).')';
    }

}
