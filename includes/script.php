<script>
            base_url = "http://demo.truebus.co.in/";
        </script>
    <!--   custom JavaScript -->

    <script src="assets/js/angular/angular.js"></script>
    <script src="assets/js/dirPagination.js"></script>
    <script src="assets/js/search.js"></script>
    <script src="assets/js/service.js"></script>
    <script src="assets/js/truebus.js"></script>
    <script src="assets/js/rating.js"></script>   
    <script src="http://demo.truebus.co.in/assets/js/bootstrap.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    

    <script src="http://demo.truebus.co.in/assets/js/jquery-datepicker.js"></script>
    
    <script src="assets/js/custom.js"></script>

    <script src="http://demo.truebus.co.in/assets/js/parsley.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script>
    $( document ).ready(function() {
        
            $('#pickDate').click(function (e) {
            $(this).next().datepicker('show');
        });
    $(".pickup_date").datepicker({

            minDate: 0//this option for allowing user to select from year range
        }); 
            

        $(".returnsd").datepicker({
            
            minDate: new Date($(".datetimepicker4").val())
            
        //this option for allowing user to select from year range
        }); 
        $(".pickup_date").on('change',function(e){
        
        $("#Calenderreturn").datepicker({
            
            minDate: new Date($(".Calenderfrom").val())
            
        //this option for allowing user to select from year range
        }); 
        }); 
        $('ul.tabs li').click(function(){
            var id = $(this).data('id');
            //alert(id);
        var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');

            $(this).addClass('current');
            $("#"+tab_id).addClass('current');
            
            $('#pament_option').val(id);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
    $('input[name=colorCheckbox]:radio').change(function(e) {
    let value = e.target.value.trim()

    $('[class^="form"]').css('display', 'none');

    switch (value) {
        case 'red':
        $('.form-a').show()
        break;
        case 'green':
        $('.form-b').show()
        break;
        default:
        break;
    }
    })
    })
</script>