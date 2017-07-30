   <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $course_name?>
                    <small>All threads</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('profile')?>">Home</a>
                    </li>
                    <li class="active">Threads</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-2">
                <div class="list-group">
                   	<button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Ask a Question</button>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-10">
                   <?php if($this->session->flashdata('conf'))
                   {?>
                   	
					
					<div class="alert alert-info">
						  <strong> <?php  echo $this->session->flashdata('conf');?> </strong>
					</div>
                   	
				  <?php } ?> 
	
				  
                   
                
                <?php 
                //var_dump($threads);die;
                foreach ($threads as $key => $value) { ?>
                	
                 <div class="alert alert-success">
	                <h3><?php echo $value->subject ?></h3>
	                <p><?php echo $value->post?></p>
	                 
	                 <i style="padding-top: 15px" class="fa fa-thumbs-up" aria-hidden="true"></i>
						<?php echo $value->votes ?>
						
	               </br>
				
				
				
					<a href="<?php echo site_url('comment/all_comment/'.$value->id)?>"> 
						<i class="fa fa-comments" aria-hidden="true">All Comments</i>
					</a>
				
				
					<div class="row">  &nbsp;</div>
					 <form role="form" action="<?php echo site_url('comment/save_comment')?>" method="post">
          
			            <div class="form-group">
			              <label for="message-text" class="form-control-label">Comment here:</label>
			              <textarea style="width: 50%" class="form-control"  name="comment" id="message-text"></textarea>
			            </div>
			            	<input type="hidden" name="thread_id" value="<?php echo $value->id?>" />
          					<input type="submit"  name="submit" value=" Comment " class="btn btn-primary" />
							<span style="float: right">
								
								Teachers Flag:
							    <?php
							    $url =site_url('thread/update_teacher_flag');
								
								if($_SESSION['user_type'] ==1){
								    if($value->teacher_flag == 1){
								    	?>
										<i id ='star<?php echo $value->id?>'  onclick="flag_it(<?php echo $value->id.','.$value->teacher_flag.',0'.',\''.$url.'\''?>)" class="fa fa-star fa-2x" style="color:gray;cursor:pointer" aria-hidden="true"></i>
									<?php }else{?>
										<i id ='star<?php echo $value->id?>'  onclick="flag_it(<?php echo $value->id.','.$value->teacher_flag.',0'.',\''.$url.'\''?>)" class="fa fa-star-o fa-2x" style="color:gray;cursor:pointer" aria-hidden="true"></i>
										
								<?php }
								
								}else if($_SESSION['user_type'] ==2){
								    if($value->teacher_flag == 1){
								    	?>
										<i id ='star<?php echo $value->id?>'  class="fa fa-star fa-2x" style="color:gray;" aria-hidden="true"></i>
									<?php }else{?>
										<i id ='star<?php echo $value->id?>'  class="fa fa-star-o fa-2x" style="color:gray;" aria-hidden="true"></i>
										
								<?php }
								}
								
									
								  	?>
										                				
								</br>
								By: <a href=""> <?php echo $value->first_name  ." ". $value->last_name ?></a> <br>
								<?php echo $value->created_on ?>
							</span>	          				
          			</form>
					<div class="row">  &nbsp;</div>
	              </div>  
	            <?php } ?>
            </div>
        </div>
        <!-- /.row -->


    </div>
    



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	
      	
      	<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Ask your question here !! </h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo site_url('thread/saveQuestion')?>">
           	
           	<div class="form-group">
              <label for="message-text" class="form-control-label">Subject:</label>
              <input type="text" class="form-control" name="subject" id="message-text"/>
            </div>
           
           
            <div class="form-group">
              <label for="message-text" class="form-control-label">Question:</label>
              <textarea class="form-control" name="question" id="message-text"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
          <input type="submit"  name="submit" value=" Post " class="btn btn-primary" />
          <input type="hidden"  name="course_id" value="<?php echo $course_id ?>"/>
        </div>
          </form>
      	
      	
      	
    </div>
  </div>
</div>
