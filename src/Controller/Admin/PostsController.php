<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Filesystem\File; // Load Class File for delete file
/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
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
        $this->paginate = [
            'contain' => ['Users']
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('post', $post);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {

            $allowed =  array('gif','png' ,'jpg','jpeg');
            $fileName = $this->request->data['myFile']['name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $uploadPath = WWW_ROOT.'uploads/';
            $uploadFile = $uploadPath.$fileName;
            // Check if file is upload and file is match with extension requirement
            if( !empty($this->request->data['myFile']['name']) && in_array($ext,$allowed) ){

                if(move_uploaded_file($this->request->data['myFile']['tmp_name'],$uploadFile)){

                    // Compress Image using Resmush API
                    $compress = $this->Base->resmush($uploadFile);
                    $content = file_get_contents($compress->dest);
                    file_put_contents($uploadFile, $content);

                    $post = $this->Posts->patchEntity($post, $this->request->getData());
                    $post->image= $fileName;
                    $post->user_id= $this->Auth->user('id');;
                    if ($this->Posts->save($post)) {
                        $this->Flash->success(__('The post has been saved.'));
        
                        return $this->redirect(['action' => 'index']);
                    }
                }else{
                    $this->Flash->error(__("Could'nt Save Your Image."));
                }
            }else{
                $this->Flash->error(__('Something Wrong With Your Image File.'));
            }
            
        }
        $category = $this->Posts->Categories->find('list', ['limit' => 20]);
        $this->set(compact('post','category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])){


            $fileName = $this->request->getData('myFile.name');
            $oldData = $this->Posts->findById($id)->first();
            $allowed =  array('gif','png' ,'jpg','jpeg');
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $uploadPath = WWW_ROOT.'uploads/';
            $uploadFile = $uploadPath.$fileName;
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            // Check if (new file is upload) and (file is match with extension requirement)
            if( !empty($fileName) && in_array($ext,$allowed) ){
                // Arrange file path for delete old file and upload new file.
                $path = WWW_ROOT."uploads\\".$oldData->image;
                $file = new File($path,false, 0777);
                $file->delete();

                move_uploaded_file($this->request->data['myFile']['tmp_name'],$uploadFile);
                // Compress Image using Resmush API
                $compress = $this->Base->resmush($uploadFile);
                $content = file_get_contents($compress->dest);
                file_put_contents($uploadFile, $content);

                $post->image= $fileName;

            }elseif( empty($fileName) ){
                $post->image= $oldData->image;
            }else{
                $this->Flash->error(__('Your Image File Extension is not supported'));
                return $this->redirect(['action' => 'index']);
            }
   
            if ($this->Posts->save($post)) {
                
                $this->Flash->success(__('The post has been Updated.'));
                return $this->redirect(['action' => 'index']);

            }else{

                $this->Flash->error(__('The post could not be deleted. Please, try again.'));

            }

        }      
        $category = $this->Posts->Categories->find('list', ['limit' => 20]);
        $this->set(compact('post','category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);

        // Arrange file path for delete file.
        $path = WWW_ROOT."uploads\\".$post->image;
        $file = new File($path,false, 0777);

        if($file->delete()){ //Check file is deleted or not.
            if ($this->Posts->delete($post)) {
                $this->Flash->success(__('The post has been deleted.'));
            } else {
                $this->Flash->error(__('The post could not be deleted. Please, try again.'));
            }
        }else{
            $this->Flash->error(__("There's something wrong with the image file."));
        }

        return $this->redirect(['action' => 'index']);
    }
}
