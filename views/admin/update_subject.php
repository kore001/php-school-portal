<?php
    include(View::NavBar());
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                The School Subjects
                <small>Administrator's panel</small>
            </h1>
            <ol class="breadcrumb">
                <p style="color:#da620b"> <?php echo Session::breadcrumbs(); ?>  - You are here</p>


            </ol>


        </section>

        <?php
            $mod = $this->subject;
        ?>        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <section class="content-header">
                <h2>
                    Update subject: <?php echo($mod['subject_name']); ?>
                </h2>
                <div class="box-body">
                    <?php if(Session::exists('home')){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            <?php echo Session::flash('home');?>                         </div>
                    <?php  ?>
                    <?php } elseif(Session::exists('error')){ ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <?php echo Session::flash('error');  //echo  //$this->error;?>
                        </div>
                    <?php }
                    else{?>
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-info"></i> Alert!</h4>
                            Here is where you enter new info
                        </div>
                    <?php } ?>

                </div>


            </section>

            <div class="row">
                <!-- left column -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">THE subject</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <p>When you wish to create a new subject, there are a couple of things you need to note.</p>
                            <ul>
                                <li><strong>The Classroom:</strong> Anything with position one is what appears first in the display. The position 1, is also unique as it shows up on the home page also. The position shows the hierarchy of how it would be displayed to the user. </li>
                                <li><strong>The Parent:</strong> Anything with Visibility equals to one will be shown, while Visibility equals to zero(0) will be hidden. This is useful if you just want to hide and not delete a particular content. </li>
                            </ul>



                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Improve this Description</button>
                        </div>
                    </div>
                    <!-- /.box -->


                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update <?php echo($mod['subject_name']); ?> Subject </h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?php echo(URL.'admin/create_subject/'.$mod['subject_id']); ?>" method="post" id="contact_form" enctype="multipart/form-data">
                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="subject_name">Subject Full Name</label>
                                    <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Enter  Full Name e.g. Introductory Technology ..." value="<?php if (Session::exists('subject_name')){ echo(Session::flash('subject_name')); }else{ echo($mod['subject_name']);} ?>">
                                </div>
                                <div class="form-group">
                                    <label for="subject_alias">Subject Short Name/ Alias</label>
                                    <input type="text" class="form-control" id="subject_alias" name="subject_alias" placeholder="Enter  Short Name e.g. Intro Tech ..." value="<?php if (Session::exists('subject_alias')){ echo(Session::flash('subject_alias')); }else{ echo($mod['subject_alias']);} ?>">
                                </div>

                                <div class="form-group">
                                    <label>Subject Objectives</label>
                                    <textarea class="form-control textarea" rows="2" placeholder="Enter details here ..." id="description" name="description">
                                        <?php if (Session::exists('description')){ echo(Session::flash('description')); }else{ echo($mod['description']);} ?>
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="subject_for">Subject Class</label>
                                    <p class="help-block">If you choose a Parent Class say JS1, it applies also to JS1a, JS1b, etc.</p>
                                    <select class="form-control" name="subject_for" id="subject_for">

                                        <option value="">Nil</option>

                                        <?php foreach ($this->class as $class){  ?>
                                            <option value="<?php echo $class['class_id']; ?>" <?php if ($mod['subject_for'] == $class['class_id'] ){echo "selected=\"selected\"";} ?> ><?php echo $class['class_name'] ; ?></option>


                                        <?php }  ?>




                                    </select>
                                </div>
                                <div class="form-group">
                                    <p>Subject has a Lab Session:
                                        <label>
                                            <input name="visible" type="radio" id="visible_0" value="0" <?php if ($mod['prerequisite']== 0 || Session::flash('visible') === 0){ echo("checked=\"checked\""); } ?> />
                                            No</label>
                                        &nbsp;
                                        <label>
                                            <input type="radio" name="visible" value="1" id="visible_1" <?php if ($mod['prerequisite']== 1 || Session::flash('visible') === 1){ echo("checked=\"checked\""); } ?> />
                                            Yes</label>
                                    </p>




                                </div>

                                <div class="form-group">
                                    <label>Prerequisites</label>
                                    <textarea class="form-control textarea" rows="3" placeholder="Enter prerequisite here ..." id="prerequisite" name="prerequisite">
                                        <?php if (Session::exists('prerequisite')){ echo(Session::flash('prerequisite')); }else{ echo($mod['prerequisite']);} ?>
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Text books</label>
                                    <textarea class="form-control textarea" rows="3" placeholder="Enter text books here ..." id="text_books" name="text_books">
                                        <?php if (Session::exists('text_books')){ echo(Session::flash('text_books')); }else{ echo($mod['text_books']);} ?>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tools</label>
                                    <textarea class="form-control textarea" rows="3" placeholder="Enter tools here e.g. Drawing board, Lab coat,etc ..." id="tools" name="tools">
                                        <?php if (Session::exists('tools')){ echo(Session::flash('tools')); }else{ echo($mod['tools']);} ?>
                                    </textarea>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!--/.col (left) -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php
    include(View::rightNav());
?>