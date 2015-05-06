<div class="container" ng-app="myApp" ng-controller="mainController">
<hr/>
	<div class="panel panel-primary" ng-init="showData()">
	  <div class="panel-heading">
		<h3 class="panel-title">Applicants</h3> 
	  </div>
	  <div class="panel-body">
		<table class="table table-condensed table-hover">
		<thead>
			<tr class="info">
				<td>#</td>
				<td>Posting Date</td>
				<td>Position</td>
				<td>Unprocessed Applications</td>
				<td>Total Applications</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="applicant in applicants | pagination: curPage * pageSize | limitTo: pageSize">
				<td>{[$index]}</td>
				<td><time title="{[applicant.created | amDateFormat: 'dddd, MMMM Do YYYY, h:mm a' ]}">{[applicant.created | amCalendar]}</time></td>
				<td>{[applicant.job_title]}</td>
			</tr>
		</tbody> 
		</table>
	  </div>
	  	<div class="form-group">
          <div class="col-lg-2">
            <div class="pagination pagination-centered" ng-show="applicants.length">
              <p><button class="btn btn-xs btn-default" style="color:black;" type="button" ng-disabled ="curPage == 0" ng-click="curPage=curPage-1">prev</button>  <small>Page {[curPage + 1]} of {[ numberOfPages() ]}</small> <button class="btn btn-xs btn-default" style="color:black;" ng-disabled="curPage >= applicants.length/pageSize - 1" ng-click="curPage = curPage+1">next</button></p>
            </div>
          </div>
        </div>
	</div>
</div>
<script>
myApp.filter('pagination', function()
{
 return function(input, start)
 {
  start = +start;
  return input.slice(start);
 };
});
</script>
<?php echo $this->element('footer'); ?>