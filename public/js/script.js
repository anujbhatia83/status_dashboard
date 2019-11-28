$(function() {

	$(".updateBtn").click(function() {

		var id=$(this).attr('id');
        var empName=$(this).attr('empName');
        var empLocation=$(this).attr('empLocation');
        var empStatus=$(this).attr('empStatus');
        var empAllDay=$(this).attr('empAllDay');
        var empDateOut=$(this).attr('empDateOut');
        var empDateIn=$(this).attr('empDateIn'); 

        $("#empID").val(id);
        $("#empName").text(empName);
        $("#empLocation").val(empLocation);
        empStatus == 1 ? $('#empStatus').prop('checked', true) : $('#empStatus').prop('checked', false)
        empAllDay == 1 ? $('#empAllDay').prop('checked', true) : $('#empAllDay').prop('checked', false)
        $('#empDateOut').datepicker("setDate", empDateOut );
        $('#empDateIn').datepicker("setDate", empDateIn );

        showHideDates();


		// var selectedLocationId = "#location-"+id;
		// var selectedLocation = $(selectedLocationId).val();

  //       var selectedStatusId = "#status-"+id;
  //       var selectedStatus = $(selectedStatusId).is(":checked") ? 1 : 0;

  //       var selectedall_dayId = "#all_day-"+id;
  //       var selectedall_day = $(selectedall_dayId).is(":checked")  ? 1 : 0;

  //       var selectedDay_OutId = "#date_out-"+id;
  //       var selectedDay_InId = "#date_in-"+id;


  //       var selectedDay_In = $(selectedDay_InId).val();
  //       var selectedDay_Out = $(selectedDay_OutId).val();

            /*var data = {
                "id": id,
                "location": selectedLocation, 
                "status": selectedStatus, 
                "all_day": selectedall_day,
                "day_in": selectedDay_In,
                "day_out": selectedDay_Out
            };*/


           /* $.ajax({
                url: "index.php?c=Employee&a=updateEmployee",
                type: "post",
                dataType: "json", //data received from php file
                data: data,
                success: function(response){
                    if(response.updated == 'Y') {
                       $("#ajaxSuccessMessage").show();
                        var message = "<center><strong>Success!</strong> Panel member successfully removed.</center>";
                        $("#ajaxSuccessMessage").html(message);
                        $("#ajaxSuccessMessage").show();
                        swal("Updated !", "Status Updated !", "success");
                        location.href("index.php?c=Employee&a=index");
                        //location.reload();
                        //location.href("index.php?c=&a=edit&id="+id);
                    } 
                },
                error:function(){
                    console.log("There was some error in deleting!")
                }
            });*/


	});

    $("#saveBtn").click(function() {

        //Date check
        if($('#empDateOut').datepicker("getDate") > $('#empDateIn').datepicker("getDate")){
            swal({
              title: "Error!",
              text: "Date Out is bigger than Date In!",
              icon: "error",
            });
        }
        else{
        $("#updateEmployeeForm").submit();
        }
    });



    $(".locationBox").on('change', function() {
       showHideDates();
    });
});    


$( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: "d/m/yy"
    });
});


  function showHideDates()
  {
    var selectedLocation = $("#empLocation option:selected").val();

        if(selectedLocation == 'Mac Arthur Avenue' || selectedLocation == 'Pandanus Building A'|| selectedLocation == 'Pandanus Building B'|| selectedLocation == 'Pandanus Building C' || selectedLocation == 'Da Vinci Building' ){
            $('#empAllDay').prop('checked', true)
            $('#empStatus').prop('checked', false)
            $(date_out_container).hide();
            $(date_in_container).hide();
        }
        else if (selectedLocation == 'Sick Leave' || selectedLocation == 'Annual Leave') {
            $('#empStatus').prop('checked', true)
            $(date_out_container).show();
            $(date_in_container).show();
        }
        else{
            $(date_out_container).show();
            $(date_in_container).show();
        }
  }