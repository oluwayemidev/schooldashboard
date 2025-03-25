<?php

class PageController
{
    private function render($view, $title)
    {
        $content = __DIR__ . '/../views/' . $view . '.php';

        if (!file_exists($content)) {
            http_response_code(404);
            $content = __DIR__ . '/../views/404.php';
        }

        include __DIR__ . '/../views/layout.php';
    }

    public function home()
    {
        $this->render('pages/home', 'Home - School Dashboard');
    }

    public function about()
    {
        $this->render('pages/about', 'About Us - School Dashboard');
    }

    public function contact()
    {
        $this->render('pages/contact', 'Contact - School Dashboard');
    }
}
