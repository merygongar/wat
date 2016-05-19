<?php
require_once('watInc.php');

$site_title = 'Annotations - WAT';

$user = getSession('wat_user','');
if($user==''){
	header('location: loginForm.php?errormessage=You must be logged in for using the system!!!');
}
require_once('head.php');
require_once('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Document Management</h1>
                    <div class="panel panel-default">
                    	<a href="loaddocument.php" class="btn  btn-lg btn-primary btn-block">Load a New Document</a>
                    </div>

<?php

	//TODO print all the documents that are accessible for the user.
	//$documents = getDocumentsRelatedToUser($user);
	//foreach
/*
        echo '            <div class="panel panel-default">\n';
        echo '                <div class="panel-heading">\n';
        echo '                    <i class="fa fa-bar-chart-o fa-fw"></i> <span class="docTitle">Document Title</span>\n';
        echo '                    <div class="pull-right">\n';
        echo '                    	    <a class="btn btn-info btn-circle" href="editDocument.php?docId='.$docId.'"><i class="fa fa-edit"></i></a>\n';
        echo '                    	    <a class="btn btn-warning btn-circle" href="rightsDocument.php?docId='.$docId.'"><i class="fa fa-cogs"></i></a>\n';
        echo '                    	    <a class="btn btn-danger btn-circle" href="deleteDocument.php?docId='.$docId.'"><i class="fa fa-times"></i></a>\n';
        echo '                    </div>\n';
	echo '		    <div class="docDescription">\n';
	echo '		    Document Description\n';
        echo '                    </div>\n';
        echo '                </div>\n';
        echo '            </div>\n';
*/	
?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <span class="docTitle">Document Title</span>
                            <div class="pull-right">
                            	    <a class="btn btn-info btn-circle" href="editDocument.php?docId=<?= $docId;?>"><i class="fa fa-edit"></i></a>
                            	    <a class="btn btn-warning btn-circle" href="rightsDocument.php?docId=<?= $docId;?>"><i class="fa fa-cogs"></i></a>
                            	    <a class="btn btn-danger btn-circle" href="deleteDocument.php?docId=<?= $docId;?>"><i class="fa fa-times"></i></a>
                            </div>
			    <div class="docDescription">
			    Document Description
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <span class="docTitle">Document Title</span>
                            <div class="pull-right">
                            	    <a class="btn btn-info btn-circle" href="editDocument.php?docId=<?= $docId;?>"><i class="fa fa-edit"></i></a>
                            	    <a class="btn btn-warning btn-circle" href="rightsDocument.php?docId=<?= $docId;?>"><i class="fa fa-cogs"></i></a>
                            	    <a class="btn btn-danger btn-circle" href="deleteDocument.php?docId=<?= $docId;?>"><i class="fa fa-times"></i></a>
                            </div>
			    <div class="docDescription">
			    Document Description
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
require_once('foot.php');
?>
