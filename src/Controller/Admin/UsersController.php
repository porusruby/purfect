<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Filesystem\File; // Load Class File for delete file
//Load Library Initial Avatar
require_once(ROOT . DS  . 'vendor' . DS  . 'lasserafn' . DS . 'php-initial-avatar-generator' . DS . 'src' . DS . 'InitialAvatar.php' );
use LasseRafn\InitialAvatarGenerator\InitialAvatar;
use Cake\Utility\Text;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Base');
        $this->viewBuilder()->setLayout('admin');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        //$users = $this->paginate($this->Users);
        $users = $this->Users->find('all')->where(['Users.id !=' => '5']);

        $this->set(compact('users'));
    }

    public function dashboard()
    {
        $this->render();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add','logout']);
    }

    public function setting()
    {
        $id   = $this->Auth->user('id');
        $user = $this->Users->findById($id)->first();

        if ($this->request->is(['patch', 'post', 'put'])){
            $fileName = $this->request->getData('myFile.name');
            $oldData = $this->Users->findById($id)->first();
            $allowed =  array('gif','png' ,'jpg','jpeg');
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $uploadPath = WWW_ROOT.'uploads/';
            $uploadFile = $uploadPath.$fileName;
            $user = $this->Users->patchEntity($user, $this->request->getData());

            // Check if (new file is upload) and (file is match with extension requirement)
            if( !empty($fileName) && in_array($ext,$allowed) ){
                // Arrange file path for delete old file and upload new file.
                $path = WWW_ROOT."uploads\\".$oldData->avatar;
                $file = new File($path,false, 0777);
                $file->delete();

                move_uploaded_file($this->request->data['myFile']['tmp_name'],$uploadFile);
                // Compress Image using Resmush API
                $compress = $this->Base->resmush($uploadFile);
                $content = file_get_contents($compress->dest);
                file_put_contents($uploadFile, $content);

                $user->avatar = $fileName;

            }elseif( empty($fileName) ){
                $user->avatar = $oldData->avatar;
            }else{
                $this->Flash->error(__('Your Image File Extension is not supported'));
                return $this->redirect(['action' => 'setting']);
            }
   
            if ($this->Users->save($user)) {
                
                $this->Flash->success(__('The post has been Updated.'));
                return $this->redirect(['action' => 'setting']);

            }else{

                $this->Flash->error(__('The post could not be deleted. Please, try again.'));

            }

        }

        $this->set(compact('user'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {   
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {   
        if($this->Auth->logout()){
            return $this->redirect(['action' => 'index']);
        }

    }

    public function filemanager()
    {
        $this->viewBuilder()->setLayout('admin');
        $this->render();
    }

}
