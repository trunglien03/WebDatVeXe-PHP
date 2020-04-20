<script>
		base_url = "http://demo.truebus.co.in/admin/";
	  config_url = "http://demo.truebus.co.in/admin/";
	</script>
  <!-- jQuery 2.1.4 -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
  <script src="http://demo.truebus.co.in/admin/assets/js/jQuery-2.1.4.min.js"></script>
	<!--<script src="assets/js/app.min.js"></script>-->
	<script src="http://demo.truebus.co.in/admin/assets/js/sortables.js"></script>
  <script src="http://demo.truebus.co.in/admin/assets/js/app.js"></script>
  <script src="http://demo.truebus.co.in/admin/assets/js/app-test.js"></script>
    
    <!-- Bootstrap 3.3.5 -->
  <script src="http://demo.truebus.co.in/admin/assets/js/bootstrap.min.js"></script>
  <script src="http://demo.truebus.co.in/admin/assets/js/pace.js"></script>
    <!-- Select2 -->
  <script src="http://demo.truebus.co.in/admin/assets/js/select2.min.js"></script>
    
    <!-- DataTables -->
  <script src="http://demo.truebus.co.in/admin/assets/js/jquery.dataTables.min.js"></script>
  <script src="http://demo.truebus.co.in/admin/assets/js/dataTables.bootstrap.min.js"></script>
	
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
	
	
	<!-- plugin for gallery image view Ragu -->
  <script src="http://demo.truebus.co.in/admin//assets/js/jquery.colorbox-min.js"></script>
  <!-- application script for Charisma demo Ragu -->
  <script src="http://demo.truebus.co.in/admin//assets/js/charisma.js"></script>
  <script src="http://demo.truebus.co.in/admin//assets/js/chosen.jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
	
    <!-- FastClick 
    <script src="../../plugins/fastclick/fastclick.min.js"></script>-->
    <!-- AdminLTE App -->
  <script src="http://demo.truebus.co.in/admin/assets/js/app.min.js"></script>
    
  <script src="http://demo.truebus.co.in/admin/assets/js/custom-script.js"></script>
	
	<script src="http://demo.truebus.co.in/admin/assets/js/immanucustom-script.js"></script>

	<script src="http://demo.truebus.co.in/admin/assets/js/jquery.raty.min.js"></script>
	
	<!--time picker-->
    <script src="http://demo.truebus.co.in/admin/assets/js/bootstrap-timepicker.min.js"></script>
	<!--[validation js]-->
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script src="http://demo.truebus.co.in/admin/assets/js/parsley.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!--[validation js]-->
	<script>
	$(function () {
	$(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
    <script>
   $(function () {
    $( "#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
     $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	<!--time picker-->
<!--Cancellation Time Picker-->	
	<script>
	$(function () {
	  $("#timepicker_cancellation").timepicker({
          showInputs: false,
		  //defaultTime: false,
		  showMeridian: false,
		/* $('#timepicker_cancellation').timepicker({
                minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                //showSeconds: false,
                //showMeridian: false,
                defaultTime: false
            });*/
            });
});
    </script>
<!--time picker-->

	 <script>
function doconfirm()
{
    job=confirm("Bạn có chắc muốn xóa?");
     if(job!=true)
    {
        return false;
    }
}
</script>

<script>
 
//Multi Select Box 				   
$(document).ready(function() {			
				 
$(".js-example-basic-multiple").select2();   
				   
});
</script>

<script type="text/javascript">
$(function() { 
  $('#datepicker1').datepicker( {
    dateFormat: "yy",
    yearRange: "c-100:c",
    changeMonth: false,
    changeYear: true,
    showButtonPanel: false,
    closeText:'Chọn',
    currentText: 'Năm nay',
    onClose: function(dateText, inst) {
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      $(this).val($.datepicker.formatDate("yy", new Date(year, 0, 1)));
    },
    beforeShow: function(input, inst){
      if ($(this).val()!=''){
        var tmpyear = $(this).val();
        $(this).datepicker('option','defaultDate',new Date(tmpyear, 0, 1));
      }
    }
  }).focus(function () {
    $(".ui-datepicker-month").hide();
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-current").hide();
    $(".ui-datepicker-prev").hide();
    $(".ui-datepicker-next").hide();
    $("#ui-datepicker-div").position({
      my: "left top",
      at: "left bottom",
      of: $(this)
    });
  }).attr("readonly", true);
});
</script>

<script>

