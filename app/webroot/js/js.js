	
$(document).ready(function(){
	$('.p_details').css({height:'210px', overflow:'hidden', cursor:'pointer'});
	$('.p_details').on('click', function() {
		var $this = $(this);
		if ($this.data('open')) {
			$this.animate({height:'210px'});
			$this.data('open', 0);

		}
		else {
			$this.animate({height:'100%'});
			$this.data('open', 1);
		}
	});
});