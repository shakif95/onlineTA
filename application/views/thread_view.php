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
                    <li class="active">Sidebar Page</li>
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
                
                foreach ($threads as $key => $value) { ?>
                 <div class="alert alert-success">
	                <h3><?php echo $value->subject ?></h3>
	                 <i class="fa fa-thumbs-up" aria-hidden="true"></i>
						<?php echo $value->votes ?>
						
						
	                <?php if($value->teacher_flag == 1){?>
	                	<i class="fa fa-star" aria-hidden="true"></i>
					<?php  }else{ ?>
	                	<i class="fa fa-star-o" aria-hidden="true"></i>
						
				<?php 	} ?>
	              </div>  
	                <p><?php echo $value->post?></p>
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
          
          <input type="submit"  name="submit" value=" Send message " class="btn btn-primary" />
          <input type="hidden"  name="course_id" value="<?php echo $course_id ?>"/>
        </div>
          </form>
      	
      	
      	
    </div>
  </div>
</div>
