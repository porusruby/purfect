<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Filesystem\File; // Load Class File for delete file
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Global');
        $this->viewBuilder()->setLayout('admin');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pages = $this->paginate($this->Pages);

        $this->set(compact('pages'));
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);

        $this->set('page', $page);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $page = $this->Pages->newEntity();
        if ($this->request->is('post')) {

            $allowed =  array('gif','png' ,'jpg','jpeg');
            $fileName = $this->request->data['image']['name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $uploadPath = WWW_ROOT.'uploads/';
            $uploadFile = $uploadPath.$fileName;
            // Check if file is upload and file is match with extension requirement
            if( !empty($this->request->data['image']['name']) && in_array($ext,$allowed) ){

                if(move_uploaded_file($this->request->data['image']['tmp_name'],$uploadFile)){

                    // Compress Image using Resmush API
                    $compress = $this->Global->resmush($uploadFile);
                    $content = file_get_contents($compress->dest);
                    file_put_contents($uploadFile, $content);

                    $page = $this->Pages->patchEntity($page, $this->request->getData());
                    $page->image= $fileName;
                    
                    if ($this->Pages->save($page)) {
                        $this->Flash->success(__('The page has been saved.'));
        
                        return $this->redirect(['action' => 'index']);
                    }
                }else{
                    $this->Flash->error(__("Could'nt Save Your Image."));
                }
            }else{
                $this->Flash->error(__('Something Wrong With Your Image File.'));
            }
            
        }
        $this->set(compact('page'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])){


            $fileName = $this->request->getData('image.name');
            $oldData = $this->Pages->findById($id)->first();
            $allowed =  array('gif','png' ,'jpg','jpeg');
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $uploadPath = WWW_ROOT.'uploads/';
            $uploadFile = $uploadPath.$fileName;
            $page = $this->Pages->patchEntity($page, $this->request->getData());

            // Check if new file is upload and file is match with extension requirement
            if( !empty($fileName) && in_array($ext,$allowed) ){
                // Arrange file path for delete old file and upload new file.
                $path = WWW_ROOT."uploads\\".$oldData->image;
                $file = new File($path,false, 0777);
                $file->delete();

                move_uploaded_file($this->request->data['image']['tmp_name'],$uploadFile);
                $page->image= $fileName;

            }elseif( empty($fileName) ){
                $page->image= $oldData->image;
            }else{
                $this->Flash->error(__('Your Image File Extension is not supported'));
                return $this->redirect(['action' => 'index']);
            }
   
            if ($this->Pages->save($page)) {
                
                $this->Flash->success(__('The page has been Updated.'));
                return $this->redirect(['action' => 'index']);

            }else{

                $this->Flash->error(__('The Page could not be deleted. Please, try again.'));

            }

        }      
        
        $this->set(compact('page'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);

        // Arrange file path for delete file.
        $path = WWW_ROOT."uploads\\".$page->image;
        $file = new File($path,false, 0777);

        if($file->delete()){ //Check file is deleted or not.
            if ($this->Pages->delete($page)) {
                $this->Flash->success(__('The Page has been deleted.'));
            } else {
                $this->Flash->error(__('The Page could not be deleted. Please, try again.'));
            }
        }else{
            $this->Flash->error(__("There's something wrong with the image file."));
        }

        return $this->redirect(['action' => 'index']);
    }

    

}
