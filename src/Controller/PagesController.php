<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('default');
    }
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
            //return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->loadModel('Posts');
            $this->loadModel('Pages');
            $this->loadModel('Categories');
            $categories = $this->Categories->find('all');
            $posts = $this->Posts->find('all');
            /**
             * 
             * Displays a view & data based on page
             *
             */
            if($path[0] != 'home')
            {
                $page  = $this->Pages->findBySlug($path[0])->firstOrFail();
                $this->set(compact('posts','page','categories'));
                $this->render('/Pages/page');
            }else{
                $this->set(compact('posts','categories'));
                $this->render(implode('/', $path));
            }
            
            
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function show(...$path)
    {   
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }elseif (in_array('..', $path, true) || in_array('.', $path, true)) {
            return $this->redirect('/');
        }else{
            $this->set(compact('page', 'subpage'));
        }
    }


}
