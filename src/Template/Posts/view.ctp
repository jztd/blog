
<section class="container-fluid content">
    <div class="row">
        <!-- <h1 class="col-lg-6 col-lg-offset-3 text-center"> <?= $post['title']; ?> </h1> -->
        <article class="col-lg-12"> 
            <div class="col-lg-12">
                <h3 class="col-lg-4 text-center post-title"> <?= $post_title ; ?> </h3>
                <?= $this->Html->image($displayPic, array('class' => 'img-responsive', 'style' => 'margin-bottom:16px;')) ?>
            </div>

            <div class="blog-post"><?= $post_text; ?> </div>
        </article>
    </div>
    <div class="row">
    <h2 class="col-lg-12 text-left" style="border-bottom: 1px gray solid"> Comments </h2>
    <?php foreach($comments as $comment)
    { ?>
        <article class="col-lg-12 text-left" style="border-bottom: 1px gray solid">
            <article class="col-lg-1 text-left" style="border-right: 1px gray solid"> <?= $comment['user'] ?> </article>
            <article class="col-lg-11 text-left"> <?= $comment['text'] ?> 
        </article>
         <article class="col-lg-11 text-left"> <?php (($userType == 'admin' || $loggedIn == $comment['user']) ? print($this->Html->link('edit', ['controller' => 'Comments', 'action' => 'edit', $comment['id']])."  ".$this->Form->postLink("Delete", ['controller' => 'Comments', 'action' => 'delete', $comment['id']], ['confirm' => __("Are you sure?")])): ""); ?>
            </article> 
    </article>
    <?php } ?>
    </div>

    <?php 
    if($userType == "admin" || $userType == "user" || $userType == "author")
    {   

        echo $this->Form->create("newCommentForm");
        echo $this->Form->label("comment", "Leave a Comment");
        echo $this->Form->textarea("comment", ['class' => 'col-lg-12']);
        echo $this->Form->button('Post', ['type' => 'submit', 'class' => 'col-lg-1 col-lg-offset-5']);
    } ?>
    
</section>