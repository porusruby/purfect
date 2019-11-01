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
        //Check if user is admin or not
        if($this->Auth->user('role') != 'admin' ){
            return $this->redirect(['action' => 'setting']);
        }
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
        $this->Auth->allow(['logout']);
        
    }

    public function setting()
    {
        $id   = $this->Auth->user('id');
        $user = $this->Users->findById($id)->first();

        if ($this->request->is(['patch', 'user', 'put'])){
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
                if( $file->delete() ){

                }else{
                    unlink($path);
                }
               

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
                
                $this->Flash->success(__('The user has been Updated.'));
                return $this->redirect(['action' => 'setting']);

            }else{

                $this->Flash->error(__('The user could not be deleted. Please, try again.'));

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
        //Check if user is admin or not
        if($this->Auth->user('role') != 'admin' ){
            return $this->redirect(['action' => 'setting']);
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            //Generate Initial Avatar
            $lowerTitle = strtolower($user->fullname);
            $full = Text::slug($lowerTitle);
            $count = $this->Users->find('all',array('conditions'=> array('Users.fullname'=> $user->fullname)))->count();
            $no    = intval($count);
            if( $count > 0 ) {
                $user->avatar = $full."-".$no.".png";
            }else{
                $user->avatar = $full.".png";
            }
            $uploadPath = WWW_ROOT.'uploads/users/';
            $uploadFile = $uploadPath.$user->avatar;
            $avatar = new InitialAvatar();
            $image = $avatar->name($user->fullname)->background('#D33C44')->color('#fff')->generate();
            
            if ($this->Users->save($user)) {
                file_put_contents($uploadFile, $image->save('png', 100));
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
        //Check if user is admin or not
        if($this->Auth->user('role') != 'admin' ){
            return $this->redirect(['action' => 'setting']);
        }

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
        //Check if user is admin or not
        if($this->Auth->user('role') != 'admin' ){
            return $this->redirect(['action' => 'setting']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        // Arrange file path for delete file.
        $path = WWW_ROOT."uploads\users\\".$user->avatar;
        $file = new File($path,false, 0777);

        if($file->delete()){ //Check file is deleted or not.
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
        }else{
            $this->Flash->error(__("Image for this data , can't remove."));
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
