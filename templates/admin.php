<!DOCTYPE html>

<div class="container">           
    <div class="page-header">
        <img src="img/admin_logo.jpg" class="img-responsive" alt="admin logo">
        <h1>Admin<h1>
        <small>
            Manage your Quizdata here
        </small>
        </h1>
    </div>
    
    <div class="row">                          
        <div class="col-md-6">
            <h3>Add a Question</h3>
            <form role="form" method="post">  
                <div class="form-group">
                    <label for="question">Question:</label>
                    <textarea class="form-control" rows="4" cols="50" id="question" placeholder="What is the meaning of life.." required></textarea>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer1">Answer 1:</label>
                        <div class="checkbox">
                            <label><input type="checkbox" id="correct1">Correct</label>
                        </div>
                        <input type="text" class="form-control" id="answer1" placeholder="The Answers.." required>
                    </div>                   
                    <div class="form-group">
                        <label for="answer2">Answer 2:</label>
                        <div class="checkbox">
                            <label><input type="checkbox" id="correct2">Correct</label>
                        </div>
                        <input type="text" class="form-control" id="answer2" placeholder="The Answers.." required>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer3">Answer 3:</label>
                        <div class="checkbox">
                            <label><input type="checkbox" id="correct3">Correct</label>
                        </div>
                        <input type="text" class="form-control" id="answer3" placeholder="The Answers.." required>
                    </div>
                    <div class="form-group">
                        <label for="answer4">Answer 4:</label>
                        <div class="checkbox">
                            <label><input type="checkbox" id="correct4">Correct</label>
                        </div>
                        <input type="text" class="form-control" id="answer4" placeholder="The Answers.." required>
                    </div>
                </div>
                <div class="col-md-6>">
                    <div class="form-group">
                        <label for="addToCategory">Add to Category:</label>
                        <select id="addToCategory" class="form-control">
                            <?php if(!isset($categories)):?> 
                                <option>No Categories Found..</option> 
                            <?php else:?>
                                <option>Choose Category</option>
                                <?php foreach($categories as $menuItem): ?>
                                    <option value="<?php print($menuItem['id'])?>"><?php print($menuItem['name']);?> </option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                </div>                    
                <button type="submit" class="btn btn-primary">Save</button>
            </form>             
            
            <h3>Add a category</h3>
            <form method="post" role="form">
                <div class="form-group">
                    <label for="addCategoryName">Name:</label>
                    <input type="text" class="form-control" id="addCategoryName" placeholder="A Name.." required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>              
        </div>
      
        <div class="col-md-6">
            <h3>Remove Stuff</h3>
            <form method="post" role="form">
                <div class="form-group">
                    <label for="deleteQuestion">Remove Question:</label>
                    <select id="deleteQuestion" class="form-control">
                        <?php if(!isset($questions)):?> 
                            <option>No Questions Found..</option> 
                        <?php else:?>
                            <option>Choose Question</option>
                            <?php foreach($questions as $menuItem): ?>
                                <option value="<?php print($menuItem['id'])?>"><?php print($menuItem['name']);?> </option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </div>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <form method="post" role="form">
                <div class="form-group">
                    <br>
                    <label for="deleteCategory">Remove Category:</label>
                    <select id="deleteCategory" class="form-control">
                        <?php if(!isset($categories)):?> 
                            <option>No Categories Found..</option> 
                        <?php else:?>
                            <option>Choose Category</option>
                            <?php foreach($categories as $menuItem): ?>
                                <option value="<?php print($menuItem['id'])?>"><?php print($menuItem['name']);?> </option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </div>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>   
</div>
