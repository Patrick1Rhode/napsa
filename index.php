<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<body>
<div ng-app="">
<input type="text" ng-model="name">
<p>{{name}}</p>
</div>
<?php 
$digits = 6;
echo rand(pow(10, $digits-1), pow(10, $digits)-1);
?>
</body>
</html>