<?php

namespace Modules\OlcBlogger;

use App\Cms\Classes\CmsModule;

class OlcBlogger extends CmsModule
{

    public function __construct()
    {
        parent::__construct(
            'Olc Blogger',
            'Module de blog pour le CMS',
            '1.0.0',
            'Olc'
        );
    }

    public function load(): void
    {
    }

    public function install(): void
    {
        try {
            $this->migrate();
        } catch (\Throwable $th) {
            $this->rollback();
            throw $th;
        }
    }

    public function uninstall(): void
    {
        $this->rollback();

        // Delete module from directory
        $directory = $this->getDirectory();
        // Tools::deleteDirectory($directory);
    }
}
