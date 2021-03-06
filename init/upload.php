<?php
include 'header.php';
if(($_SESSION['permissions_level'] == 3 && $_SESSION['permission_type'] == 'Public')){

}	
else{
		echo "<script>window.location = 'index.php';</script>'";
}
?>
<body>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Upload files</strong> <small> </small></div>
			<div class="panel-body">
				<div class="input-group image-preview">
				 <form action="handle.php" method="post" enctype="multipart/form-data">
					<input placeholder="" type="text" class="form-control image-preview-filename" disabled="disabled">
					<!-- don't give a name === doesn't send on POST/GET --> 
					<span class="input-group-btn"> 
					<!-- image-preview-clear button -->
					<button type="button" class="btn btn-default image-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
					<!-- image-preview-input -->
					<div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<!-- rename it --> 
					</div>
					<button type="submit" name="submit" class="btn btn-labeled btn-default"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
					</span>
				</form>
					</div>
				<!-- /input-group image-preview [TO HERE]--> 
				
				<br />
				
				<!-- Drop Zone -->
				<div class="upload-drop-zone" id="drop-zone"> Or drag and drop files here </div>
				<br />	
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>




</body>
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
<script type="text/javascript">
	+ function($) {
    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}(jQuery);
</script>
</html>