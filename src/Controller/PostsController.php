<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Posts;
use Cake\ORM\Users;
use Cake\ORM\Comments;
/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //pr($this->Posts->find('newest'));
      $this->set('posts', $this->Posts->find('newest')->toArray());
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->request->is("post"))
        {
            $data = $this->request->data;
            $data['user_id'] = $this->Auth->User('id');
            $data['post_id'] = $id;
            $this->Comments->create($data);
            $this->redirect($this->here);
        }
        $post = $this->Posts->get($id, [
            'contain' => [ 'Comments']
        ]);
       // pr($post);
        $this->set('post_text', $post['text']);
        $this->set('post_title', $post['title']);
        $this->set('displayPic', $post['displayPic']);
        $this->set('post_id', $post['id']);
        $comments = array();
        //pr($post['comments']);
        foreach($post['comments'] as $comment)
        {
            $temp = array(
                'text' => $comment['text'],
                'user' => $this->Posts->Users->get($comment['user_id'])['name'],
                'id' => $comment['id']
                );
            $comments[] = $temp;
        }
        $this->set('comments', $comments);

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];
        if($user['type'] == "admin")
        {
            return true;
        }
        if(in_array($action, ['create']) && $user['type'] == "author")
        {
            return true;
        }
    }

    public function create()
    {
        if($this->request->is('post'))
        {
            $data = $this->request->data;
            pr($data);
            // first handle the picture because that's fun
            move_uploaded_file($data['picture']['tmp_name'], WWW_ROOT.'img'.DS.$data['picture']['name']);

            //save all the data
            $newPost = $this->Posts->newEntity();
            $newPost->title = $data['title'];
            $newPost->user_id = $this->Auth->user('id');
            $newPost->text = $data['text'];
            $newPost->displayPic = $data['picture']['name'];
            if($this->Posts->save($newPost) == true)
            {
                $this->Flash->success(__('New post as been created'));
            }
            else
            {
                $this->Flash->error(__('Could not create post'));
            }
            return $this->redirect(['action' => 'index']);
        }
    }

    public function manage()
    {
     $posts = $this->Posts->find("all");
     $this->set('posts', $posts->toArray());
    }


}
